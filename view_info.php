

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http//www.w3.org/T/html4/loose.dtd">
<html>
    <head>
        <META http-equiv="Content-Type" content="text/html;
              charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="Cssmall.css">
        <link rel="shortcut icon" href="favicon.ico">
    </head>
    <body>
        <div id="mainwindow">
            
            <?php
            include("header.php");
            include("Menyknappar.php");
            ?>
            
            <div id="SecondWindow">
        <?php
            $anslut = mysql_connect("localhost","root","") or die("Could not connect");
		mysql_select_db('webbshop')or die("could not select database");
                mysql_set_charset('UTF8');
        ?>
        
        <?php
        $id = $_GET['id'];
        $sql ="SELECT Productname, Sellprice, Information,Weight,Height,Depth,Width FROM produkter WHERE ProductID='$id'";
        $result = mysql_query($sql) or die("Query Failed".mysqpl_error());
        $row = mysql_fetch_array($result);
        echo '<div id="varansinfo">';
        echo '<div id="storbild">'.'<img src="storabilder/'.$id.'.jpg">'.'</div>'.'<div class="viktiginfo">'.'Produkt: '.$row['Productname']."<br>"
                                                                             
                                                                             .'Vikt: '.$row['Weight']." kg<br>"
                                                                             .'Höjd: '.$row['Height']." cm<br>"
                                                                             .'Djup: '.$row['Depth']." cm<br>"
                                                                             .'Bredd: '.$row['Width']." cm<br><br>"
                                                                             .'Pris: '.$row['Sellprice']."Kr<br><br><br><br><br>"
                                                                             ."<a href='cart.php?action=add&id=$id'>Lägg till</a>"
                                                                             .'</div>';
        
        echo '<div id="inforuta">';
        echo   'Information: '.$row['Information']."<br>";
        echo '</div>';
        echo   '</div>';
        
        

        
        ?>
                </div>
            </div>
        
    </body>   
    
    
    
    
    
</html>