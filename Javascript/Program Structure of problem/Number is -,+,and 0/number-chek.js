function Get(){
    let n= document.getElementById("num").value;
    console.log(n);
    
    if(n>0) {
       console.log("The Number is Positive")
        console.log(n)
    }
    else if(n<0){
        console.log(" The Number is Nagetive")
        console.log(n);
    }
    else if(n==0)
    {
        console.log("The Number is Equal to Zero")
        console.log(n);
    }

}