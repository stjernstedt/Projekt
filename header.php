<div id="header">
    <div class="login">
        <?php
        /* visar olika knappar beroende på om användaren är inloggad eller inte */
        if (isset($_SESSION['loggedin'])) {
            echo '
        Välkommen, ' . $_SESSION['user'] . '                
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

</div>