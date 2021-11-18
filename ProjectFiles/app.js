"use strict";

let httpRequest = new XMLHttpRequest();

window.onload = function(){ 

    let logout_button = document.getElementById("logout-btn");
   
    logout_button.addEventListener("click", function(event){
        event.preventDefault()
        console.log("Hey. This logs you out!");
    });

}
