<!--  header for Admin index.php-->
<?php ob_start();  ?>        <!-- output buffering. Treba za redirektanje sa header(), šalje sve istovremeno u headeru -->
<!-- ob_start() 'skuplja' podatke sa stranice (tekst itd) i naknadno sve šalje u headeru a ne jedan po jedan kada je header već poslan -->
<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=54ruah2qpe0q7d5mwnblaoa86ge238560wlkznzvhk0tdfqk"></script>

<?php session_start(); ?> <!-- za korištenje user podataka dobivenih u login str. -->

<?php // ako se user odlogirao 'user_role' više ne postoji i redirecta ga na index.php
    if (!isset($_SESSION['user_role'])) {
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>