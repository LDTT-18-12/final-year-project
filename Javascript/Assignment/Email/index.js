
function EMAIL(){
    let eMail;
    eMail=document.getElementById('value').value;
    document.getElementById('h1').innerHTML=document.getElementById('value').value;
    let myName=eMail.split('@')[0];
    let eMail2=eMail.split('@')[1];
    let sPro=eMail2.split('.')[0];
    let gE=eMail2.split('.')[1];
    let a={
        EMail:'Email: '+eMail,
        MyName:'Your Name: '+myName,
        SerProvider:'Company: '+sPro,
        GetExten:'Extenssion: '+gE
    };
    document.getElementById('h1').innerHTML=a.EMail;
    document.getElementById('h2').innerHTML=a.MyName;
    document.getElementById('h3').innerHTML=a.SerProvider;
    document.getElementById('h4').innerHTML=a.GetExten;
}