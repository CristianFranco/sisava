$(document).ready(function(){
    //Funciones medidor de fuerza
    var strength = {
      0: "Muy malo",
      1: "Malo",
      2: "Debil",
      3: "Bueno",
      4: "Fuerte"
    }
    var password = document.getElementById('pwd');
    var meter = document.getElementById('passwordmeter');
    var text = document.getElementById('passwordtext');

    password.addEventListener('input', function() {
      var val = password.value;
      var result = zxcvbn(val);
      // Update the password strength meter
      meter.value = result.score;
      // Update the text indicator
      if (val !== "") {
        text.innerHTML = "Fortaleza: " + strength[result.score]; 
      } else {
        text.innerHTML = "";
      }
      
    });
    
    //Validar Contraseñas
    var confirm_password = document.getElementById("pwdconf");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Las contraseñas no coinciden");
        confirm_password.style.borderColor="red"
      } else {
        confirm_password.setCustomValidity('');
        confirm_password.style.borderColor="green"
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
});