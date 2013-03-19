function checkForm() {
    
    // rensar gamla error meddelanden
    for (var i=1;i<10;i++) {
        document.getElementById('error'+i).style.display='none';
    }
    
    // Reguljära uttryck som kollar att det är rimlig data
    
    // Om det reguljära uttrycket och indatan ej matchar ges ett error
    var regex = /^[A-ZÅÄÖ]?[a-zåäö]{2,24}$/;
    var input = document.getElementById('forename').value;
    if(!regex.test(input)) {
        document.getElementById('error1').style.display='inline';
        return false;
    }
    
    input = document.getElementById('surname').value;
    if(!regex.test(input)) {
        document.getElementById('error2').style.display='inline';
        return false;
    }
    
    regex = /\d{10}/;
    input = document.getElementById('personalcn').value;
    if(!regex.test(input)) {
        document.getElementById('error3').style.display='inline';
        return false;
    }
    
    regex = /^[A-ZÅÄÖ]?[a-zåäö]{4,20}\s\d{1,4}$/;
    input = document.getElementById('address').value;
    if(!regex.test(input)) {
        document.getElementById('error4').style.display='inline';
        return false;
    }
    
    regex = /^\d{3}\s?\d{2}$/;
    input = document.getElementById('zipcode').value;
    if(!regex.test(input)) {
        document.getElementById('error5').style.display='inline';
        return false;
    }
    
    regex = /\w+@\w+\.+\w+/;
    input = document.getElementById('email').value;
    if(!regex.test(input)) {
        document.getElementById('error6').style.display='inline';
        return false;
    }
    
    regex = /\d{9,10}/;
    input = document.getElementById('phonenr').value;
    if(!regex.test(input)) {
        document.getElementById('error7').style.display='inline';
        return false;
    }

    regex = /\S{3,25}/;
    input = document.getElementById('userid').value;
    if(!regex.test(input)) {
        document.getElementById('error8').style.display='inline';
        return false;
    }

    regex = /\S{3,50}/;
    input = document.getElementById('password').value;
    if(!regex.test(input)) {
        document.getElementById('error9').style.display='inline';
        return false;
    }
    
    regex = new RegExp(document.getElementById('password').value+'$');
    input = document.getElementById('password2').value;
    if(!regex.test(input)) {
        document.getElementById('error10').style.display='inline';
        return false;
    }

}