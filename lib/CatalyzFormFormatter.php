<?php

abstract class AbstractCatalyzFormFormatter {
	protected $form;
	protected $formFieldSchema;
	function __construct(sfForm $form)
	{
		$this->form = $form;
		$this->formFieldSchema = $this->form;
	}

    protected function defaultRenderField($name, sfFormField $field)
    {
        $rows = 2;
        if ($hint = $this->getHelp($name, $field)) {
            $rows++;
        }
        // var_dump($this->form->getEmbeddedForm($this->name)->getValidatorSchema()->getMessage($field->getName()));
        // $errors = $this->form->getErrorSchema();
        // if($errors[$field->getName()]){
        // var_dump($errors[$field->getName()]->getMessage());
        // }
        if ($error = $this->getFieldError($field)) {
            $rows++;
        }
        // $caption = $field->renderLabel();
        $caption = $field->getWidget()->getAttribute('label');
        // if ($this->isRequired($field) && $caption) {
        // $caption .= sprintf(' <span class="required">%s</span>', __('Required', null, 'catalyz'));
        // }
        printf('<tr valign="top"><td>%s</td><td width="82" rowspan="%d">%s</td></tr>' . "\n", $caption, $rows, $this->getFieldIcon($field));
        if ($error) {
            printf('<tr valign="top"><td class="error">%s</td></tr>' . "\n", $field->render());
        } else {
            printf('<tr valign="top"><td>%s</td></tr>' . "\n", $field->render());
        }
        $this->renderHint($hint);
        // var_dump($error);
        $this->renderError($error);
    }
    protected function renderTextareaField($name, sfFormField $field)
    {
        $rows = 0;

        if ($error = $this->getFieldError($field)) {
            $rows++;
        }
        // $caption = $field->renderLabel();
        $caption = $field->getWidget()->getAttribute('label');

        if ($caption) {
            // if ($this->isRequired($field)) {
            // $caption .= sprintf(' <span class="required">%s</span>', __('Required', null, 'catalyz'));
            // }
            $rows++;
            if ($hint = $this->getHelp($name, $field)) {
                $caption .= sprintf(' <div class="hint">%s</div>', $hint);
            }
            printf('<tr valign="top"><td>%s</td><td>&nbsp;</td></tr>' . "\n", $caption);
        }
        $renderedField = $field->render(array('class' => $error?'error':''));
        // var_dump();
        if ($error) {
            printf('<tr valign="top"><td class="error">%s</td><td width="82" rowspan="%d">%s</td></tr>' . "\n", $renderedField, $rows, $this->getFieldIcon($field));
        } else {
            printf('<tr valign="top"><td>%s</td><td width="82" rowspan="%d">%s</td></tr>' . "\n", $renderedField, $rows, $this->getFieldIcon($field));
        }
        // $this->renderHint($hint);
        $this->renderError($error);
    }

    public function renderField($name)
    {
        // $name = sprintf('campaign[content][%s]',$name);
        $field =/*(sfFormField)*/ $this->formFieldSchema[$name];

        $widget = $field->getWidget();

        //$widget->setAttribute('onchange', $widget->getAttribute('onchange'). ' ; refreshCampaignPreview(this.form);');
        // if($field->getWidget() instanceof czWidgetFormTextareaWysiwyg){
        // $this->wysiwygWidgets[] =$name;
        // }
        if ($field->getWidget() instanceof sfWidgetFormInputHidden) {
            $field->render();
        } elseif ($field->getWidget() instanceof sfWidgetFormInputCheckbox) {
            $this->renderCheckboxField($name, $field);
        } elseif ($field->getWidget() instanceof sfWidgetFormTextarea) {
            $this->renderTextareaField($name, $field);
            printf('<tr valign="top"><td colspan="2">&nbsp;</td></tr>' . "\n");
        } else {
            $this->defaultRenderField($name, $field);
            printf('<tr valign="top"><td colspan="2">&nbsp;</td></tr>' . "\n");
        }
    }

    public function renderHeader()
    {
        echo '<table border="0" cellpadding="2" cellspacing="0" width="99%">';
    }

    public function renderFooter()
    {
        echo '</table>';
    }

    protected function renderHint($hint)
    {
        if ($hint) {
            printf('<tr valign="top"><td colspan="2"><div class="hint">%s</div></td></tr>' . "\n", $hint);
        }
    }

    protected function renderCheckboxField($name, sfFormField $field)
    {
        $rows = 1;
        if ($hint = $this->getHelp($name, $field)) {
            $rows++;
        }
        if ($error = $field->renderError()) {
            $rows++;
        }
        printf('<tr valign="top"><td>%s<div class="pull-left">&nbsp;</div>%s</td><td width="82" rowspan="%d">%s</td></tr>' . "\n",
            $field->render(array('class' => 'pull-left')), $field->renderLabel(null, array('class' => 'pull-left')), $rows, $this->getFieldIcon($field));
        $this->renderHint($hint);
        $this->renderError($error);
    }

    public function renderError($error)
    {
        if ($error) {
            printf('<tr valign="top"><td colspan="2"><span class="error">%s</span></td></tr>' . "\n", $error);
        }
    }

    public function renderText($content, $isHint = false)
    {
        if ($isHint) {
            $content = '<div class="hint">' . $content . '</div>';
        }
        printf('<tr valign="top"><td colspan="2">%s</td></tr>' . "\n", $content);
    }

    public function startTabs()
    {

        printf('<div id="catalyz-tabs" class="tabbable"><ul class="nav nav-tabs">');
        $tabIndex = 1;
        foreach(func_get_args() as $tabName) {
            printf('<li%s><a data-toggle="tab" href="#catalyz-tab%d">%s</a></li>', $tabIndex==1?' class="active"':'',$tabIndex++, $tabName);
        }

        printf('</ul>');
        //printf('<script type="text/javascript"> $(function() { $("#catalyz-tabs").tabs(); });</script>');
        printf('<div class="tab-content"><div id="catalyz-tab1" class="tab-pane active catalyz-content-tab" style="min-height: 300px; padding: 2px">');
        $this->renderHeader();
    }

    public function nextTab()
    {
        $this->renderFooter();
        static $nextTabIndex = 2;
        printf('</div><div id="catalyz-tab%d" class="catalyz-content-tab tab-pane" style="min-height: 300px; padding: 0px">', $nextTabIndex++);
        $this->renderHeader();
    }

    public function endTabs()
    {
        $this->renderFooter();
        printf('</div></div></div>');
    }

    protected $groupIcon = null;
    public function startGroup($caption, $icon = null)
    {
        if ($icon) {
            $iconFilename = $this->getIconFolder() . $icon . '.gif';
            if (is_file(sfConfig::get('sf_web_dir') . $iconFilename)) {
                $this->groupIcon = image_tag($iconFilename, array('style' => 'margin-top: 15px'));
            }
            echo '<tr valign="top"><td>';
        } else {
            echo '<tr valign="top"><td colspan="2">';
        }




        echo '<div class="well"><h3>' . $caption . '</h3><hr/>' . "\n";
        $this->renderHeader();
    }

    public function endGroup()
    {
        echo '</table></div></td>';
        if ($this->groupIcon) {
            echo '<td width="82">' . $this->groupIcon . '</td>';

            $this->groupIcon = null;
        }
        echo '</tr>';
    }

    public function renderGroup($caption, $widgets, $icon = null)
    {
        $this->startGroup($caption, $icon);
        foreach($widgets as $widgetName) {
            $this->renderField($widgetName);
        }
        $this->endGroup();
    }

    protected function getHelp($name, $field)
    {
        return $field->getParent()->getWidget()->getHelp($name);
    }

    protected $sortableStack = array();
    protected $sortable_current_id = null;
    protected $sortable_current_name = null;

    protected function getSortableItemList($name)
    {
        return self::extractSortableItemOrder($this->formFieldSchema[$name]->getValue());
    }

    static function extractSortableItemOrder($content)
    {
        $items = explode('&', $content);
        $result = array();
        foreach($items as $item) {
            $tmp = explode('=', $item);
            $tmpItem = array_pop($tmp);
            if (!empty($tmpItem)) {
                $result[] = $tmpItem;
            }
        }
        return $result;
    }

    protected $sortableBoxesOrder = array();
    protected $sortableBoxesContent = array();
    protected $sortableBoxesCaption = array();
    public function startSortableItemGroup($name)
    {
        $this->sortableBoxesOrder[$name] = $this->getSortableItemList($name);
        foreach ($this->sortableBoxesOrder[$name] as $boxName) {
            $this->sortableBoxesContent[$name][$boxName] = null;
        }

        $this->sortable_current_name = $name;
        $this->sortable_current_id = 'ContentObject_' . $this->name . '_' . $this->sortable_current_name;
        // static $sortableGroupId = 1;
        // $this->sortableStack[$sortableGroupId++] = $name;
        $groupId = 1;
        $this->renderFooter();
        // $result = '<input type="hidden" name="ContentObject['.$this->name.']['.$this->sortable_current.']" value="" />';
    }

    protected $sortable_current_item = null;

    /**
     * CatalyzFormFormatter::startSortableItem()
     *
     * @return
     */
    public function startSortableItem($choiceId)
    {
        // $this->sortableBoxesCaption[$choiceId] = $caption;
        $this->sortable_current_item = $choiceId;
        ob_start();
        echo '<li
id="' . $this->sortable_current_id . '_items_' . $this->sortable_current_item . '" class="ui-state-default" style="cursor: pointer;

">';
        $this->renderHeader();
    }

    /**
     * CatalyzFormFormatter::stopSortableItem()
     *
     * @return
     */
    public function stopSortableItem()
    {
        $this->renderFooter();
        $this->sortableBoxesContent[$this->sortable_current_name][$this->sortable_current_item] = ob_get_clean();
    }

    /**
     * CatalyzFormFormatter::endSortableItemGroup()
     *
     * @return
     */
    public function endSortableItemGroup()
    {
        $groupId = 1;
        // $name =
        $result = '<div style="border: 1px solid #C0C0C0; margin: 3px; padding-top: 3px;">';
        $result .= '<ul class="checkbox_list" id="sortable_' . $groupId . '" style="margin-left:-10px;">';
        if (empty($this->sortableBoxesOrder[$this->sortable_current_name])) {
            $this->sortableBoxesOrder[$this->sortable_current_name] = array_keys($this->sortableBoxesContent[$this->sortable_current_name]);
        }
        foreach ($this->sortableBoxesOrder[$this->sortable_current_name] as $boxName) {
            $result .= $this->sortableBoxesContent[$this->sortable_current_name][$boxName];
        }
        $result .= '</ul>';
        $result .= '</div>';

    	$result2 = '';
        $result2 .= '<script type="text/javascript">


			$(function() {
				$("#sortable_' . $groupId . '").sortable({
						placeholder: \'ui-state-highlight\',
						update: function(event, ui){
							$("#' . $this->sortable_current_id . '").val($("#sortable_' . $groupId . '").sortable(\'serialize\'));
						},
					});

				$("#sortable_' . $groupId . '").disableSelection();
			});</script>';
        $result2 .= '<style>#sortable_' . $groupId . ' { list-style-type: none; margin: 0; padding: 0;  }#sortable_' . $groupId . ' li { margin: 0 3px 3px 3px; padding: 0; font-size: 1.4em; }html>body #sortable_' . $groupId . ' li { line-height: 1.2em; }.ui-state-highlight { height: 1.5em; line-height: 1.2em; }</style>';
        echo $result;
        $this->renderHeader();
    }

    function renderSortableItem($choiceId, $widgets)
    {
        $this->startSortableItem($choiceId);
        foreach($widgets as $widgetName) {
            $this->renderField($widgetName);
        }
        $this->stopSortableItem();
    }
    // protected function isRequired($field) {
    // return $this->getRelatedFormInstance()->isRequired($field->getName());
    // }
    abstract protected function getFieldError($field);

    abstract protected function getFieldIcon($field);

	public function renderNotificationFields($prefix){
		$this->renderField($prefix.'_feedback');
		$this->startGroup('Notification au webmaster');
		$this->renderField($prefix.'_from');
		$this->renderField($prefix.'_to');
		$this->renderField($prefix.'_subject');
		$this->endGroup();
		$this->startGroup('Notification au visiteur');
		$this->renderField($prefix.'_visitor_notification_enabled');
		$this->renderField($prefix.'_visitor_notification_from_name');
		$this->renderField($prefix.'_visitor_notification_from_email');
		$this->renderField($prefix.'_visitor_notification_subject');
		$this->renderField($prefix.'_visitor_notification_message');
		$this->endGroup();
	}


}

class CatalyzFormFormatter3 extends AbstractCatalyzFormFormatter {

    protected function getRelatedFormInstance()
    {
        return $this->form;
    }
    protected function getFieldIcon($field)
    {
        return false;
    }
    protected function getFieldError($field)
    {
        $schema =/*(sfWidgetFormSchema)*/ $this->form->getWidgetSchema();

        $validatorSchema =/*(sfValidatorSchema)*/ $this->form->getValidatorSchema();
        $validatorFields = $validatorSchema->getFields();
        // try {
        // $validatorFields[$field->getName()]->clean($this->form->getDefault($field->getName()));
        // }
        // catch(sfValidatorError $error) {
        // return $error->getMessage();
        // }
        return false;
    }
}

?>