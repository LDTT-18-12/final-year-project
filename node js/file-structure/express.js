const http = require("http");

const ejs = require("ejs");

var express = require('express');
var app = express();

app.set('view engine', "ejs");

// Servering static content like css, js , images...
// public folder exist custom or statics resoures..
app.use(express.static('public'));




const posts=[
    "frist",
    "secnd",
    "third",
]
 

app.get('/', (req, res)=>{
res.render('index.ejs',{
    "title": "Home page",
   "name":"Rimsha",
    "login":false,
    "posts":posts,
});

})

app.get("/about", (req,res)=>{
    res.render("about.ejs", {
        title: "About page"
    });
})

app.get("/gallery", (req,res)=>{
    res.render("gallery.ejs", {
        title: "Gallery page"
    });
})

app.get("/footer", (req,res)=>{
    res.render("footer.ejs", {
        title: "Footer page"
    });
})

app.listen(3030, (request, response)=>{
console.log("server is running from file")
})