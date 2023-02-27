<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../admin/login.php"); // Redirecting To Home Page
}
?>