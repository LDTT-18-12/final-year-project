function Check()
{
   
   var amount =parseInt(document.getElementById("note").value) ;
    var fiftythousand =parseInt(amount/5000) 
    amount=parseInt(amount%5000);

    var onethousand =parseInt(amount/1000) 
    amount=parseInt(amount%1000);

    var fivehundred =parseInt(amount/500)
    amount=parseInt(amount%500);

    var hundred =parseInt(amount/100) 
    amount=parseInt(amount%100);

    var seventyfive =parseInt(amount/75) 
    amount=parseInt(amount%50);

    var fifty =parseInt(amount/50) 
    amount=parseInt(amount%50);

    var twenty =parseInt(amount/20) 
    amount=parseInt(amount%20);

    var ten =parseInt(amount/10) 
    amount=parseInt(amount%10);

    var five =parseInt(amount/5) 
    amount=parseInt(amount%5);

    var two =parseInt(amount/2) 
    amount=parseInt(amount%2);

    var one =parseInt(amount/1) 
    amount=parseInt(amount%1);
    document.write("Fivethousand"+"<br>");
    // document.write("<br>")
    // document.write(<br>);
    document.write(fivehundred+"<br>");
    document.write("onethousand"+"<br>")
    document.write(onethousand+"<br>");
    document.write("Fivethundred"+"<br>")
    document.write(fivehundred+"<br>");
    document.write("Hundred"+"<br>")
    document.write(hundred+"<br>");
    document.write("seventyfive"+"<br>")
    document.write(seventyfive+"<br>");
    document.write("Fifty"+"<br>")
    document.write(fifty+"<br>");
    document.write("twenty"+"<br>")
    document.write(twenty+"<br>");
    document.write("ten"+"<br>")
    document.write(ten+"<br>");
    document.write("Five"+"<br>")
    document.write(five+"<br>");
    document.write("Two"+"<br>")
    document.write(two+"<br>");
    document.write("One"+"<br>")
    document.write(one)+"<br>";
}