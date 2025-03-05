<?php
	//to saniise data so that no sql injections can take place
	function sanitise($dirty){
		$clean = htmlentities($dirty, ENT_QUOTES, "UTF-8");
		return $clean;
	}
?>