<?php
	$zip = new ZipArchive;
	if ($zip->open('vendor.rar') === TRUE) {
	    $zip->extractTo('.');
	    $zip->close();
	    echo 'ok';
	} else {
	    echo 'failed';
	}
?>