<?php
/******************* class.session.php *******************
* Author   : Zamin Ismayilov edited by Alikhan Dadashov
* Info     : Class for the Session Register 
* Contacts : zamin@isetech.com
******************* class.session.php *******************/



class language_set {

function session_set() {
	$db=new mysql();
	$SQL = $db->query("Select * From ".TABLE_SETTINGS."");
	$Row = $db->fetch($SQL);
	define("DEFAULT_LANGUAGE", $Row[2]);
	
	//echo"session="; echo $_SESSION['language2'];
	
	if(!isset($_SESSION['language2'])){
		$_SESSION['language2'] = DEFAULT_LANGUAGE;
	}elseif(isset($_GET['language'])){
		$_SESSION['language2'] = $_GET['language'];
	}

	$lang = $_SESSION['language2'];

	if(preg_match("/[^a-z\.]/",$lang)) 
	{
		$_SESSION['error_lang'] ='1';
		$error = $_SESSION['error_lang'];
	}else {
		$result =$db->query("Select * From ".TABLE_LANGUAGES." Where shot_lang Like '".$lang."'");
		$num = $db->num($result);	

		if($num == 0) 
		{
			$_SESSION['error_lang'] ='1';
			$error = $_SESSION['error_lang'];
			$_SESSION['language'] = DEFAULT_LANGUAGE;

		}else {
			unset($_SESSION['error_lang']);
			return $lang;
		}
	}
}
}



class page_set {

function select_page_set() {
$id = $_GET['id'];
if(isset($id)){



if(preg_match("/[^0-9\.]/",$id)) 
{

$_SESSION['error_page'] ='error_page';
$error_page = $_SESSION['error_page'];
}else {
$db = new mysql();
$result =$db->query("Select * From ".TABLE_PAGES." Where id Like '".$id."'");
$num = $db->num($result);	

if($num == 0) 
{

$_SESSION['error_page'] ='error_page';
$error_page = $_SESSION['error_page'];


}else {
unset($_SESSION['error_page']);
return $id;
}
}

}else if(!isset($id)){
unset($_SESSION['error_page']);
return $id;	
}
}
}



class shop_set {

function select_shop_set() {
$id = $_GET['id'];
if(isset($id)){



if(preg_match("/[^0-9\.]/",$id)) 
{

$_SESSION['error_page'] ='error_page';
$error_page = $_SESSION['error_page'];
}else {
$db = new mysql();
$result =$db->query("Select * From ".TABLE_SHOP." Where id Like '".$id."'");
$num = $db->num($result);	

if($num == 0) 
{

$_SESSION['error_page'] ='error_page';
$error_page = $_SESSION['error_page'];


}else {
unset($_SESSION['error_page']);
return $id;
}
}

}else if(!isset($id)){
unset($_SESSION['error_page']);
return $id;	
}
}
}



class product_set {

function select_product_set() {
$id = $_GET['id'];
if(isset($id)){



if(preg_match("/[^0-9\.]/",$id)) 
{

$_SESSION['error_page'] ='error_page';
$error_page = $_SESSION['error_page'];
}else {
$db = new mysql();
$result =$db->query("Select * From ".TABLE_PRODUCTS." Where id Like '".$id."'");
$num = $db->num($result);	

if($num == 0) 
{

$_SESSION['error_page'] ='error_page';
$error_page = $_SESSION['error_page'];


}else {
unset($_SESSION['error_page']);
return $id;
}
}

}else if(!isset($id)){
unset($_SESSION['error_page']);
return $id;	
}
}
}












class news_set {

function select_news_set() {
$news_id = $_GET['news_id'];
if(isset($news_id)){



if(preg_match("/[^0-9\.]/",$news_id)) 
{

$_SESSION['error_news'] ='error_news';
$error_news = $_SESSION['error_news'];
}else {
$db = new mysql();
$result =$db->query("Select * From ".TABLE_NEWS." Where news_id Like '".$news_id."'");
$num = $db->num($result);	

if($num == 0) 
{

$_SESSION['error_news'] ='error_news';
$error_news = $_SESSION['error_news'];


}else {
unset($_SESSION['error_news']);
return $news_id;
}
}

}else if(!isset($news_id)){
unset($_SESSION['error_news']);
return $news_id;	
}
}
}




?>