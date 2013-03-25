<div class ="menyHeader">
    <ul class="Meny">
        <li><a href="Index.php">Hem</a></li>
        <li><a href="index.php?page=productdisplay&belonging=vardagsrum">Vardagsrum</a>

            <ul>
                <?php
                createLink('vardagsrum', 'soffa', 'Soffor');
                createLink('vardagsrum', 'förvaring', 'Förvaring');
                createLink('vardagsrum', 'bord', 'Bord');
                createLink('vardagsrum', 'stol', 'Stolar');
                createLink('vardagsrum', 'fotölj', 'Fotölj');
                createLink('vardagsrum', 'belysning', 'Belysning');
                ?>
                <!--                <li><a href="index.php?page=productdisplay&belonging=vardagsrum&furniture=soffa">Soffa</a></li>  
                                <li><a href="index.php?page=productdisplay&belonging=vardagsrum&furniture=förvaring">Förvaring</a></li>   
                                <li><a href="index.php?page=productdisplay&belonging=vardagsrum&furniture=bord">Bord</a></li>
                                <li><a href="index.php?page=productdisplay&belonging=vardagsrum&furniture=stol">Stolar</a></li> 
                                <li><a href="index.php?page=productdisplay&belonging=vardagsrum&furniture=fotölj">Fotölj</a></li>
                                <li><a href="index.php?page=productdisplay&belonging=vardagsrum&furniture=belysning">Belysning</a></li>  -->
            </ul>

        </li>
        <li><a href="index.php?page=productdisplay&belonging=kök">Kök</a>

            <ul>
                <?php
                createLink('kök', 'bord', 'Bord');
                createLink('kök', 'stol', 'Stolar');
                createLink('kök', 'förvaring', 'Förvaring');
                createLink('kök', 'belysning', 'Belysning');
                ?>


                <!--                <li><a href="index.php?page=productdisplay&belonging=kök&furniture=bord">Bord</a></li>  
                                <li><a href="index.php?page=productdisplay&belonging=kök&furniture=stol">Stolar</a></li> 
                                <li><a href="index.php?page=productdisplay&belonging=kök&furniture=förvaring">Förvaring</a></li>
                                <li><a href="index.php?page=productdisplay&belonging=kök&furniture=belysning">Belysning</a></li> -->
            </ul>
        </li>

        <li><a href="index.php?page=productdisplay&belonging=sovrum">Sovrum</a>


            <ul>
                <?php
                createLink('sovrum', 'säng', 'Sängar');
                createLink('sovrum', 'förvaring', 'Förvaring');
                createLink('sovrum', 'bord', 'Bord');
                createLink('sovrum', 'belysning', 'Belysning');
                ?>

                <!--                <li><a href="index.php?page=productdisplay&belonging=sovrum&furniture=säng">Sängar</a></li>  
                                <li><a href="index.php?page=productdisplay&belonging=sovrum&furniture=förvaring">Förvaring</a></li> 
                                <li><a href="index.php?page=productdisplay&belonging=sovrum&furniture=bord">Bord</a></li>
                                <li><a href="index.php?page=productdisplay&belonging=sovrum&furniture=belysning">Belysning</a></li>-->
            </ul>
        </li>
        <li><a href="index.php?page=productdisplay&belonging=arbetsrum">Arbetsrum</a>

            <ul>
                <?php
                createLink('arbetsrum', 'bord', 'Skrivbord');
                createLink('arbetsrum', 'stol', 'Stolar');
                createLink('arbetsrum', 'förvaring', 'Förvaring');
                createLink('arbetsrum', 'belysning', 'Belysning');

//               <li><a href="index.php?page=productdisplay&belonging=arbetsrum&furniture=bord">Skrivbord</a></li>  
//               <li><a href="index.php?page=productdisplay&belonging=arbetsrum&furniture=stol">Stolar</a></li> 
//              <li><a href="index.php?page=productdisplay&belonging=arbetsrum&furniture=förvaring">Förvaring</a></li>
//                <li><a href="index.php?page=productdisplay&belonging=arbetsrum&furniture=belysning">Belysning</a></li> 
                ?>

            </ul>


            <?php
            /*Här gör jag en funktion som gör det lättare att ändra på knappar, se ovan*/
            function createLink($belonging, $furniture, $title) {
                echo '<li><a href="index.php?page=productdisplay&belonging=' . $belonging . '&furniture=' . $furniture . '">' . $title . '</a></li>';
            }
            ?>
        </li>
        <li><a href="index.php?page=Information">Information</a>
            <ul>
                <li><a href="index.php?page=Omoss">Om oss</a></li>  
                <li><a href="index.php?page=KontaktaOss">Kontakta oss</a></li> 
                <li><a href="index.php?page=Frakt">Frakt info</a></li>
                <li><a href="index.php?page=Leverans">Leverans</a></li> 
            </ul>



        </li>
    </ul>

    <div class="sökruta">
        <form name="Sök" action="index.php" method="get">
            <input type="text" name="page" autocomplete="off" value="search" style="visibility: hidden">
            <input type="text" name="term" autocomplete="off" placeholder="Sök...">
            <!--<input type="submit" style="display: none">-->
        </form>
    </div>
</div>