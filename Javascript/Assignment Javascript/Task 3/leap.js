function Check()
{
    let n= document.getElementById("year").value;
    if(n%4==0)
    {
        document.write(n+ "  Is a Leap Year");
    }
    else{
        document.write(n+ "  Is Not a Leap Year");
    }
}