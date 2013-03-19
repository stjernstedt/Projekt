<form action="spara_anv.php" method="post" onsubmit="return checkForm(this)">
    <p><label>Förnamn</label><input type="text" name="forename" id="forename" class="textbox">
        <text id="error1" class="errormsg" style="display: none">Ej korrekt namn!</text></p>
    <p><label>Efternamn</label><input type="text" name="surname" id="surname" class="textbox">
        <text id="error2" class="errormsg" style="display: none">Ej korrekt namn!</text></p>
    <p><label>Personnummer</label><input type="text" name="personalcn" id="personalcn" class="textbox">
        <text id="error3" class="errormsg" style="display: none">Ej korrekt personnummer!</text></p>
    <p><label>Adress</label><input type="text" name="address" id="address" class="textbox">
        <text id="error4" class="errormsg" style="display: none">Ej korrekt adress!</text></p>
    <p><label>Postnummer</label><input type="text" name="zipcode" id="zipcode" class="textbox">
        <text id="error5" class="errormsg" style="display: none">Ej korrekt postnummer!</text></p>
    <p><label>E-mail</label><input type="text" name="email" id="email" class="textbox">
        <text id="error6" class="errormsg" style="display: none">Ej korrekt email!</text></p>
    <p><label>Telefon</label><input type="text" name="phonenr" id="phonenr" class="textbox">
        <text id="error7" class="errormsg" style="display: none">Ej korrekt telefonnummer!</text></p>
    <br>
    <p><label>Användarid</label><input type="text" name="userid" id="userid" class="textbox">
        <text id="error8" class="errormsg" style="display: none">Välj ett användarnamn mellan 3 och 50 tecken!</text></p>
    <p><label>Lösenord</label><input type="password" name="password" id="password" class="textbox">
        <text id="error9" class="errormsg" style="display: none">Välj ett lösenord mellan 3 och 50 tecken!</text></p>
    <p><label>Lösenord igen</label><input type="password" name="password2" id="password2" class="textbox">
        <text id="error10" class="errormsg" style="display: none">Lösenordet är inte samma!</text></p>

    <p><input type="submit" value="Registrera">

        <?php
        if (isset($_SESSION['errormsg'])) {
            echo '<p>' . $_SESSION['errormsg'] . '</p>';
            unset($_SESSION['errormsg']);
        }
        ?>
</form>