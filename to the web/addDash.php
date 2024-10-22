<?php
session_start();
$showSearchBar = true;
include "./assets/headadmin.php";
include "main.php";
?>

<!-- ========================= Main ==================== -->

<div class="recentOrders">
    <div class="cardBox">

        <div style="height: 100%; width:200%;" class="card" onclick="nextStep(1);">
            <div>
                <div class="numbers">Past papers / notes</div>
            </div>

            <div class="iconBx">
                <ion-icon name="layers"></ion-icon>
            </div>
        </div>
        <div style="height: 100%; width:100%; margin-left : 40%;" class="card" onclick="nextStep(2);">
            <div>
                <div class="numbers">Tutorial/books/installation</div>
            </div>

            <div class="iconBx">
                <ion-icon name="layers"></ion-icon>
            </div>
        </div>
    </div>


    <div class="katikati">
        <div class="cardHeader">
            <h2>Posts</h2>
            <a href="#" class="btn">View All</a>
        </div>


        <div id="search_result">
        
       </div>

     <div class="hidesearch">
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
                    <?php notes_and_pastpaper();  ?>
                </tbody>
            </table>
        </div>


        <div class="step" id="step2">
            <table>
                <thead>
                    <th>Username</th>
                    <th>Title</th>
                    <th>File Type</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php tutorial_book_installation();  ?>
                </tbody>
            </table>
        </div>


        <div>
    </div>
</div>



</div>
</div>

<!-- =========== Scripts =========  -->
<script>
    var buttons = document.querySelectorAll(".viewingtutorial");
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                var userId = this.getAttribute("data-userid");
                var action = this.getAttribute("data-action");
                var url = "detailedview.php?userId=" + encodeURIComponent(userId) + "&action=" + encodeURIComponent(action);
                window.location.href = url;
            });
        });


    let list = document.querySelectorAll(".navigation li");
    function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered");
        });
    }



    list.forEach((item) => item.addEventListener("mouseover", activeLink));
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
                if (parseInt(currentStep) > 2) {
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
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val();
                //alert(input);
                if(input != "") {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {
                            input: input
                        },

                        success: function(data) {
                            $("#search_result").html(data);
                            $(".hidesearch").css("display", "none");
                            $("#search_result").css("display", "block");

                        }
                    });
                } else {
                    $("#search_result").css("display", "none");
                    $(".hidesearch").css("display", "block");
                }


            });
        });
    </script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>