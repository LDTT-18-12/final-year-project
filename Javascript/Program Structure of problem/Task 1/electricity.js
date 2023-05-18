function Get(){
    let conUnit = document.getElementById("unit").value;
    console.log(conUnit);
    
    var bill=0;
    if(conUnit<=50) {
         bill=conUnit*2;
        console.log(bill)
        document.write(bill)
    }
    else if(conUnit<=100){
        bill=conUnit*5;
        console.log(bill);
        document.write(bill)
    }
    else if(conUnit>100 && conUnit<=250)
    {
        bill=conUnit*7;
        console.log(bill);
        document.write(bill)
    }
    else{
        bill=conUnit*10
        console.log(bill);
        document.write(bill)
    }
     if(bill>200){
        bill=bill+conUnit*20/100;
        console.log(bill);
    
    }

}