function Get()
{
   const Cp = document.getElementById("cost").value;
   const SP = document.getElementById("sel").value;
    if(Cp<SP)
    {
        const profit=Cp-SP;
        console.log("Profit");
        console.log(profit);
        
    }
    else if(Cp>SP){
        const loss=Cp-SP;
        console.log("Loos")
        console.log(loss);
    }
    else if(Cp==SP){
        const equal=Cp-SP;
        console.log("Equal")
        console.log(equal);
    }

    

    
}