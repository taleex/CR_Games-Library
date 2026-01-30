<?php
//============================================================+
// File name   : tcpdf_include.php
// Begin       : 2008-05-14
// Last Update : 2013-05-14
//
// Description : Search and include the TCPDF library.
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Search and include the TCPDF library.
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Include the main class.
 * @author Nicola Asuni
 * @since 2013-05-14
 */

// always load alternative config file for examples
require_once('tcpdf_config_alt.php');

// Try to include TCPDF from local directory first
$tcpdf_local_path = dirname(__FILE__) . '/tcpdf.php';
if (file_exists($tcpdf_local_path)) {
	require_once($tcpdf_local_path);
} else {
	// Fallback to system paths if local doesn't exist
	$tcpdf_include_dirs = array(
		'/var/www/tcpdf/tcpdf.php', 
		'/usr/share/php/tcpdf/tcpdf.php', 
		'/usr/share/tcpdf/tcpdf.php', 
		'/usr/share/php-tcpdf/tcpdf.php', 
		'/var/www/html/tcpdf/tcpdf.php', 
		'/usr/local/apache2/htdocs/tcpdf/tcpdf.php'
	);
	
	$tcpdf_found = false;
	foreach ($tcpdf_include_dirs as $tcpdf_include_path) {
		if (@file_exists($tcpdf_include_path)) {
			require_once($tcpdf_include_path);
			$tcpdf_found = true;
			break;
		}
	}
	
	// If no TCPDF found, show error message
	if (!$tcpdf_found) {
		die('TCPDF library not found. Please install TCPDF or place tcpdf.php in the pdf directory.');
	}
}

//============================================================+
// END OF FILE
//============================================================+