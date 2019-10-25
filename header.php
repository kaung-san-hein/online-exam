<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="quiz.css" rel="stylesheet" type="text/css">
    <title>Online Exam System</title>
</head>
<body>
<style>
    body{
        margin-left: 0px;
        margin-top: 0px;
    }
</style>
<table width="100%">
    <tr>
        <td>
            <?php
                if( isset($_SESSION['login']) ){
                    echo "<div align='right'><strong><a href='index.php'>Home</a>|<a href='signout.php'>Signout</a></strong></div>";
                }
                else{
                    echo "&nbsp;";
                }
            ?>
        </td>
    </tr>
</table>