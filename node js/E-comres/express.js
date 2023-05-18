const http = require("http");
const ejs = require("ejs");

 const express = require("express");
  const app = express();


  app.set('view engine','ejs');


  // Servering static content like css, js , images...
// public folder exist custom or statics resoures..
  app.use(express.static("public"));

  app.get("/", (request, response)=>{
    response.render("home.ejs", {
        title: "Home page"
    });
  })


  app.get("/footer", (request, response)=>{
    response.render("footer.ejs", {
        title: "footer page"
    });
  })

  app.get("/footer", (request, response)=>{
response.render("footer.ejs", {
    title: "Footer page"
});
  })

  


  app.listen(4040, ()=>{
    console.log("server is running from E-Commres");
  })
