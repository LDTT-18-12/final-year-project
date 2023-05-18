function App(){
    let mobileNumber=document.getElementById('sendMobile').value;
    console.log(typeof mobileNumber);
    let mN=mobileNumber;
    let com=mobileNumber%10000000;
    let num=mobileNumber/10000000;
    num=parseInt(num);

    document.getElementById('getMobileNumber').innerHTML='Mobile Number : '+mobileNumber;
    document.getElementById('evenHepon').innerHTML='Company : '+'+92'+num;
    document.getElementById('beforeHepon').innerHTML='Number : '+com;
}