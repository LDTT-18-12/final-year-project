const email="rimshaparveen@gmail.com"
const myName=email.split('@')[0]   //rimshaparveen2gmail.com => rp
const temp=email.split('@')[1]    //  gmail.com
const compny=temp.split('.')[0]   //gmail
const ext=temp.split('.')[1]   // com
console.log(email)  //full name
console.log(myName)
console.log(compny)
console.log(ext)