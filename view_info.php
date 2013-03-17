

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
        
        echo   'Namn: '.$row['Productname']."<br>";
        echo   'Pris: '.$row['Sellprice']."Kr<br>";
        echo   'Information: '.$row['Information']."<br>";
        echo   'Vikt: '.$row['Weight']."<br>";
        echo   'Höjd: '.$row['Height']."<br>";
        echo   'Djup: '.$row['Depth']."<br>";
        echo   'Bredd: '.$row['Width']."<br>";
        
        

        
        ?>
                </div>
            </div>
        
    </body>   
    
    
    
    
    
</html>