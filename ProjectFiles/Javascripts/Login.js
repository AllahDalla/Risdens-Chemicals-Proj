"use strict";


window.onload = function(){
    redirectboycott()
    if(window.performance.navigation.type == 0){
        var query = getParameterByName("cred");
        sessionStorage.setItem("query", query)
    }
}

function redirectboycott(){
    var submit = document.getElementById("m_submit");

    submit.addEventListener("click", function(){
        sessionStorage.setItem("no-redirect", "no");
        // var role = document.getElementById("roles").value
        // var name = document.getElementById("username").value
        // var pwd = document.getElementById("pwd").value
        // sessionStorage.setItem("role", role);
        // sessionStorage.setItem("username", name);
        // sessionStorage.setItem("pwd", pwd);
    })
}

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}