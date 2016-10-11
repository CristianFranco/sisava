$(document).ready(function(){
    //Funciones cambio de sección
    var pathname=window.location.pathname;
    var array=pathname.split('/');
    if(array[2]=="index.php"){
        $("#index").addClass("active");
    }else if(array[2]=="about.php"){
        $("#about").addClass("active");
    }else if(array[2]=="services.php"){
        $("#services").addClass("active");
    }else if(array[2]=="benefits.php"){
        $("#benefits").addClass("active");
    }else if(array[2]=="testimonial.php"){
        $("#testimonial").addClass("active");
    }else if(array[2]=="contact.php"){
        $("#contact").addClass("active");
    }
    
    //Funciones Modal
    var linBtn=document.getElementById("lin");
    var supBtn=document.getElementById("sup");
    var linModal=document.getElementById("dialog");
    var closeLin=document.getElementById("closeLin");
    var closeSup=document.getElementById("closeSup");
    linBtn.onclick=function(){
        var url=location.href;
        location.href="#tologin";
        linModal.style.display="block";
    }
    supBtn.onclick=function(){
        var url=location.href;
        location.href="#toregister";
        linModal.style.display="block";

    }
    window.onclick = function(event) {
        if (event.target == linModal) {
            linModal.style.display = "none";
        }
    }
    closeLin.onclick=function(){
        linModal.style.display="none";
    }
    closeSup.onclick=function(){
        linModal.style.display="none";
    }
    
    //Funciones medidor de fuerza
    var strength = {
      0: "Muy malo",
      1: "Malo",
      2: "Debil",
      3: "Bueno",
      4: "Fuerte"
    }
    var password = document.getElementById('passwordsignup');
    var meter = document.getElementById('password-strength-meter');
    var text = document.getElementById('password-strength-text');

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
    var password = document.getElementById("passwordsignup"), confirm_password = document.getElementById("passwordsignup_confirm");

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
    
    /*//Registrarse
    $("#signup").click(function(){
      var data=$("#signupForm").serialize();
      $.post("signup.php",data);
   });*/
    
});

/*jQuery(document).ready(function(){
   $("#signup").click(function(){
      var data=$("#signupForm").serialize();
      $.post("signup.php",data);
   });
});*/