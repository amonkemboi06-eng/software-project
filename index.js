const registerBtn = document.getElementById("registerBtn");

registerBtn.addEventListener("click", function(){

    alert("Registration page coming soon!");

});
const earth = document.getElementById("earth");



let current = 0;

function rotateEarth() {

    earth.src = images[current];

    current++;

    if(current >= images.length){

        current = 0;

    }

}

setInterval(rotateEarth, 1000);