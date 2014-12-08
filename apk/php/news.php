<?php
/**
* 
*/

require 'class/news_class.php';
$news = new news();
if (isset($_GET['type']) && isset($_GET['league']) && isset($_GET['continent']) && isset($_GET['club'])) {

	$type = $_GET['type'];
	$league = $_GET['league'];
	$pro = 1;//par default
	$club = $_GET['club'];
	$continent = $_GET['continent'];
	$maxNews = 3;
	$tablePrefix = "news_";

	$news = new news();

	if($type== "start"){
		$local_news = $news->start($league,$club,$pro,$maxNews);
		$global_news = $news->start($continent,$club,$pro,$maxNews);
		$all_news = array_merge($global_news, $local_news);
		echo json_encode($all_news);
	}
}else if (isset($_GET['type']) && $_GET['type'] == "gettext" && isset($_GET['id']) && isset($_GET['league'])){

	$id = $_GET['id'];
	$league = $_GET['league'];

	$news = new news();

	$text = $news->getText($id,$league);
	echo json_encode(array('text' => $text));
}


?>