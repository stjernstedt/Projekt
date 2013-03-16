<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            error_reporting(0);
            mysql_set_charset('UTF8')
        
            
        
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
		break;
	
	}
        
        
        
        
        ?>
        
        
        
        <?php
            $total = 0;
            if(isset($_SESSION['cart'])) {	//if the cart isn't empty
		//show the cart
		
			//format the cart using a HTML table
		
			//iterate through the cart, the $product_id is the key and $quantity is the value
			foreach($_SESSION['cart'] as $ProductID => $quantity) {	
				
				//get the name, description and price from the database - this will depend on your database implementation.
				//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
				$sql = sprintf("SELECT Productname, Sellprice FROM produkter WHERE ProductID = %d;",
								$ProductID); 
					
				$result = mysql_query($sql);
					
				//Only display the row if there is a product (though there should always be as we have already checked)
				if(mysql_num_rows($result) > 0) {
				
					list($Productname, $Sellprice) = mysql_fetch_row($result);
				
					$line_cost = $Sellprice * $quantity;		//work out the line cost
					$total = $total + $line_cost;			//add to the total cost
				
					
						//show this information in table cells
						echo 'Produkt: ' . $Productname . '<br>';
						//along with a 'remove' link next to the quantity - which links to this page, but with an action of remove, and the id of the current product
						echo 'Antal: ' . "$quantity <a href=\"$_SERVER[PHP_SELF]?action=remove&id=$ProductID\">-</a>". "    " .
                                                       "<a href=\"$_SERVER[PHP_SELF]?action=add&id=$ProductID\">+</a>" . '<br>';
						echo 'Pris: '. $line_cost. '<br>';
					
					
					
				}
                                
			
			}
			
			//show the total
			
				echo "Total:" .$total. '<br>';
				
			
			
			//show the empty cart link - which links to this page, but with an action of empty. A simple bit of javascript in the onlick event of the link asks the user for confirmation
			
				echo "<a href=\"$_SERVER[PHP_SELF]?action=empty\">Empty Cart</a> "."<a href=\"Index.php\">Fortsätt shoppa</a>";
			
		
		
	
	}else{
		//otherwise tell the user they have no items in their cart
		echo "You have no items in your shopping cart.";
		echo "<a href=\"Index.php\">Fortsätt shoppa</a>";
	}
	
	//function to check if a product exists
	function productExists($ProductID) {
			//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
			$sql = sprintf("SELECT * FROM produkter WHERE ProductID = %d;",
							$ProductID); 
				
			return mysql_num_rows(mysql_query($sql)) > 0;
	}
        
        
        ?>
        
            </div>
         </div>
        
    </body>   
    
    
    
    
    
</html>
