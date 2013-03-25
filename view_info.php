<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php
$anslut = mysql_connect("localhost", "root", "") or die("Could not connect");
mysql_select_db('webbshop') or die("could not select database");
mysql_set_charset('UTF8');
?>

<?php
$id = $_GET['id'];
$sql = "SELECT Productname, Sellprice, Information,Weight,Height,Depth,Width FROM produkter WHERE ProductID='$id'";
$result = mysql_query($sql) or die("Query Failed" . mysqpl_error());
$row = mysql_fetch_array($result);
/* Här Skrivs rutan ut för varans info samt dess data */
echo '<div id="varansinfo">';
echo '<div id="storbild">' . '<img src="storabilder/' . $id . '.jpg">' . '</div>' . '<div class="viktiginfo">' . 'Produkt: ' . $row['Productname'] . "<br>"
 . 'Vikt: ' . $row['Weight'] . " kg<br>"
 . 'Höjd: ' . $row['Height'] . " cm<br>"
 . 'Djup: ' . $row['Depth'] . " cm<br>"
 . 'Bredd: ' . $row['Width'] . " cm<br><br>"
 . 'Pris: ' . $row['Sellprice'] . "Kr<br><br><br><br><br><br><br>"
 . "<a href='index.php?page=cart&action=add&id=$id'>Lägg till</a>"
 . '</div>';
echo '<div class="inforuta">';
echo 'Information: ' . $row['Information'] . "<br>";
echo '</div>';
echo '</div>';
?>
</div>
</div>
