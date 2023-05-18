function reverse(){
let n=document.getElementById('number').value;
console.log(n);
let reverse=(n.split('').reverse().join(''));
console.log("Reverse of a Number:"+reverse)
}