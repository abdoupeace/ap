<?php
/**
* 
*/
require 'db_login.php';
class news extends DBLogin{

	function start($league,$club,$pro,$maxNews){

		$q = ('SELECT text,id,title,img,date FROM news_'.$league.' WHERE club = "'.$club.'" OR pro <= '.$pro.' ORDER BY id DESC LIMIT '.$maxNews);
		$rep = $GLOBALS['bdd']->query($q);
		$i = 0;
		while ($lor = $rep ->fetch()){
			$tab[$i] = array("title" => $lor["title"],"img" => $lor["img"],"text" => $lor["text"],"date" => $lor["date"]
				,"info" => $lor["id"]."_".$league);
			$i++;
		}
		return $tab ;

	}

	function getText($id,$league){
		$q = ('SELECT text FROM news_'.$league.' WHERE id ='.$id);
		$rep = $GLOBALS['bdd']->query($q);
		$rep = $rep->fetch();
		return $rep['text'];
	}
	
}


?>