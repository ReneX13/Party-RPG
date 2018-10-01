var password = document.getElementById("inputPassword")
  , confirm_password = document.getElementById("inputConfirmPassword")
  , username = document.getElementById("inputUserName");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}


password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


function validateUsername(){
  	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               	if( this.responseText == "already exists"){
			confirm_password.setCustomValidity("Username Already Exists");
		}
		else{

		}
            }
  	};
 	 xmlhttp.open("GET", "validation.php?q=" + str, true);
  	xmlhttp.send();
}


username.onchange = validateUsername;
username.onkeyup = validateUsername;
