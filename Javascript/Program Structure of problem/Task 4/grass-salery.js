function Check()
{
   var basic_salery= document.getElementById("basic").value;
   var house_rent= document.getElementById("rent").value;
   var medical_allowance= document.getElementById("md-alance").value;
    var gross_salery = parseInt(basic_salery)+ parseInt(house_rent)+ parseInt(medical_allowance);
    var tax = gross_salery*0.2;
    var net_income = gross_salery-tax;
    console.log(" Your Gross pay is  "+gross_salery);
    document.write("<br> Your Gross pay is t\ "+gross_salery);
    console.log(" Your Net Income is  "+net_income);
    document.write("<br> Your Net Income is t\ "+net_income);
    console.log(" Your Taxt deducted on Gross pay was  "+tax);
    document.write("<br> Your Taxt deducted on Gross pay was t\ "+tax);

}