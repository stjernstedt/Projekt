<div id="header">
    
    <div class="login">
        <?php
        /* visar olika knappar beroende på om användaren är inloggad eller inte */
        if (isset($_SESSION['loggedin'])) {
            echo '
        <text>Välkommen, ' . $_SESSION['user'] . '</text>
        <ul>
        <li><a href="user_logout.php">Logga ut</a></li>
	<li><a href="index.php?page=profile">Profil</a></li>
	</ul>
        ';
        } else {
            echo '
        <ul>
        <li><a href = "index.php?page=inlogg">Logga in</a></li>
        <li><a href = "index.php?page=registrera">Registrera</a></li>
        </ul>
        ';
        }
        ?>

    </div>
    <div id="knappvara">
        <a href="cart.php">Din varukorg</a>
    </div>
</div>