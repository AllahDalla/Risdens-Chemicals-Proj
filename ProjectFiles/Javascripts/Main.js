"use strict";

// Starting the real coding for pages here





function buttonFucntions(){
    // Sidebar Buutons are initialized here
    var sidebarManageStock = document.getElementById("MS-btn") //gets the sidebar buttons
    var sidebarManageOrder = document.getElementById("MO-btn")
    var sidebarGenFinRep = document.getElementById("GFR-btn")
    var sidebarSettings = document.getElementById("settings-btn")
    var sidebarLogout = document.getElementById("logout-btn")

    // gets buttons that are requested from php files after fetching ofcourse
    //var manageStockAddStockBtn = document.getElementById("add-stock-btn") //  gets the manage stock button that comes up on the manage stock page
    
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
    var viewLog = document.getElementById("view-log-btn")
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
                        sessionStorage.setItem("page", "1")
                        alert("Record has been added if the product name does not already exist from the same supplier.")             
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
                        sessionStorage.setItem("page", "1")
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

    viewLog.addEventListener("click", async function(f){
        f.preventDefault();

        var url = "../PhpApi/managestockbuttonfunctions.php?button=view-log"

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

                    var submit = document.getElementById("submit-btn")
                    submit.addEventListener('click', async function(event){
                        sessionStorage.setItem("page","2");
                        alert("Order has been placed")                  
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

    generateReceipt.addEventListener("click", async function(f){
        f.preventDefault();

        var url = "../PhpApi/manageorderbuttonfunctions.php?button=generate-receipt"

        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    var input_field = await response.text()
                    result.innerHTML = ""+input_field

                    var submit = document.getElementById("submit-btn")
                    submit.addEventListener('click', async function(event){
                        sessionStorage.setItem("page","2");
                        alert("Receipt has been generated")                  
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

    viewSchedule.addEventListener("click", async function(f){
        f.preventDefault();

        var url = "../PhpApi/manageorderbuttonfunctions.php?button=view-schedule"

        await fetch(url)
            .then(async response =>{
                if(response.ok){
                    var input_field = await response.text()
                    result.innerHTML = ""+input_field

                    var submit = document.getElementById("submit-schedule-btn")

                    submit.addEventListener("click", async function(event){
                        sessionStorage.setItem("page", "2")
                        sessionStorage.setItem("schedule", "yes")
                      
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


// This right here runs the entire script. All functions made will be called inside this function
window.onload = async function(){
    buttonFucntions()
    
    console.log(window.performance.navigation.type)
    if(sessionStorage.getItem("no-redirect") == "yes"){
        if (window.performance.navigation.type == 0){
          
            if (sessionStorage.getItem("page") == 1){
                var page = document.getElementById("MS-btn").click()
                sessionStorage.removeItem("page")
            }else if(sessionStorage.getItem("page") == 2){
                    if(sessionStorage.getItem("schedule") == "yes"){
                        var page = document.getElementById("MO-btn").click()
                        syncDelay(700)
                        scheduler()
                        sessionStorage.removeItem("page")
                        sessionStorage.removeItem("schedule")
                    }else{
                        var page = document.getElementById("MO-btn").click()
                        sessionStorage.removeItem("page")
                    }
                    
                }
                
        }
    }
    sessionStorage.setItem("no-redirect", "yes");
   
   
}


// THIS FUNCTION IS USED TO COMPLIMENT/ AID THE VIEW SCHEDULE FUNCTION.
// THIS FUNCTIONS FECTHES DATA FROM ADMIN-PAGE.PHP AND RETRIEVES THE SCHEDULE TO BE DISPLAYED
async function scheduler(){
    var url = "../PhpApi/admin-page.php?getschedule=yes"
                        
    await fetch(url)
        .then(async response => {
            if(response.ok){
                var input_field = await response.text()
                // syncDelay(700)
                var result = document.getElementById("result-area")
                // console.log(result)
                result.innerHTML = ""+input_field
                return;
            }else{
                return Promise.reject("The response was not 200. Something went wrong")
            }
        })
        .catch(error =>{
            console.log("There was error with the connection: "+error)
        })
}

//THIS FUNCTION DELAYS THE APPLICATION BY A FEW SECONDS TO GIVE THE DOCUMENT TIME TO LOAD TO
// FIND OR DETECT OR GET AN ELEMENT

function syncDelay(milliseconds){

    var start = new Date().getTime()
    // console.log("This is the start value : "+start)
    var end = 0
    while((end-start) < milliseconds){
        // console.log("This is the milliseconds : "+milliseconds)
        // console.log("This is end-start value"+(end-start))
        end = new Date().getTime()
    }

}
// console.log("Before Delay")
// syncDelay(700)
// console.log("After Delay")
