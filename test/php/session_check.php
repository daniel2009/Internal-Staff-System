<?php

session_start();

//check the user's authority
if (!(isset($_SESSION['authority']) && $_SESSION['authority'] != '')) {

	header ("Location: login.php", true, 301);

}else{
	echo $_SESSION['authority'];
}

?>