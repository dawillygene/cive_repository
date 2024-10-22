<?php 
session_start();
include "./assets/headadmin.php";
include "main.php";
?>

      <!-- ========================= Main ==================== -->
        <div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Posts</h2>
              <a href="#" class="btn">View All</a>
            </div>
            <table>
            <thead>
                <th>Posted by</th>
                <th>title</th>
                <th>Year</th>
                <th>file type</th>
                <th>module</th>
                <th>course</th>
                <th>level</th>
                <th>file_Year</th>
                <th>download</th>
                <th>Open</th>
            </thead>
            <tbody>
                <?php All_posts();  ?>
            </tbody>
        </table>
          </div>
        </div>
      </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script>
        var states = document.querySelectorAll(".viewingtutorial");
        states.forEach(function(button) {
            button.addEventListener("click", function() {
                var fileId = this.getAttribute("data-file-id");
                window.location.href = "detailedview.php?fileId=" + encodeURIComponent(fileId);
            });
        });



        let list = document.querySelectorAll(".navigation li");

        function activeLink() {
            list.forEach((item) => {
                item.classList.remove("hovered");
            });
            //this.classList.add("hovered");
        }

        list.forEach((item) => item.addEventListener("mouseover", activeLink));

        // Menu Toggle
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");

        toggle.onclick = function() {
            navigation.classList.toggle("active");
            main.classList.toggle("active");
        };


        var buttons = document.querySelectorAll(".statusdelivered");
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                var fileId = this.getAttribute("data-file-id");
                window.location.href = "pdf.php?fileId=" + encodeURIComponent(fileId);
            });
        });


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
