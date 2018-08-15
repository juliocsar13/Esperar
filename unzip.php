<?php 
	$zip = new ZipArchive;
	if ($zip->open('vendors.zip') === TRUE) {
	    $zip->extractTo('.');
	    $zip->close();
	    echo 'ok';
	} else {
	    echo 'failed';
	}
?>