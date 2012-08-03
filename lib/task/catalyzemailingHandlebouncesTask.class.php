<?php

class catalyzemailingHandlebouncesTask extends sfPropelBaseTask {
    protected function configure()
    {
        $this->namespace = 'catalyz-emailing';
        $this->name = 'handle-bounces';
        $this->briefDescription = 'Check for bounces for all campaigns';
        $this->detailedDescription = <<<EOF
The [catalyz-emailing:handle-bounces|INFO] task check all bounce mailbox and update database with failed receipient.
Call it with:

  [php symfony catalyz-emailing:handle-bounces|INFO]
EOF;
        $this->addArgument('application', sfCommandArgument::OPTIONAL, 'The application name', 'frontend');
        // add other arguments here
        $this->addOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev');
        $this->addOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel');
        // add other options here
        $this->addOption('no-delete', null, sfCommandOption::PARAMETER_NONE, 'Leave message on server after processing');
    }

    protected $options = array();
    protected $mailBoxes = array();
    protected $arguments = array();

    protected function execute($arguments = array(), $options = array())
    {
        // Database initialization
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = Propel::getConnection($options['connection'] ? $options['connection'] : '');
        // add code here
        $this->options = $options;
        $this->arguments = $arguments;


        if (!extension_loaded('imap')) {
            $this->logSection('Setup', 'Fatal error: IMAP extension is required.', null, 'ERROR');
            return;
        }

        $criteria = new Criteria();
        $criteria->add(CampaignPeer::STATUS, array(Campaign::STATUS_SENDING, Campaign::STATUS_COMPLETED), Criteria::IN);
        $criteria->add(CampaignPeer::IS_ARCHIVED, false);

        $campaigns = CampaignPeer::doSelect($criteria);
        foreach($campaigns as/*(Campaign)*/ $campaign) {
						if (empty($this->mailBoxes[sprintf('%s_%s', $campaign->getReturnPathServer(), $campaign->getReturnPathLogin())])) {
							$this->logSection($campaign->getName(), sprintf('-- Starting to investigate bounces for campaign #%02d: %s', $campaign->getId(), $campaign->getName()));
							$this->CheckMailbox($campaign->getReturnPathServer(), $campaign->getReturnPathLogin(), $campaign->getReturnPathPassword());
							$this->logSection($campaign->getName(), sprintf('-- Finished campaign #%02d: %s', $campaign->getId(), $campaign->getName()));
						}
        }
    }

    const BOUNCE_NONE = 1;
    const BOUNCE_SOFT = 2;
    const BOUNCE_HARD = 3;

    protected function getBounceTypeByErrorCode($errorcode)
    {
        $bounceMap = array();
        $bounceMap[450] = self::BOUNCE_HARD;
        $bounceMap[451] = self::BOUNCE_SOFT;
        $bounceMap[500] = self::BOUNCE_SOFT;
        $bounceMap[503] = self::BOUNCE_SOFT;
        $bounceMap[540] = self::BOUNCE_HARD;
        $bounceMap[550] = self::BOUNCE_HARD;
        $bounceMap[554] = self::BOUNCE_HARD;
        // Bounce status defined in RFC 1893
        // Format success.category.detail
        if (strpos($errorcode, ".")) {
            $tokens = explode(".", $errorcode);
            switch ($tokens[0]) {
                case 2:
                    // Success message
                    return self::BOUNCE_NONE;
                case 4:
                    return self::BOUNCE_SOFT;
            }
            switch ($tokens[1]) {
                case 0:
                case 5:
                case 6:
                case 7:
                    return self::BOUNCE_HARD;
            }
            if (1 == $tokens[1] && 5 != $tokens[2]) {
                return self::BOUNCE_HARD;
            }

            if (2 == $tokens[1] && (0 != $tokens[2] || 1 != $tokens[2])) {
                return self::BOUNCE_HARD;
            }

            if (in_array(substr($errorcode, 2, 1), array(3, 4))) {
                return self::BOUNCE_SOFT;
            }
        } else {
            // No valid status found using fallback to determine bounce
            if (in_array($errorcode, array_keys($bounceMap))) {
                return $bounceMap[$errorcode];
            } else {
                return self::BOUNCE_SOFT; // No bounce status detected
            }
        }

        return self::BOUNCE_SOFT; // Softbounce unknown status
    }

    /**
     * Fetches delivery status message information.
     */
    protected function getDeliveryStatusType($mbox, $mailNumber, $struct, $partNumber)
    {
        $counter = 1;
        $errorCode = false;

        if ($partNumber != "") {
            $partNumber .= ".";
        }

        if (isset($struct->parts) && count($struct->parts) > 0) {
            foreach($struct->parts as $part) {
                // The delivery status is in a message/delivery-status part we only fetch this part
                if ($part->type == 2 && isset($part->ifsubtype) && $part->ifsubtype == 1 && $part->subtype == 'DELIVERY-STATUS') {
                    // Get the bounce status
                    $partNumber .= $counter;
                    $message = imap_fetchbody($mbox, $mailNumber, $partNumber);
                    $errorCode = $this->findErrorCode($message);
                    $address = $this->findDestinationAddress($message);
                    $arrival = $this->findBounceArrived($message);

                    return array('error_code' => $errorCode,
                        'address' => $address,
                        'bounce_arrived' => $arrival,
                        'bounce_message' => $message);
                } else {
                    // Find the status message
                    $errorCode = $this->getDeliveryStatusType($mbox, $mailNumber, $part, $partNumber);
                }
                $counter++;
            }
        }
        return $errorCode;
    }

    protected function getReturnedMessageCampaignId($mbox, $mailNumber, $struct, $partNumber, $initial = true)
    {
        $counter = 1;
        $CampaignId = false;
        if ($partNumber != "") {
            $partNumber .= ".";
        }

        if (isset($struct->parts) && count($struct->parts) > 0) {
            foreach($struct->parts as $part) {
                // The delivery status is in a message/delivery-status part we only fetch this part
                if ($part->type == 2 && isset($part->ifsubtype) && $part->ifsubtype == 1 && $part->subtype == 'RFC822') {
                    // Get the bounce status
                    $partNumber .= $counter;
                    $message = imap_fetchbody($mbox, $mailNumber, $partNumber);
                    $CampaignId = $this->findCampaignId($message);
                    return $CampaignId;
                } else {
                    // Find the status message
                    $CampaignId = $this->getReturnedMessageCampaignId($mbox, $mailNumber, $part, $partNumber, false);
                }
                $counter++;
            }
        }
        return $CampaignId;
    }

    /*!
	   Finds the destination email address of the mailing
	*/
    protected function findDestinationAddress($mailbody)
    {
        $pattern = '/Final-Recipient\:[\s](.+)\;[\s](.+?)\\r/';
        $res = preg_match($pattern, $mailbody, $matches);
        if ($res) {
            return $matches[2];
        }
        return false;
    }
    /*!
   Scans through the email body looking for numerical error codes in the
   form x.x.x ( RFC 1893 conform ) or XXX ( fallback ) to identify the
   cause of the bounced message.
*/
    protected function findErrorCode($mailbody)
    {
        $pattern = '/[\s]([0-9]{1}\.[0-9]{1}\.[0-9]{1}|[0-9]{3})[\s]/';
        $res = preg_match($pattern, $mailbody, $matches);
        if ($res) {
            return $matches[1];
        }
        return false;
    }

    /*!
   Find the date the message bounced
*/
    protected function findBounceArrived($message)
    {
        $pattern = '/Arrival-Date\:(.+)/';
        $res = preg_match($pattern, $message, $matches);
        if ($res) {
            return strtotime($matches[1]);
        }
        return false;
    }

    protected function findCampaignId($msg)
    {
        // $pattern = '/Message-Id\:[\s]\<([0-9]+)\..+\>[\s]/i';
        $pattern = '/X-Catalyz-Campaign: ([0-9]+)/i';
        $res = preg_match($pattern, $msg, $matches);
        if ($res) {
            return $matches[1];
        }
        return false;
    }

    protected function getMessageContent($mbox, $mid)
    {
        $struct = imap_fetchstructure($mbox, $mid);

        $parts = $struct->parts;
        $i = 0;

        if (!$parts)/* Simple message, only 1 piece */ {
            $attachment = array();
            /* No attachments */
            $content = imap_body($mbox, $mid);
        } else/* Complicated message, multiple parts */ {
            $endwhile = false;

            $stack = array();
            /* Stack while parsing message */
            $content = "";
            /* Content of message */
            $attachment = array();
            /* Attachments */

            while (!$endwhile) {
                if (!$parts[$i]) {
                    if (count($stack) > 0) {
                        $parts = $stack[count($stack) - 1]["p"];
                        $i = $stack[count($stack) - 1]["i"] + 1;
                        array_pop($stack);
                    } else {
                        $endwhile = true;
                    }
                }

                if (!$endwhile) {
                    /* Create message part first (example '1.2.3') */
                    $partstring = "";
                    foreach($stack as $s) {
                        $partstring .= ($s["i"] + 1) . ".";
                    }
                    $partstring .= ($i + 1);

                    if (strtoupper($parts[$i]->disposition) == "ATTACHMENT")/* Attachment */ {
                        $attachment[] = array("filename" => $parts[$i]->parameters[0]->value,
                            "filedata" => imap_fetchbody($mbox, $mid, $partstring));
                    } elseif (strtoupper($parts[$i]->subtype) == "PLAIN")/* Message */ {
                        $content .= imap_fetchbody($mbox, $mid, $partstring);
                    }
                }

                if ($parts[$i]->parts) {
                    $stack[] = array("p" => $parts, "i" => $i);
                    $parts = $parts[$i]->parts;
                    $i = 0;
                } else {
                    $i++;
                }
            }
            /* while */
        }
        /* complicated message */

        return array($content, $attachment);
    }

    protected function handleBounce($type, $campaignId, $bounceType)
    {
        $this->log(sprintf('Handling bounce %s for campaign #%02d: "%s"', self::getBounceTypeMessage($bounceType), $campaignId, $type['address']));
        $criteria = new Criteria();
        $criteria->add(ContactPeer::EMAIL, $type['address']);

        $Contact = ContactPeer::doSelectOne($criteria);
        if (!$Contact) {
            $this->log(sprintf('[ERROR] Unable to find Contact for %s email', $type['address']));
            return false;
        }

        $criteria = new Criteria();
        $criteria->add(CampaignContactPeer::CAMPAIGN_ID, $campaignId);
        $criteria->add(CampaignContactPeer::CONTACT_ID, $Contact->getId());
        $CampaignContact = CampaignContactPeer::doSelectOne($criteria);
        if (!$CampaignContact) {
            $this->log(sprintf('[ERROR] Unable to find CampaignContact (%s, %d) for campaign #%02d', $type['address'], $Contact->getId(), $campaignId));
            return false;
        }

        $bounce = new CampaignContactBounce();
        $bounce->setCampaignContact($CampaignContact);
        $bounce->setAddress($type['address']);
    	try{
    		$bounce->setArrivedAt($type['bounce_arrived']);
    	}catch(Exception $e){

    	}
        $bounce->setBounceType($bounceType);
        $bounce->setErrorCode($type['error_code']);
        $bounce->setMessage($type['bounce_message']);
        $bounce->save();

        $criteria = new Criteria();
        $criteria->add(CampaignContactBouncePeer::BOUNCE_TYPE, $bounceType);
        $criteria->add(CampaignContactBouncePeer::CAMPAIGN_CONTACT_ID, $CampaignContact->getId());
        if ($bounceType == self::BOUNCE_SOFT) {
            $bounceCount = CampaignContactBouncePeer::doCount($criteria);
            $bounceStopCount = sfConfig::get('app_bounce_stop_count', 2);
            if ($bounceCount <= $bounceStopCount) {
               // $CampaignContact->setSentAt(null);
                $this->log(sprintf('BOUNCE_SOFT received for #%06d (%s), found %d previous bounce, less than stop count (%d), so preparing new send',
                    $Contact->getId(), $Contact->getEmail(), $bounceCount, $bounceStopCount));
            } else {
                $Contact->setStatus(Contact::STATUS_BOUNCED);
                $Contact->save();

                $this->log(sprintf('BOUNCE_SOFT received for #%06d (%s), found %d previous bounce, more than stop count (%d), so avoiding new send and removing user from list',
                    $Contact->getId(), $Contact->getEmail(), $bounceCount, $bounceStopCount));
            }
        } else {
            if ($bounceType == self::BOUNCE_HARD) {
                $Contact->setStatus(Contact::STATUS_BOUNCED);
                $Contact->save();
            }
            $this->log(sprintf('Handled bounce for contact #%06d (%s): %s', $Contact->getId(), $Contact->getEmail(), self::getBounceTypeMessage($bounceType)));
        }
        $CampaignContact->setBounceType($bounceType);
        $CampaignContact->save();
        return true;
    }

    static public function getBounceTypeMessage($type)
    {
        switch ($type) {
            case self::BOUNCE_HARD:
                return 'BOUNCE_HARD';
            case self::BOUNCE_NONE:
                return 'BOUNCE_NONE';
            case self::BOUNCE_SOFT:
                return 'BOUNCE_SOFT';
        } // switch
    }
    /**
     * catalyzemailingHandlebouncesTask::CheckMailbox()
     *
     * @param mixed $Server
     * @param mixed $Login
     * @param mixed $Password
     * @return
     */
    protected function CheckMailbox($ServerName, $LoginName, $Password)
    {
        $ServerPort = 110;
        $Protocol = 'pop3';
        // $Flags = $mailsettings->variable($account, 'Flags');
        // if (is_array($Flags) and count($Flags) > 0) {
        // $Flags = '/' . join('/', array_unique($Flags));
        // } else {
        $Flags = '';
        // }
        $this->log(sprintf('Connecting to %s.', $ServerName));

        $server = "{" . $ServerName . ":" . $ServerPort . "/" . $Protocol . $Flags . "}INBOX";

        $mailbox = imap_open($server, $LoginName, $Password);

        if ($mailbox == false) {
            $errorMsg = imap_last_error();
            $this->log("Unable to connect to $ServerName as $LoginName");
            $this->log("Returned error: $errorMsg");
            return false;
        }

    		$key = sprintf('%s_%s', $ServerName, $LoginName);
				$this->mailBoxes[$key] = $key;

        // fetch numbers of all new mails
        $num = imap_num_msg($mailbox);

        $this->log(sprintf('Found %d emails in mailbox.', $num));
        // check each mail in inbox
        for ($i = 1; $i <= $num; $i++) {
            $delete = $this->options['no-delete']?false:true;
            // fetch mail headers to get the structure.
            $mailstructure = imap_fetchstructure($mailbox, $i);

            $type = $this->getDeliveryStatusType($mailbox, $i, $mailstructure, "");
            // get returned message id from newsletter
            $CampaignId = $this->getReturnedMessageCampaignId($mailbox, $i, $mailstructure, "");

            if ($CampaignId != false) {
                // $this->log(sprintf('Assigned to newsletter: %s', $CampaignId));

                switch ($this->getBounceTypeByErrorCode($type['error_code'])) {
                    case self::BOUNCE_SOFT: {
                            $this->handleBounce($type, $CampaignId, self::BOUNCE_SOFT);
                        }
                        break;

                    case self::BOUNCE_HARD: {
                            $this->handleBounce($type, $CampaignId, self::BOUNCE_HARD);
                        }
                        break;

                    case self::BOUNCE_NONE:
                    default: {
                            // TODO
                        }
                        break;
                }
            } else {
                // do not delete
                $delete = false;
            }

            $imapErrors = imap_errors();
            $imapAlerts = imap_alerts();

            if ($imapErrors) {
                $this->log("\nMAIL ID: $i - IMAP Errors");
                $log = print_r($imapErrors, true);
                foreach(explode("\n", $log) as $logLine) {
                    $this->log('>> ' . $logLine);
                }
            }

            if ($imapAlerts) {
                $this->log("\nMAIL ID: $i - IMAP Alerts");
                $log = print_r($imapAlerts, true);
                foreach(explode("\n", $log) as $logLine) {
                    $this->log('>> ' . $logLine);
                }
            }

            if ($delete) {
                imap_delete($mailbox, $i);
            }
        }
        // Close imap connection
        imap_close($mailbox, CL_EXPUNGE);
    }

    /**
     * CampaignContact::getBounceTypeFmt()
     *
     * @return
     */
    static public function getBounceTypeFmt($bounceType)
    {
        switch ($bounceType) {
            case catalyzemailingHandlebouncesTask::BOUNCE_HARD:
                return 'HARD';
            case catalyzemailingHandlebouncesTask::BOUNCE_NONE:
                return '-';
            case catalyzemailingHandlebouncesTask::BOUNCE_SOFT:
                return 'SOFT';
        } // switch
    }
}