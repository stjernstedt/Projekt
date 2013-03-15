<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http//www.w3.org/T/html4/loose.dtd">
<?php
session_start();
?>
<html>

    <head>
        <META http-equiv="Content-Type" content="text/html;
              charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="Cssmall.css">
    </head>
    <body>
        <div id="mainwindow">
            <?php
            include("header.php");
            include("Menyknappar.php");
            ?>




            <div id="SecondWindow">
                <div id="inlogg">
                    <form action="user_login.php" method="post">
                        <p><label>Användarid</label><input type="text" name="userid"></p>
                        <p><label>Lösenord</label><input type="text" name="password"></p>

                        <p><input type="submit" value="Logga in"></p>
                        
                        <!--Om ett fel uppstått vid tidigare loginförsök skrivs det här--> 
                        <?php
                        if (isset($_SESSION['errormsg'])) {
                            echo '<p>' . $_SESSION['errormsg'] . '</p>';
                            unset($_SESSION['errormsg']);
                        }
                        ?>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>



