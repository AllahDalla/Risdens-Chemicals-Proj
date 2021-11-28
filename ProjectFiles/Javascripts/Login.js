"use strict";


window.onload = function(){
    redirectboycott()
}

function redirectboycott(){
    var submit = document.getElementById("m_submit");

    submit.addEventListener("click", function(){
        sessionStorage.setItem("no-redirect", "no");
        var role = document.getElementById("roles").value
        var name = document.getElementById("username").value
        var pwd = document.getElementById("pwd").value
        sessionStorage.setItem("role", role);
        sessionStorage.setItem("username", name);
        sessionStorage.setItem("pwd", pwd);
    })
}