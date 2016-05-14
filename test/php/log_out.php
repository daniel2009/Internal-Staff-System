<?php

session_start();
//frees all session variables currently registered.
session_unset();
//redirect to login page
echo "success";

?>