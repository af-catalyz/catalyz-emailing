<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2008 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2008 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.6.1, 2008-04-28
 */

/** Error reporting */
error_reporting(E_ALL);

/* Modified by Bertrand Zuchuat */
require_once 'symfony.inc.php';

/** PHPExcel_Writer_Exce5 */
require 'PHPExcel/Reader/Excel5.php';
include 'PHPExcel/Writer/Excel2007.php';

$file_path = dirname(__FILE__) . '/14excel5.xls';

if (!file_exists($file_path)) {
	exit("Please run 14excel5.php first.\n");
}

echo date('H:i:s') . " Load from Excel5 file\n";
$objReader = new PHPExcel_Reader_Excel5;
$objPHPExcel = $objReader->load($file_path);

echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = new PHPExcel_Writer_Excel2007 ($objPHPExcel);
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

// Echo memory peak usage
echo date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Echo done
echo date('H:i:s') . " Done reading file.\r\n";