function Maximun()
{
  let  m = document.getElementById("first").value;
   let n = document.getElementById("second").value;
   let o = document.getElementById("third").value;

    if(m>=n && m>=o)
    {
        document.write(m +"Is maximum Nummber");
    }
    else if(n>=m && n>=o)
    {
        document.write(n +"Is maxiumm Number");
    }
    else if(o>=m && o>=n)
    {
        document.write(o+" Is maximum Number");
    }
   
    
}