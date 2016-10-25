function disp(form) {
    if (form.style.display == "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}



function SendForm(formid, fieldnames, action) {

    //var data = $('#' + formid).serialize();//собираем все данные в строку
    var data = 'text='+document.getElementById(formid).value;
    var request = new XMLHttpRequest();
    request.open('POST', action);

    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.onload = function () {
        if (request.status >= 200 && request.status < 400) {
            // Success!
            //var resp = $('body').load('index.php');
            var http = new XMLHttpRequest();
            http.open('GET', 'index.php');
            http.onreadystatechange = function ()
            {
                if (http.readyState == 4)
                {
                    document.body.innerHTML = http.responseText;
                }
            }

            http.send(null);
        } else {
            // We reached our target server, but it returned an error

        }
    };
    request.send(data);
}

function GetForm(action) {

    var request = new XMLHttpRequest();
    request.open('GET', action);
    request.onload = function () {
        if (request.status >= 200 && request.status < 400) {
            // Success!
            var http =  new XMLHttpRequest();
            http.open('GET', 'index.php');
            http.onreadystatechange = function ()
            {
                if (http.readyState == 4)
                {
                    document.body.innerHTML = http.responseText;
                }
                
            }
            http.send(null);
        } else {
            // We reached our target server, but it returned an error

        }
    };
    request.send();
}
  