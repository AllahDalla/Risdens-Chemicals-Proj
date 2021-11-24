"use strict";

window.onload = function(){
    loginCredentials();
}



function loginCredentials(){
    var role = document.getElementById("roles").value
    var username = document.getElementById("username").value
    var password = document.getElementById("pwd").value
    var submit = document.getElementById("submit-staff-login")


    submit.addEventListener("click", function(e){
        e.target.preventDefault;

        alert("role:"+role+"\nusername:"+username+"\npassword:"+password)
    })
    

}