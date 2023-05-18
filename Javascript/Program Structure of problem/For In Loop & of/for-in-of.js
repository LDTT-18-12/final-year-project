

    const mobile ={
        war: "0301-1234567", Alo:"0302-1234567", bhalo: "0303-1234567", Shalo:"0304-1234567", Kalo: "0305-1234567", 
        Malo:"0306-1234567", Talo: "0307-1234567", Asd:"0308-1234567", haji: "0309-1234567", Golo:"0310-1234567",
        tali: "0311-1234567", Ali:"0312-1234567", Dasa: "0313-1234567", Harif:"0314-1234567", Narif: "0315-1234567", 
        Shamo:"0316-1234567", Rawao: "0317-1234567", Nahao:"0318-1234567", Tawer: "0319-1234567", Bhai:"0320-1234567",
    }
    let txt ="";
    for(let x in mobile){
        txt = console.log(x)
        console.log(mobile[x])
         txt+= mobile[x] +"<br>";  //Alot of data with in line
        // txt += mobile.war;   //specific location or specific object access
        //  break;
    }
    document.getElementById("ob").innerHTML=txt;
