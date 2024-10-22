<?php
session_start();
$showSearchBar = true;
if($_SESSION['Role'] == 'admin'){
    include "main.php";
    include "./assets/headadmin.php";
} 
else if($_SESSION['Role'] == 'student')
{
   include "main.php";
   include "./assets/head.php";
}
  
?>
<?php
    if (isset($_GET['update']) && $_GET['update'] === 'success') {
        echo '<div class="success-message">Successful update</div>';
    } ?>






<div class="hidesearch">
 <!-- ======================= Cards ================== -->
 <div class="cardBox">
    <div class="card" onclick="nextStep(1);">
        <div>
            <div class="numbers">Past papers</div>
        </div>

        <div class="iconBx">
            <ion-icon name="layers"></ion-icon>
        </div>
    </div>

    <div class="card" onclick="nextStep(2);">
        <div>
            <div class="numbers">Notes</div>
        </div>

        <div class="iconBx">
            <ion-icon name="layers"></ion-icon>
        </div>
    </div>

    <div class="card" onclick="nextStep(3);">
        <div>
            <div class="numbers">Books</div>
        </div>

        <div class="iconBx">
            <ion-icon name="layers"></ion-icon>
        </div>
    </div>

    <div class="card" onclick="nextStep(4);">
        <div>
            <div class="numbers">Installation</div>
        </div>

        <div class="iconBx">
            <ion-icon name="layers"></ion-icon>
        </div>
    </div>

    <div class="card" onclick="nextStep(5);">
        <div>
            <div class="numbers">Tutorials</div>
        </div>

        <div class="iconBx">
            <ion-icon name="layers"></ion-icon>
        </div>
    </div>

    <div class="card" onclick="nextStep(6);">
        <div>
            <div class="numbers">Myposts</div>
        </div>

        <div class="iconBx">
            <ion-icon name="layers"></ion-icon>
        </div>
        
    </div>

    </div>
            
    </div>

            <!-- ================ Order Details List ================= -->
                <div class="recentOrders">
                <div class="katikati">

                <div id="search_result">
        <!-- Search results will be displayed here -->
                </div>
                <div class="hidesearch">
                    <div class="cardHeader">
                        <h2>Posts</h2>

                    </div>
                    <div class="step" id="step1">
                        <table>
                            <thead>
                                <th>Username</th>
                                <th>Filename</th>
                                <th>Year Level</th>
                                <th>file type</th>
                                <th>Course</th>
                                <th>Program</th>
                                <th>Exam Level</th>
                                <th>File Year</th>
                                <th>Open</th>
                                <th>Download</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php pastpaper_retrival();  ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="step" id="step2">
                        <table>
                            <thead>
                            <th>Username</th>
                                <th>Filename</th>
                                <th>Year Level</th>
                                <th>file type</th>
                                <th>Course</th>
                                <th>Program</th>
                                <th>File Year</th>
                                <th>Open</th>
                                <th>Download</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php   notes_retrival(); ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="step" id="step3">
                        <table>
                            <thead>
                            <th>Username</th>
                            <th>Title</th>
                            <th>File Type</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php retrive_book(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="step" id="step4">
                        <table>
                            <thead>
                            <th>Username</th>
                            <th>Title</th>
                            <th>File Type</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                <?php retrive_installation();  ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="step" id="step5">
                        <table>
                            <thead>
                            <th>Username</th>
                            <th>Title</th>
                            <th>File Type</th>
                            <th>Action</th>
                            </thead>
                            <thead>
                            <?php retrive_tutorial();  ?>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="step" id="step6">
                        <table>
                            <thead>
                            
                            </thead>
                            <thead>
                            <?php 
                            Myposts();
                            //retrive_accessory(); ?>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- =========== Scripts =========  -->
    <script>

var buttonx = document.querySelectorAll(".viewingtutorial");
        buttonx.forEach(function(buttonxs) {
            buttonxs.addEventListener("click", function() {
                var userId = this.getAttribute("data-userid");
                var action = this.getAttribute("data-action");
                var url = "detailedview.php?userId=" + encodeURIComponent(userId) + "&action=" + encodeURIComponent(action);
                window.location.href = url;
            });
        });


document.addEventListener("DOMContentLoaded", function() {
            var successMessage = document.querySelector(".success-message");

            if (successMessage) {
                successMessage.style.display = "block";

                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 2000);
            }
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
       $("#live_search").keyup(function() {
       var input = $(this).val();
      // alert(input);
 if(input !=""){
    $.ajax({
 url:"search.php",
 method:"POST",
 data:{input:input},

   success:function(data){
    $("#search_result").html(data); 
    $(".hidesearch").css("display","none");
    $("#search_result").css("display","block");
    
       }  
    });
 } else {
    $("#search_result").css("display","none");
    $(".hidesearch").css("display","block");
 }


      });
   });
   </script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>