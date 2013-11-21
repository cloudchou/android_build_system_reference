<?php
require_once ("tree.php");

function tree($directory) {
	$mydir = dir ( $directory );
	echo "<ul>\n";
	while ( $file = $mydir->read () ) {
		if ((is_dir ( "$directory/$file" )) and ($file != ".") and ($file != "..")) {
			echo "<li><font color=\"#ff00cc\"><b>$file</b></font></li>\n";
			tree ( "$directory/$file" );
		} else {
			echo "<li>$file</li>\n";
		}
	}
	echo "</ul>\n";
	$mydir->close ();
}
// tree ( "core" );
// tree ( "target" );
?> 