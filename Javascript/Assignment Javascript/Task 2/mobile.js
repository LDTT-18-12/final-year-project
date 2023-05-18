function Code() {
  let d = document.getElementById("val").value;
    console.log(d);
   document.write(d);
  var m="0300", n="0309", p="0310", q="0317", r="0340", s="0349";
   if(d=m && d<=n)
   document.write("Jazz");
    else if(d>=p && d<=q)
    document.write("Zong");
   else if(d>=r && d<=s)
   document.write("Telenor");
 }
