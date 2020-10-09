window.onload = function() {
    var inp_login = document.querySelector('input[name=username]');
    var inp_password = document.querySelector('input[name=password]');

    document.querySelector("#buttonLogin").onclick = function() {
        var params = 'login' + inp_login.value + 'password' + inp_password.value;
        ajaxPost(params,"handlers/handlerAuthorization.php", function(data) {
            console.log(data);
        });
    }

    function ajaxGet(url, callback) {
        var f = callback || function(data) {}; 
        var request = new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                f(request.responseText);
            }
        }

        request.open("GET", url);
        request.send();
    }

    function ajaxPost(params, url, callback) {
        var f = callback || function(data) {}; 
        var request = new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                f(request.responseText);
            }
        }

        request.open("POST", url);
        request.send(params);
    }
}