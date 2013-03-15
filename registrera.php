<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http//www.w3.org/T/html4/loose.dtd">
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
           <form action="spara_anv.php" method="post">
                    <p><label>Förnamn</label><input type="text" name="forename" class="textbox"></p>
                    <p><label>Efternamn</label><input type="text" name="surname" class="textbox"></p>
                    <p><label>Personnummer</label><input type="text" name="personalcn" class="textbox"></p>
                    <p><label>Adress</label><input type="text" name="address" class="textbox"></p>
                    <p><label>Postnummer</label><input type="text" name="zipcode" class="textbox"></p>
                    <p><label>E-mail</label><input type="text" name="email" class="textbox"></p>
                    <p><label>Telefon</label><input type="text" name="phonenr" class="textbox"></p>
                    <br>
                    <p><label>Användarid</label><input type="text" name="userid" class="textbox"></p>
                    <p><label>Lösenord</label><input type="text" name="password" class="textbox"></p>
                    <p><label>Lösenord igen</label><input type="text" name="password" class="textbox"></p>

                    <p><input type="submit" value="Registrera">
           </form>
        </div>
    </div>
</body>
</html>