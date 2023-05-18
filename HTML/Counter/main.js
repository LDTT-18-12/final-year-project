

// Conter selector by button

number = document.getElementById('counter');


    function Add(){
        // alert(parseInt(number.innerHTML)+1);
         number.innerHTML = parseInt(number.innerHTML)+1;
        
     };



function Reset() {
    number.innerHTML = 0;
};

function Dec() {
    number.innerHTML = parseInt(number.innerHTML)-1;

}
