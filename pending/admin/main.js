
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};








// // Inside your existing JavaScript code

// // Add an event listener to the toggle button
// document.querySelector('.toggle').addEventListener('click', function () {
//   const navigation = document.querySelector('.navigation');
//   const main = document.querySelector('.main');
  
//   // Toggle the 'active' class on the navigation and main elements
//   navigation.classList.toggle('active');
//     //  main.classList.toggle('active');
// });




var currentStep = 1;
        
function nextStep(stepNumber) {
  if (currentStep) {
    hideStep(currentStep);
    showStep(stepNumber);
    currentStep = stepNumber;
  }
}


function hideStep(stepNumber) {
  document.getElementById('step' + stepNumber).style.display = 'none';
}

function showStep(stepNumber) {
  document.getElementById('step' + stepNumber).style.display = 'block';


}
