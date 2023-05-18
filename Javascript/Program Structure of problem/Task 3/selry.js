function get()
{
    var salery= parseInt(document.getElementById("grass").value)
    console.log(salery);
    if(salery<=10000)
    {
        var HRA = 20/100*salery
        var DA = 80/100*salery
        var basic = HRA + DA 
        var sum = eval(basic+salery);
        console.log(sum);

    }
    else if(salery<=20000)
    {
        var HRA = 25/100*salery 
        var DA = 90/100*salery
        var asic = HRA + DA 
        var sum = eval(basic+salery);
        console.log(sum);
    }

}