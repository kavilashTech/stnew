<?php
include 'includes/connection.php';


//TODO : Check Ob_start and Session_start. Maybe has to be placed in Login page

ob_start(); //MUST be at the top of your page
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Kavilash Technologies" />
    <title>Stayteller - Admin</title>


    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="http://localhost/New%20folder/stnew/public/js/jquery-3.5.1.min.js#"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.bundle.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    

        <link href=" css/styles.css" rel="stylesheet" />
    <script src="js/all.js" crossorigin="anonymous"></script>
    <!-- <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script> -->
</head>