var usernameValid;
var emailValid;
function validateUsername(cur){
    const re = /^\w+$/;
    usernameValid = re.test(cur.value);
    updateValidation(cur, usernameValid, "errorUsername", "Username only accepts alphanumeric and underscore");
    if(emailValid && usernameValid) checkUnique();
    return usernameValid;
}

function validateEmail(cur) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    emailValid = re.test(String(cur.value).toLowerCase());
    updateValidation(cur, emailValid, "errorEmail", "Invalid email");
    if(emailValid && usernameValid) checkUnique();
    return emailValid;
}

function updateValidation(cur, isValid, id, error_msg){
    if (isValid){
        cur.style.borderColor = 'green';
        document.getElementById(id).innerHTML = "";
    } else {
        cur.style.borderColor = 'red';
        document.getElementById(id).innerHTML = error_msg;
    }
}

function validateForm(){
    if(validateUsername(document.getElementById("username"))){
        if(document.getElementById("email") !== null){
            return validateEmail(document.getElementById("email"));
        } else {
            return true;
        }
    }
    return false;
}

// AJAX cek username dan email unik
function checkUnique() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    if (email.length > 0 && username.length > 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this);
                updateValidation(document.getElementById("username"), this.responseText=='true', "errorUnique", "Username and email is not unique");
                updateValidation(document.getElementById("email"), this.responseText=='true', "errorUnique", "Username and email is not unique");
            }
        };
        xmlhttp.open("GET", encodeURI("/user/checkUnique/" + username + ',' + email.replace('.', ':')), true);
        xmlhttp.send();
    } else {
        return true;
    }
}