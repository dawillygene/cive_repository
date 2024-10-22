
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




function setCookie(name, value, days) {
  var expires = "";
  if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) === ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

function storeCurrentStep(step) {
  setCookie("currentStep", step, 365); 
}

function retrieveCurrentStep() {
  var currentStep = getCookie("currentStep");

  if (currentStep) {
      return parseInt(currentStep);
  } else {
      return 1; 
  }
}


var currentStep = retrieveCurrentStep();


function nextStep(stepNumber) {
  hideStep(currentStep);
  showStep(stepNumber);
  currentStep = stepNumber;
  storeCurrentStep(currentStep);
}

function hideStep(stepNumber) {
  document.getElementById('step' + stepNumber).style.display = 'none';
}

function showStep(stepNumber) {
  document.getElementById('step' + stepNumber).style.display = 'block';
}


showStep(currentStep);

