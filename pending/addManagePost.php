<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include "./assets/headadmin.php";
include "main.php"; ?>

<?php
    if (isset($_GET['update']) && $_GET['update'] === 'success') {
        echo '<div class="success-message">Successful update</div>';
    } ?>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">
          <div class="card" onclick="nextStep(1);">
            <div>
              <div class="numbers">Pending</div>
            </div>

            <div class="iconBx">
              <ion-icon name="time"></ion-icon>
            </div>
          </div>

          <div class="card" onclick="nextStep(2);">
            <div>
              <div class="numbers">Accepted</div>
            </div>
            <div class="iconBx">
              <ion-icon name="checkmark-circle"></ion-icon>
            </div>
          </div>

          <div class="card" onclick="nextStep(3);">
            <div>
              <div class="numbers">Rejected</div>
            </div>

            <div class="iconBx">
              <ion-icon name="close-circle"></ion-icon>
            </div>
          </div>
        </div>

        <div class="details">
          <div class="recentOrders">
            

            <div class="step" id="step1">
            <center>  <h1 style ="color:#2a2185";>Pending</h1>  </center> 
              <table>
                <thead>
                  <th>User name</th>
                  <th>File/Link name</th>
                  <th>Year level</th>
                  <th>Department</th>
                  <th>Course</th>
                  <th>Subject</th>
                  <th>Semester</th>
                  <th>Year</th>
                </thead>
                <tbody>
                 <?php  pending_posts(); ?>
                </tbody>
              </table>
            </div>

            <!-- =======  the accepted  part ======= -->

            <div class="step" id="step2">
            <center>  <h1 style ="color:#2a2185";>Accepted</h1>  </center> 
              <table>
                <thead>
                  <th>User name</th>
                  <th>File/Link name</th>
                  <th>Year level</th>
                  <th>Department</th>
                  <th>Course</th>
                  <th>Subject</th>
                  <th>Semester</th>
                  <th>Year</th>
                </thead>
                <tbody>
                <?php Accepted_posts();?>
                </tbody>
              </table>
            </div>

            <!-- ======  the rejected section ======= -->

            <div class="step" id="step3">
            <center>  <h1 style ="color:#2a2185";>Rejected</h1>  </center>
              <table>
               <?php Rejected_posts();?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script >

document.addEventListener("DOMContentLoaded", function() {
            var successMessage = document.querySelector(".success-message");

            if (successMessage) {
                successMessage.style.display = "block"; // Display the message

                setTimeout(function() {
                    successMessage.style.display = "none"; // Hide the message after 2 seconds
                }, 2000);
            }
        });


        var states = document.querySelectorAll(".viewingtutorial");
        states.forEach(function(button) {
            button.addEventListener("click", function() {
                var fileId = this.getAttribute("data-file-id");
                window.location.href = "detailedview.php?fileId=" + encodeURIComponent(fileId);
            });
        });

        var buttons = document.querySelectorAll(".statusdelivered");
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                var fileId = this.getAttribute("data-file-id");
                window.location.href = "pdf.php?fileId=" + encodeURIComponent(fileId);
            });
        });



var buttons = document.querySelectorAll(".btn");
buttons.forEach(function(button) {
    button.addEventListener("click", function() {
        var userId = this.getAttribute("data-userid");
        var action = this.getAttribute("data-action");
        var url = "status.php?userId=" + encodeURIComponent(userId) + "&action=" + encodeURIComponent(action);
        window.location.href = url;
    });
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



</script>

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
