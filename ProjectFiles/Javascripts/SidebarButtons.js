"use strict";

// Starting the real coding for pages here


// This right here runs the entire script. All functions made will be called inside this function
window.onload = function(){
    buttonFucntions()
    // alert("Click a sidebar button and see what it does. Analyze code. This is the format we are using. Works well as you can see")
}


function buttonFucntions(){
    // Sidebar Buutons are initialized here
    var sidebarManageStock = document.getElementById("MS-btn") //gets the sidebar buttons
    var sidebarManageOrder = document.getElementById("MO-btn")
    var sidebarGenFinRep = document.getElementById("GFR-btn")
    var sidebarSettings = document.getElementById("settings-btn")

    // gets buttons that are requested from php files after fetching ofcourse
    var manageStockAddStockBtn = document.getElementById("add-stock-btn") //  gets the manage stock button that comes up on the manage stock page
    
    var mainarea = document.getElementById("stock-result") // gets main area where each page is going to be displayed using AJAX

    sidebarManageStock.addEventListener("click", async function(e){
        e.target.preventDefault;

        var url = "../PhpApi/admin-page.php?page=managestock" //url made to send query to php file, query is designed as page= <page name>

        // using fetch to make things efficient. Will be easir to monitor and read
        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    let pagedata = await response.text() //collects data from php file
                    mainarea.innerHTML = ""+pagedata // adds data from php file to the amin area on the admin page for manage stock
                    managestockButtonFunction();
                    return;
                }
                else{
                    return Promise.reject("Response was not 200")
                }
            })
            // error catching
            .catch(error =>{
                console.log("An error occured with the connection. Error is : "+ error)
            })
    })

    sidebarManageOrder.addEventListener("click", async function(f){
        f.target.preventDefault;

        var url = "../PhpApi/admin-page.php?page=manageorder"

        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    let pagedata = await response.text() //collects data from php file
                    mainarea.innerHTML = ""+pagedata // adds data from php file to the main area on the admin page for manage stock
                    return;
                }
                else{
                    return Promise.reject("Response was not 200")
                }
            })
            // error catching
            .catch(error =>{
                console.log("An error occured with the connection. Error is : "+ error)
            })
    })

    sidebarGenFinRep.addEventListener("click", async function(g){
        g.target.preventDefault;

        var url = "../PhpApi/admin-page.php?page=financialreport" //url made to send query to php file, query is designed as page= <page name>

        // using fetch to make things efficient. Will be easir to monitor and read
        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    let pagedata = await response.text() //collects data from php file
                    mainarea.innerHTML = ""+pagedata // adds data from php file to the amin area on the admin page for manage stock
                    return;
                }
                else{
                    return Promise.reject("Response was not 200")
                }
            })
            // error catching

            .catch(error =>{
                console.log("An error occured with the connection. Error is : "+ error)
            })
    })

    sidebarSettings.addEventListener("click", async function(h){
        h.target.preventDefault;

        var url = "../PhpApi/admin-page.php?page=settings" //url made to send query to php file, query is designed as page= <page name>

        // using fetch to make things efficient. Will be easir to monitor and read
        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    let pagedata = await response.text() //collects data from php file
                    mainarea.innerHTML = ""+pagedata // adds data from php file to the amin area on the admin page for manage stock
                    return;
                }
                else{
                    return Promise.reject("Response was not 200")
                }
            })
            // error catching
            .catch(error =>{
                console.log("An error occured with the connection. Error is : "+ error)
            })
    })
}

function managestockButtonFunction(){
    var addStock = document.getElementById("add-stock-btn")
    var result = document.getElementById("result-area")


    addStock.addEventListener("click", async function(e){
        e.target.preventDefault;

        var url = "../PhpApi/managestockbuttonfunctions.php?button=add"

        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    var input_field = await response.text()
                    result.innerHTML = ""+input_field
                    return;

                }else{
                    return Promise.reject("The response was not 200. Something went wrong")
                }
            })
            .catch(error =>{
                console.log("There was error with the connection: "+error)
            })
    })
}