<div id="header">
    <div class="login">
        <?php
        /* visar olika knappar beroende på om användaren är inloggad eller inte */
        if (isset($_SESSION['loggedin'])) {
            echo '
        Välkommen, ' . $_SESSION['user'] . '                
        <ul>
        <li><a href="user_logout.php">Logga ut</a></li>
	<li><a href="profile.php">Profil</a></li>
	</ul>
        ';
        } else {
            echo '
        <ul>
        <li><a href = "inlogg.php">Logga in</a></li>
        <li><a href = "registrera.php">Registrera</a></li>
        </ul>
        ';
        }
        ?>

    </div>

</div>