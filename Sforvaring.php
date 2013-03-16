

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
                <div class="vardagsrum">
        <?php
            $anslut = mysql_connect("localhost","root","") or die("Could not connect");
		mysql_select_db('webbshop')or die("could not select database");
                mysql_set_charset('UTF8');
        
        
        
        ?>
        
        <?php
        
        $sql ="SELECT ProductID, Productname, Sellprice, Information FROM produkter WHERE Belonging = 'Sovrum'AND Furnituretype='Förvaring'";
        $result = mysql_query($sql) or die("Query Failed".mysqpl_error());
       
        
        while(list($id, $Productname, $Sellprice, $Information) = mysql_fetch_row($result)) {
//                    $field = $line['ProductID'];
//                    $field2 =$line['Productname'];
//                    $field3 =$line['Sellprice'];   
                        
                        echo '<div class="vara">';
                        echo '<div class="varuutskrift">';
                        echo '<div class="bild">';
                        echo '<img src="Bilder/'.$id.'.jpg">';
                        echo '</div>';
                        echo $Productname . '<br>';
                        echo $Sellprice .' kr' . '<br>';
                        echo $Information . '<br>';
                        echo '</div>';
                        echo '<div class="varuknappar">';
                        echo "<a href=\"cart.php?action=add&id=$id\">Add To Cart</a>" ."<a href=\"#\">View info</a>". '<br>' . '<br>';
                        echo '</div>';
                        echo '</div>';
//				echo 'Productid:' . $field . '<br>';
//				echo 'Name:' . $field2 . '<br>';
//                                echo 'Price:' . $field3 . '<br>';
//				echo "<a href=\"cart.php?action=add&id=$field\">Add To Cart</a>" . '<br>';
			
			
            
            
        }
        
        ?>
                </div>
            </div>
        </div>
        
    </body>   
    
    
    
    
    
</html>