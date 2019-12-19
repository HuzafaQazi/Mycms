<?php  
error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
// error_reporting(E_ALL);
 //mysqli_set_charset('utf8');
date_default_timezone_set('Asia/Calcutta');
$config	=	array();

	
include('manage_database.php');
function getDatabase(){
		$HOSTNAME = "localhost";
		$USERNAME = "root";
		$PASSWORD = "";
		$DATABASE = "cms";
    return  $db = new Database($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
}

$db = getDatabase(); 
// include('includes/functions.php');
// include('includes/title.php');

//define("CURL","http://localhost/car_spa/"); 
define("CURL","http://localhost/fex/"); 

 
define("product_limit",5);

define("slider_width",500);
define("slider_height",500);


define("service_width",500);
define("service_height",500);

define("news_width",500);
define("news_height",500); 

define("about_width",500);
define("about_height",500);  


define("blog_width",500);
define("blog_height",500); 


define("gallerypage_width",500);
define("gallerypage_height",500); 


define("home_gallery_width",500);
define("home_gallery_height",500);  
?>