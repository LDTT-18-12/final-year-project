function App(){
    let newDate=new Date(document.getElementById('sendDate').value);
    let today=new Date();
    let difrenceDate=today-newDate;
    let setYear=difrenceDate/(365*24*60*60*1000);
    difrenceDate=difrenceDate%(365*24*60*60*1000);
    let myMonth=difrenceDate/(30*24*60*60*1000);
    difrenceDate=difrenceDate%(30*24*60*60*1000);
    let myDay=difrenceDate/(24*60*60*1000);
    /*let min=sec/60;
    let hour=min/60;
    let day=hour/24;
    let month=day/30;
    let year=month/12;
    let fullYear=parseInt(year);*/
   
    // alert(year);
    /*
    let setDate=newDate.getDate(newDate);
    let setMonth=newDate.getMonth(newDate);
    let setYear=newDate.getFullYear(newDate);
    document.getElementById('compDate').innerHTML='FullDate : '+newDate;*/
    document.getElementById('getDate').innerHTML='Day : '+myDay;
    document.getElementById('getMonth').innerHTML='Month : '+myMonth;
    document.getElementById('getYear').innerHTML='Year : '+setYear;
}