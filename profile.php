<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http//www.w3.org/T/html4/loose.dtd">
    <?php
    session_start();
    $conn = mysql_connect('localhost', 'root');
    mysql_select_db('projekt');
    mysql_set_charset('utf8');
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

            /* letar reda på användarens rad i databasen och sparar den som en array */
            $q1 = "SELECT * FROM kund";
            $res1 = mysql_query($q1);
            while ($line = mysql_fetch_array($res1)) {
                if ($line['UserID'] == $_SESSION['user']) {
                    $user = $line;
                    break;
                }
            }
            ?>

            <div id="SecondWindow">
                <form action="user_edit.php" method="post">
                    <p><label>Förnamn</label><input type="text" name="forename" class="textbox" value="<?php echo $user['Forename'] ?>"></p>
                    <p><label>Efternamn</label><input type="text" name="surname" class="textbox" value="<?php echo $user['Surname'] ?>"></p>
                    <p><label>Adress</label><input type="text" name="address" class="textbox" value="<?php echo $user['Address'] ?>"></p>
                    <p><label>Postnummer</label><input type="text" name="zipcode" class="textbox" value="<?php echo $user['Zipcode'] ?>"></p>
                    <p><label>E-mail</label><input type="text" name="email" class="textbox" value="<?php echo $user['Email'] ?>"></p>
                    <p><label>Telefon</label><input type="text" name="phonenr" class="textbox" value="<?php echo $user['Phonenumber'] ?>"></p>
                    <input type="hidden" name="userid" value="<?php echo $user['UserID'] ?>">
                    <br>
<!--                    <p><label>Lösenord</label><input type="text" name="password" class="textbox" value=""></p>
                    <p><label>Lösenord igen</label><input type="text" name="password" class="textbox" value=""></p>-->

                    <p><input type="submit" value="Ändra">
                </form>
            </div>
        </div>
    </body>
</html>
<?php
mysql_close($conn);
?>