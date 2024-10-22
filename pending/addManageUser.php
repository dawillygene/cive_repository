<?php 
session_start();
//error_reporting(E_ALL);
 //ini_set('display_errors', 1);
include "./assets/headadmin.php";
include "main.php";
?>
<?php
    if (isset($_GET['update']) && $_GET['update'] === 'success') {
        echo '<div class="success-message">Successful update</div>';
    } ?>
        <!-- ======================= Cards ================== -->
        <div class="cardBox">
             <div class="card" onclick="nextStep(1);">
                <div>
                  <div class="numbers">Active </div>
                </div>
    
                <div class="iconBx">
                  <ion-icon name="checkmark-circle-outline"></ion-icon>
                </div>
              </div>
    
              <div class="card" onclick="nextStep(2);">
                <div>
                  <div class="numbers">Inactive </div>
                </div>
                <div class="iconBx">
                    <ion-icon name="pause-circle-outline"></ion-icon> 
                </div>
              </div>         
        </div>
        <div class="details">
          <div class="recentOrders">
           
            <div class="step" id="step1">
            <center>  <h1 style ="color:#2a2185";>ACTIVE</h1>  </center> 
              <table>
                <thead>
                <td>User name</td> 
                <td>status</td> 
                
                    </thead>
                    <tbody>
                    <?php Active_user(); ?>
                    </tbody>
                </table>
          
          </div>


            <!-- =======  the inactive part ======= -->

            <div class="step" id="step2">
           <center> <h1 style ="color:#2a2185"; >INACTIVE</h1> </center>
              <table>
                <thead>
                <td>User name</td> 
                <td>status</td> 
                    </thead>
                    <tbody>
                    <?php Inctive_user(); ?>
                    </tbody>
                </table>
          
          </div>



            
          </div>
        </div>
      </div>
    </div>

    <!-- =========== Scripts =========  -->
       
    <script>
        






var buttons = document.querySelectorAll(".btn");
buttons.forEach(function(button) {
    button.addEventListener("click", function() {
        var userId = this.getAttribute("data-userid");
        var action = this.getAttribute("data-action");
        var url = "status.php?userId=" + encodeURIComponent(userId) + "&action=" + encodeURIComponent(action);
        window.location.href = url;
    });
});

document.addEventListener("DOMContentLoaded", function() {
            var successMessage = document.querySelector(".success-message");

            if (successMessage) {
                successMessage.style.display = "block"; // Display the message

                setTimeout(function() {
                    successMessage.style.display = "none"; // Hide the message after 2 seconds
                }, 2000);
            }
        });


        

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
      if(parseInt(currentStep)>2){
        return 1;
      }
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

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};



    </script>
    <!-- ====== ionicons ======= -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
