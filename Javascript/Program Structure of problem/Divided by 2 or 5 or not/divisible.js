function Check()
{
   
   const div = document.getElementById("by").value;
    if(div%2==0 && div%5==0)
    {
        
        console.log("Divisible By 2 or 5");
        console.log(div);
        
    }
    else {
        console.log(div)
        console.log("Is not Divisible to 2 or 5");
    }
    

    

    
}