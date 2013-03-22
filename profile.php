<?php
if (!isset($_SESSION)) {
    session_start();
}
$conn = mysql_connect('localhost', 'root');
mysql_select_db('webbshop');
mysql_set_charset('utf8');

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

<div id="profilruta">
<div id="profil">
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

        <p><input type="submit" id="submitknapp" value="Ändra">
    </form>
</div>
<div id="profilknapp"><a href="index.php?page=order_history">Order Historik</a></div>
</div>
<?php
mysql_close($conn);
?>