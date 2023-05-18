// const colculation = require("./fun");
// colculation(4,5);
// const os = require("os")

// const fleSystei = require("fs")

// info about CPU
// console.log(os.cpus())

// show the tie of system use that time
// console.log(os.uptime());

// system window show. exp:("window 32, window 64")
// console.log(os.platform());

// console.log(fileSyste.readFile("text.txt(error, data)=>{ 
   

//  Show the host name of system
// console.log(os.hostname());
const { response } = require("express");
const express = require ("express");
const app = express();
const { request } = require("http");

app.get("/home", (req, res)=>{
    res.render("home.ejs",{
        title: "ejs home page",
        name: "Ali",
    });
})

app.get("/post/:id", (request, response)=>{

    // This response is used to show the output on the browser.
    //   response.send(request.params.id);
    
    const posts =[
        "Zero Index",
        "one Index",
        "two Index",
    ]
    id =request.params.id;
    
    const post =posts[id]
    
    if( isNaN(id) == true) {
        response.send("id should be a number")
    }
    
    
    if(post != undefined){
        response.send(post)
    }else{
        response.send('Id not found')
    }
    
    })

    app.get("/", (request, response)=>{

        response.send("<h1>Hello from main page</h1");
    })
    app.get("/about", (request, response)=>{
    
        response.send("<h1>Hello from About page</h1>");
    })

    app.listen(8181, ()=>{
    
        console.log("server is running")
    })



