function ajax(method, url, success_callback, fail_callback=null){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            success_callback(this);
        } else {
            if(fail_callback !== null){
                fail_callback(this);
            }
        }
    };
    xmlhttp.open(method, url, true);
    xmlhttp.send();
}