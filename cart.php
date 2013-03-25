<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

                <?php
                $anslut = mysql_connect("localhost", "root", "") or die("Could not connect");
                mysql_select_db('webbshop') or die("could not select database");
                error_reporting(0);
                mysql_set_charset('UTF8');
                ?>

                <?php
                $ProductID = $_GET['id'];
                
                $action = $_GET['action']; 
                /*Om om produktid inte existerar så gör den funktionen product exists som finns längre ner i koden*/
               
                if ($ProductID && !productExists($ProductID)) {
                    die("Error. Product Doesn't Exist");
                }
                /*Här bestämmer den om den ska lägga till i antal på produkten i varukorgen eller om du ska ta bort en i antal eller tömma korgen helt*/
                switch ($action) { 
                    case "add":


                        $_SESSION['cart'][$ProductID]++;

                        break;

                    case "remove":
                        $_SESSION['cart'][$ProductID]--; 
                        if ($_SESSION['cart'][$ProductID] == 0)
                            unset($_SESSION['cart'][$ProductID]); 
                        break;

                    case "empty":
                        unset($_SESSION['cart']);
                        
                        break;
                }
                ?>



                <?php
                $total = 0;
                /*Här visar den varukorgen om det finns en produkt tillagd annars visar den att din varukorg är tom*/
                if (isset($_SESSION['cart'])) { 
                    
                    echo '<h1 id="h1cart">Varukorg</h1>';

                    echo '<div id="cartruta">';
                    foreach ($_SESSION['cart'] as $ProductID => $quantity) {

                       /*Du använder sprintf för att vara säker om id du skickar in i frågan är ett nummer för att förhindra sql injection.*/
                       
                        $sql = sprintf("SELECT Productname, Sellprice FROM produkter WHERE ProductID = %d;", $ProductID);

                        $result = mysql_query($sql);

                        
                        if (mysql_num_rows($result) > 0) {

                            list($Productname, $Sellprice) = mysql_fetch_row($result);

                            $line_cost = $Sellprice * $quantity; 
                            $total = $total + $line_cost;   




                            /* Utskrift av varukorg */
                            echo '<div class="cart">';

                            echo '<img class="varukorgbild" src="Bilder/' . $ProductID . '.jpg">';
                            echo '<div class="produkt">';
                            echo 'Produkt: ' . '<br>' . $Productname;

                            
                            echo '<div class="antal">';
                            echo 'Antal: ' . $quantity . '<br>' . '<br>' . '<br>' . "<a href='$_SERVER[PHP_SELF]?page=cart&action=remove&id=$ProductID'>-</a>" .
                            "<a href='$_SERVER[PHP_SELF]?page=cart&action=add&id=$ProductID'>+</a>";
                            echo '<div class="pris">';
                            echo 'Pris: ' . '<br>' . $line_cost . ' Kr';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    echo '</div>';

                    


                    echo '<div class="cartbutton">';
                    echo '<a href="Index.php">Fortsätt shoppa</a>';
                    echo '<a href="index.php?page=checkout">Till kassan</a>';
                    echo "<a href='$_SERVER[PHP_SELF]?page=cart&action=empty'>Töm kundvagn</a>" . '<br>' . '<br>' . '<br>';



                    echo '<div id="total1">';
                    echo "<h1>Total: $total Kr  </h1>";
                    echo '</div>';
                    echo '</div>';
                    
                } else {
                    /*Utskrift för varukorgen om den är tom*/
                    echo '<h1 id="h1cart">Varukorg</h1>';
                    echo '<div id="maincart">';
                    echo '<div id="cartruta">';
                    echo '<div id="Tomvarukorg">';
                    echo '<h1>' . 'Din varukorg är tom' . '</h1>';
                    echo '</div>';

                    echo '<div class="cartbutton2">';
                    echo '<a href="Index.php">Fortsätt shoppa</a>';





                    echo '</div>';

                    echo '</div>';
                    echo '</div>';
                }
                /*Denna function kollar om en produkt exicterar eller ej.*/
                function productExists($ProductID) {

                    $sql = sprintf("SELECT * FROM produkter WHERE ProductID = %d;", $ProductID);

                    return mysql_num_rows(mysql_query($sql)) > 0;
                }
                ?>

            </div>
        </div>

