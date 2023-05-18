function App(){
    let newDate=new Date(document.getElementById('sendDate').value);
    let setDate=newDate.getDate(newDate);
    let setMonth=newDate.getMonth(newDate);
    let setYear=newDate.getFullYear(newDate);
    document.getElementById('compDate').innerHTML='FullDate : '+newDate;
    document.getElementById('getDate').innerHTML='Day : '+setDate;
    document.getElementById('getMonth').innerHTML='Month : '+setMonth;
    document.getElementById('getYear').innerHTML='Year : '+setYear;
}