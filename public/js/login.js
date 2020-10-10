function validateUsername(cur){
    var re = /^\w+$/;
    if(!re.test(cur.value)){
        cur.style.borderColor = 'red';
        document.getElementById("errorUsername").innerHTML = "Username hanya menerima kombinasi alphabet, angka, dan underscore";
        return false;
    } else {
        document.getElementById("errorUsername").innerHTML = "";
        cur.style.borderColor = 'green';
        return true;
    }
}

function validateEmail(cur) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(String(cur.value).toLowerCase())){
        cur.style.borderColor = 'red';
        document.getElementById("errorEmail").innerHTML = "Email tidak valid";
        return false;
    } else {
        document.getElementById("errorEmail").innerHTML = "";
        cur.style.borderColor = 'green';
        return true;
    }
}

function validateForm(){
    if(validateUsername(document.getElementById("username"))){
        if(document.getElementById("email") !== "undefined"){
            return validateEmail(document.getElementById("email"));
        } else {
            return true;
        }
    }
    return false;
}

// TODO AJAX cek username dan email unik