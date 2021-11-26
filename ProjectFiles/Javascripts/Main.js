"use strict";

// Starting the real coding for pages here


// This right here runs the entire script. All functions made will be called inside this function
window.onload = function(){
    buttonFucntions()
    // alert("Click a sidebar button and see what it does. Analyze code. This is the format we are using. Works well as you can see")
    console.log(window.performance.navigation.type)
    if (window.performance.navigation.type == 0){
        var page = document.getElementById("MS-btn").click()
        console.log(page)
    }



}


function buttonFucntions(){
    // Sidebar Buutons are initialized here
    var sidebarManageStock = document.getElementById("MS-btn") //gets the sidebar buttons
    var sidebarManageOrder = document.getElementById("MO-btn")
    var sidebarGenFinRep = document.getElementById("GFR-btn")
    var sidebarSettings = document.getElementById("settings-btn")
    var sidebarLogout = document.getElementById("logout-btn")

    // gets buttons that are requested from php files after fetching ofcourse
    var manageStockAddStockBtn = document.getElementById("add-stock-btn") //  gets the manage stock button that comes up on the manage stock page
    
    var mainarea = document.getElementById("stock-result") // gets main area where each page is going to be displayed using AJAX

    sidebarManageStock.addEventListener("click", async function(e){
        e.preventDefault();
        sidebarManageStock.className = "active"
        sidebarManageOrder.className = "pulsate"
        sidebarGenFinRep.className = "pulsate"
        sidebarSettings.className = "pulsate"
        sidebarLogout.className = "pulsate"

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
        f.preventDefault();
        sidebarManageStock.className = "pulsate"
        sidebarManageOrder.className = "active"
        sidebarGenFinRep.className = "pulsate"
        sidebarSettings.className = "pulsate"
        sidebarLogout.className = "pulsate"

        var url = "../PhpApi/admin-page.php?page=manageorder"

        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    let pagedata = await response.text() //collects data from php file
                    mainarea.innerHTML = ""+pagedata // adds data from php file to the main area on the admin page for manage stock
                    manageOrderButtonFunction();
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
        g.preventDefault();
        sidebarManageStock.className = "pulsate"
        sidebarManageOrder.className = "pulsate"
        sidebarGenFinRep.className = "active"
        sidebarSettings.className = "pulsate"
        sidebarLogout.className = "pulsate"

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
        h.preventDefault();
        sidebarManageStock.className = "pulsate"
        sidebarManageOrder.className = "pulsate"
        sidebarGenFinRep.className = "pulsate"
        sidebarSettings.className = "active"
        sidebarLogout.className = "pulsate"

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

//THESE FUNCTIONS ARE FOR RIGHT HAND SIDE OF PAGE. 
//GIVES BUTTONS THEIR FEATURES. DO NOT TURN OFF JAVASCRIPT.

function managestockButtonFunction(){ 
    var addStock = document.getElementById("add-stock-btn")
    var updateStock = document.getElementById("update-stock-btn")
    var result = document.getElementById("result-area")


    addStock.addEventListener("click", async function(e){
        e.preventDefault();

        var url = "../PhpApi/managestockbuttonfunctions.php?button=add"

        result.innerHTML = ""

        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    var input_field = await response.text()
                    result.innerHTML = ""+input_field

                    //COLLECTING DATA TO INSERT INTO DATABASE FROM USER ADD STOCK FIELD
                    var submit = document.getElementById("submit-btn")
                    submit.addEventListener('click', async function(event){
                        alert("Record has been added")                  
                    })

                    return;

                }else{
                    return Promise.reject("The response was not 200. Something went wrong")
                }
            })
            .catch(error =>{
                console.log("There was error with the connection: "+error)
            })
    })

    updateStock.addEventListener("click", async function(f){
        f.preventDefault();

        var url = "../PhpApi/managestockbuttonfunctions.php?button=update"

        result.innerHTML = ""

        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    var input_field = await response.text()
                    result.innerHTML = ""+input_field

                    var submit = document.getElementById("submit-btn")
                    submit.addEventListener('click', async function(event){
                        alert("Record has been updated")                  
                    })

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

// Davaskye, your function will be right here
function manageOrderButtonFunction(){
    var placeOrder = document.getElementById("place-order-btn")
    var generateReceipt = document.getElementById("generate-receipt-btn")
    var viewSchedule = document.getElementById("view-schedule-btn")
    var result = document.getElementById("result-area")


    placeOrder.addEventListener("click", async function(e){
        e.preventDefault();

        var url = "../PhpApi/manageorderbuttonfunctions.php?button=place-order"

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

    generateReceipt.addEventListener("click", async function(f){
        f.preventDefault();

        var url = "../PhpApi/manageorderbuttonfunctions.php?button=generate-receipt"

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

    viewSchedule.addEventListener("click", async function(f){
        f.preventDefault();

        var url = "../PhpApi/manageorderbuttonfunctions.php?button=view-schedule"

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


// THIS FUNCTION IS BUILT TO REOPEN A PAGE WITH THE CURRENT STATS UPON REDIRETION
// FROM PHP PAGE SO THAT THE USER DOES NOT NEED TO CLICK BACK THE SIDEBAR BUTTONS TO REFRESH PAGE
// THIS IS A TEST FUNCTION, IT MAY OR MAY NOT BE USED

function refresh(a){
    if (a === undefined){
        var clicked = 0
    }else{
        var clicked = a
    }

    if (clicked == 1){
        window.onload = function(){
            var page = document.getElementById("MS-btn")
            page.click()
        }
        
    }
}

