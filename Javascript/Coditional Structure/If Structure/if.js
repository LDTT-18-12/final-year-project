//If Structure
function Get(){
     let n=document.getElementById('str').value;
     console.log(n);
    if(n<=30)
    document.write("pass");
}


//If Else Structure
function Get(){
    let num=document.getElementById('str').value;
    console.log(num);
   if(num>=30)
   document.write("pass");
   else{
    document.write("fail")
   }
}


function Get(){
    let mark=document.getElementById('str').value;
    console.log(mark);
   if(mark>=90)
   document.write("+A");
   else if(mark>=80){
    document.write("A");
    }
    else if(mark>=70){
        document.write("+B")
   }
   else if(mark>=60){
    document.write("B")
}
else if(mark>=50){
    document.write("C")
}
else 
    document.write("Fail")
}


