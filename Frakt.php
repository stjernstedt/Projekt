<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http//www.w3.org/T/html4/loose.dtd">
<html>
    <head>
        <link rel="shortcut icon" href="favicon.ico">
        <META http-equiv="Content-Type" content="text/html;
              charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="Cssmall.css">
        <script language="javascript" type="text/javascript" src="javascript.js"></script>
    </head>
    <body>
        <noscript>Din browser stödjer ej javascript!</noscript>
        <div id="bakgrund">
            <div id="mainwindow">
                <?php
                include("header.php");
                include("Menyknappar.php");
                ?>
<div id="SecondWindow">
<div id="Frakt">
    
                            <table>
<tr>
<td><h1>Frakt Information:</h1>
<br>
<H3>Frakt</H3>
<p>
Frakten ligger på 200:-  
</p>

        </div>
 </div>

   </div>

        </div>
    </body>
</html>