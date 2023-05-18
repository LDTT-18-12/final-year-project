
// var myName = window.prompt("What's your name?");
// console.log("Hello",myName);


document.getElementById("myButton").onclick = function()
{
    var myInput= document.getElementById("myText").value;  //Full gmail
    const myName=myInput.split('@')[0]   // rimshaparveen
    const temp = myInput.split('@')[1]   // gmail.com
    const sPro =temp.split('.')[0]      // gmail
    const extnsn =temp.split('.')[1]     // com

    console.log("Hello");
    document.write(myInput+ "<br>")
    console.log(myInput);   // Full gmail
    document.write(myName +"<br>")
    console.log(myName);    // gmail.com
    document.write(sPro +"<br>")
    console.log(sPro);      // gmail
    document.write(extnsn +"<br>")
    console.log(extnsn);    // com

    
}
