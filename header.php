<div id="header">
    <div class="login">
        <?php
        if (isset($_SESSION['loggedin'])) {
            echo '
                <ul>
		<li><a href="user_logout.php">Logga ut</a></li>
		<li><a href="#">Profil</a></li>
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