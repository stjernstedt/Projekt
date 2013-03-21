<div id="inlogg">
    <h1 class="textlogin">Logga in</h1>
    <form action="user_login.php" method="post">
        <p><label>Användarnamn</label><input type="text" name="userid"></p>
        <p><label>Lösenord</label><input type="password" name="password"></p>

        <p><input class="inputknapp" type="submit" value="Logga in"></p>

        <!--Om ett fel uppstått vid tidigare loginförsök skrivs det här--> 
        <?php
        if (isset($_SESSION['errormsg'])) {
            echo '<p>' . $_SESSION['errormsg'] . '</p>';
            unset($_SESSION['errormsg']);
        }
        ?>
    </form>
</div>