<?php 

if(!isset($_SESSION)) {
     session_start();
}


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http//www.w3.org/T/html4/loose.dtd">
<html>
    <head>
        <META http-equiv="Content-Type" content="text/html;
              charset=UTF-8">
        <link rel="shortcut icon" href="favicon.ico">
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
            error_reporting(0);
            mysql_set_charset('UTF8');
        
            
        
        ?>
        
        <?php
            
            
            $ProductID = $_GET['id'];
            //the product id from the URL 
            $action 	= $_GET['action']; //the action from the URL 

	//if there is an product_id and that product_id doesn't exist display an error message
	if($ProductID && !productExists($ProductID)) {
		die("Error. Product Doesn't Exist");
	}

	switch($action) {	//decide what to do	
            
		case "add":
                    

			$_SESSION['cart'][$ProductID]++; //add one to the quantity of the product with id $product_id 
                     
		break;
		
		case "remove":
			$_SESSION['cart'][$ProductID]--; //remove one from the quantity of the product with id $product_id 
			if($_SESSION['cart'][$ProductID] == 0) unset($_SESSION['cart'][$ProductID]); //if the quantity is zero, remove it completely (using the 'unset' function) - otherwise is will show zero, then -1, -2 etc when the user keeps removing items. 
		break;
		
		case "empty":
			unset($_SESSION['cart']); //unset the whole cart, i.e. empty the cart. 
                        header('location:cart.php');
		break;
	
	}
        
        
        
        
        ?>
        
        
        
        <?php
            $total = 0;
            if(isset($_SESSION['cart'])) {	//if the cart isn't empty
		//show the cart
		
			//format the cart using a HTML table
		
			//iterate through the cart, the $product_id is the key and $quantity is the value
                
                        echo '<h1 id="h1cart">Varukorg:</h1>';
               echo '<div id="maincart">';         
               echo '<div id="cartruta">';
			foreach($_SESSION['cart'] as $ProductID => $quantity) {	
				
				//get the name, description and price from the database - this will depend on your database implementation.
				//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
				$sql = sprintf("SELECT Productname, Sellprice FROM produkter WHERE ProductID = %d;",
								$ProductID); 
					
				$result = mysql_query($sql);
					
				//Visar raden om det finns en produkt
				if(mysql_num_rows($result) > 0) {
				
					list($Productname, $Sellprice) = mysql_fetch_row($result);
				
					$line_cost = $Sellprice * $quantity;		//work out the line cost
					$total = $total + $line_cost;			//add to the total cost
				
                                        
                                        
                                        
                                            /*Utskrift av varukorg*/
						echo '<div id="cart">';
                                                
                                                echo '<img class="varukorgbild" src="Bilder/'.$ProductID.'.jpg">';
                                                echo '<div class="produkt">';
						echo 'Produkt: '.'<br>' . $Productname;
                                                
						//along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
						echo '<div class="antal">';
                                                echo 'Antal: ' . $quantity .'<br>'.'<br>'.'<br>'. "<a href='$_SERVER[PHP_SELF]?action=remove&id=$ProductID'>-</a>" .
                                                       "<a href='$_SERVER[PHP_SELF]?action=add&id=$ProductID'>+</a>";
                                                echo '<div class="pris">';
						echo 'Pris: '.'<br>'. $line_cost.' Kr';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                       
					
				}
                                
			
			}
                        echo '</div>';
                        echo '</div>';
			//show the total
			echo '<div id="total">';
                        
                        echo '<div class="cartbutton">';
                        echo '<a href="Index.php">Fortsätt shoppa</a>';
                        echo '<a href="index.php?page=checkout">Till kassan</a>';
                        echo "<a href='$_SERVER[PHP_SELF]?action=empty'>Töm kundvagn</a>".'<br>'.'<br>'.'<br>';
                        
                        
                        echo '</div>';
                        echo '<div id="total1">';
				echo "<h1>Total: $total Kr  </h1>";
			echo '</div>';
			echo '</div>';
			//show the empty cart link - which links to this page, but with an action of empty. A simple bit of javascript in the onlick event of the link asks the user for confirmation
                       
		
		
	
	}else{
		//otherwise tell the user they have no items in their cart
		
			//show the total
            echo '<h1 id="h1cart">Varukorg:</h1>';
             echo '<div id="maincart">';         
               echo '<div id="cartruta">';
               echo '<div id="Tomvarukorg">';
               echo '<h1>'.'Din varukorg är tom'.'</h1>';
               echo '</div>';
                        
                        echo '<div class="cartbutton2">';
                        echo '<a href="Index.php">Fortsätt shoppa</a>';
                        
                        
                        
                        
                        
			echo '</div>';
                        
                        echo '</div>';
			echo '</div>';
		
	}
	
	
	function productExists($ProductID) {
			
			$sql = sprintf("SELECT * FROM produkter WHERE ProductID = %d;",
							$ProductID); 
				
			return mysql_num_rows(mysql_query($sql)) > 0;
	}
        
        
        ?>
        
            </div>
         </div>
        
    </body>   
    
    
    
    
    
</html>
