<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http//www.w3.org/T/html4/loose.dtd">
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>
<html>
    <head>
        <title>KomfortiaAB</title>
        <link rel="shortcut icon" href="favicon.ico">
        <META http-equiv="Content-Type" content="text/html;
              charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="Cssmall.css">
        <script language="javascript" type="text/javascript" src="javascript.js"></script>
        <title>Komfortia</title>
    </head>
    <body>
        <noscript>Din browser stödjer ej javascript!</noscript>
        
            <div id="mainwindow">
                <?php
                include("header.php");
                include("Menyknappar.php");
                ?>
                <div id="SecondWindow">
                    
<div id="Hem">
    <img src="Bilder/Logo.Png">
    <br>
    <h1>TEXT TEXT TEXT</h1>
    <br>
    <img src="Bilder/Kök.jpg">  <img src="Bilder/Vardagsrum.jpg">
    <img src="Bilder/Sovrum.jpg">          
</div>

                    <?php
                    
                    if (isset($_GET['page'])) {
                        include($_GET['page'] . ".php");
                    }
                    ?>



                    <div style="clear:both;"></div>
                </div>

            </div>

        
    </body>
</html>
