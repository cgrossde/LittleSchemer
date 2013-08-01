<?php
/**
 * LibLoader - includes all libs from folder core and lib
 */

// Load CORE
$handle = opendir('core');
while (false !== ($file = readdir($handle))) {
	if ($file != "." && $file != "..") {
		include 'core/'.$file;
	}
}
closedir($handle);

// Load LIBs
$handle = opendir('lib');
while (false !== ($file = readdir($handle))) {
	if ($file != "." && $file != "..") {
		include 'lib/'.$file;
	}
}
closedir($handle);

?>