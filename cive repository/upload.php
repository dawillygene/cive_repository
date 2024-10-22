<?php
session_start();
if ($_SESSION['Role'] == 'admin') {
    
    include "main.php";
    $showSearchBar = false;
    include "./assets/headadmin.php";
} else if ($_SESSION['Role'] == 'student') {
   
    include "main.php";
    $showSearchBar = false;
    include "./assets/head.php";
} ?>

<?php
if (isset($_GET['update']) && $_GET['update'] === 'success') {
    echo '<div class="success-message">Successful uploaded</div>';
} ?>
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


    <?php if ($_SESSION['Role'] == 'admin') {

        echo '<div class="card" onclick="nextStep(6);">
              <div>
                 <div class="numbers">Accessory</div>
               </div>

               <div class="iconBx">
               <ion-icon name="layers"></ion-icon>
               </div>
               </div>';
               } ?>


</div>

<div class="details">
    <div class="recentOrders">

        <!-- ==== the upload past paper section ==== -->

        <div class="step" id="step1">
        <div class="katikati">
               
        <center class="maneno"><b>Upload pastpaper</b></center>
                <br> <br>
                
                <form action="updatetest.php" method="POST" enctype="multipart/form-data">

                        <div class="maneno">
                            <label for="yearlevel">Year Level:</label>
                            <select name="yearlevel" id="yearlevel">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <div class="maneno">
                            <label for="department">Department:</label>
                            <select name="department" id="department">
                                <option value=" Department of comp science and engineering">
                                    Department of comp science and engineering
                                </option>
                                <option value="Department of information system and technology">
                                    Department of information system and technology
                                </option>
                                <option value="Department of information system and technology">
                                    Department of information system and technology
                                </option>
                                <option value="  Department of comp science and engineering">
                                    Department of comp science and engineering
                                </option>
                            </select>
                        </div>

                        <div class="maneno">
                            <label for="Program">Program:</label>
                            <select name="Program" id="Program">
                                <option value="SE">SE</option>
                                <option value="IDIT">IDIT</option>
                                <option value="MTA">MTA</option>
                                <option value="TE">TE</option>
                            </select>
                        </div>

                        <div class="maneno">
                            <label for="coursename">Course Name:</label>
                            <select name="coursename" id="coursename">
                                <option value="DS">DS</option>
                                <option value="LG">LG</option>
                                <option value="MT117">MT117</option>
                                <option value="IA">IA</option>
                                <option value="MT112">MT112</option>
                            </select>
                        </div>

                        <div class="maneno">
                            <label for="examlevel">Exam Level:</label>
                            <select name="examlevel" id="examlevel">
                                <option value="Test 01">Test 01</option>
                                <option value="Test 02">Test 01</option>
                                <option value="UE">UE</option>
                            </select>
                        </div>

                        <div class="maneno">
                            <label for="pastyear">Past Year:</label>
                            <select name="pastyear" id="pastyear">
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                            </select>
                        </div>
                        <label  class="maneno">pastpaper Description:</label>
                        <textarea id="description" name="description" rows="4" cols="120" required></textarea>

                        <div class="maneno">
                            <label for="file">Upload pastpaper:</label>
                            <input type="file" id="file" name="file" required /><br />
                        </div>
                            <br>
                        <div>
                            <input type="submit" value="Submit" name="pastpaper" />
                        </div>

                    </form>
            </div>    

        </div>

        <!-- =======  the upload of the Notes part ======= -->

        <div class="step" id="step2">
        <div class="katikati">
        <center class="maneno"><b>Upload Notes</b></center>
                <br> <br>

        <form action="updatetest.php" method="POST" enctype="multipart/form-data">
                       
                            <label  class="maneno">Year Level:</label>
                            <select name="yearlevel">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>

                            <label for="department" class="maneno">Department:</label>
                            <select name="department">
                                <option value=" Department of comp science and engineering">
                                    Department of comp science and engineering
                                </option>
                                <option value="Department of comp science and engineering">
                                    Department of comp science and engineering
                                </option>
                                <option value="Department of comp science and engineering">
                                    Department of comp science and engineering
                                </option>
                                <option value=" Department of comp science and engineering">
                                    Department of comp science and engineering
                                </option>
                            </select>

                            <label  class="maneno">Program:</label>
                            <select name="programe">
                                <option value="SE">SE</option>
                                <option value="IDIT">IDIT</option>
                                <option value="MTA">MTA</option>
                                <option value="TE">TE</option>
                            </select>

                            <label  class="maneno">Course Name:</label>
                            <select name="coursename">
                                <option value="DS">DS</option>
                                <option value="LG">LG</option>
                                <option value="MT117">MT117</option>
                                <option value="IA">IA</option>
                                <option value="MT112">MT112</option>
                            </select>

                            <label  class="maneno">Notes Year:</label>
                            <select name="notesyear">
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                            </select>

                            <label  class="maneno">Notes Description:</label>
                             <textarea id="description" name="description" rows="4" cols="120" required></textarea>

                            <label  class="maneno">Upload Notes:</label>
                            <input type="file" id="file" name="file" required />
                            <br>
                            <br>
                            <input type="submit" value="Submit" name="notes" />
                       
                    </form>

               
            </div>    
        </div>

        <!-- ======  the Tutarials section ======= -->

        <div class="step" id="step3">
            <div class="custom-form">
            <center class="maneno"><b>Books</b></center>
                <br>
                <center class="maneno"><b>You may upload a Book if available</b></center>
                <br> <br>
                <form action="updatetest.php" method="post" enctype="multipart/form-data">
                    <label  class="maneno">Book Title:</label>
                    <input type="text" name="title" placeholder="Title" required />

                    <label class="maneno">Book Description:</label>
                    <textarea id="description" name="description" rows="4" cols="50" placeholder="Description" required></textarea>

                    <label class="maneno">Book Link:</label>
                    <input type="text" name="links" placeholder="place link of available" />

                    <label  class="maneno">Upload Book:</label>
                    <input type="file" name="file" />

                    <input type="submit" value="Submit" name="bookupdate" />
                </form>
            </div>
        </div>

        <!-- ======  the Tutarials section ======= -->

        <div class="step" id="step4">
            <div class="custom-form">
                <center class="maneno"><b>You may upload video if available</b></center>
                <br> <br>
                <form action="updatetest.php" method="post" enctype="multipart/form-data">
                    <label  class="maneno">Installation Title:</label>
                    <input type="text" name="title" required />

                    <label  class="maneno">Installation Description:</label>
                    <textarea id="description" name="description" rows="4" cols="50" required></textarea>

                    <label  class="maneno">Installation Link:</label>
                    <input type="text"  name="links" />
                    <label  class="maneno">Upload setup here:</label>
                    <input type="file" name="file" />


                    <input type="submit" value="Submit" name="Installation" />
                </form>
            </div>
        </div>

        <!-- ======  the Tutarials section ======= -->

        <div class="step" id="step5">
            <div class="custom-form">
                <center class="maneno"><b>You may upload video if available</b></center>
                <br> <br>
                <form action="updatetest.php" method="post" enctype="multipart/form-data">
                    <label class="maneno">Tutorial Title:</label>
                    <input type="text" name="title" required />

                    <label  class="maneno">Tutorial Description:</label>
                    <textarea id="description" name="description" rows="4" cols="50" required></textarea>

                    <label class="maneno"> Tutorial Link:</label>
                    <input type="text" name="links" />

                    <label class="maneno">Upload Video here:</label>
                    <input type="file" name="file" />

                    <input type="submit" value="Submit" name="submit_tutorial" />
                </form>
            </div>
        </div>


        <?php if ($_SESSION['Role'] == 'admin') {

            echo '<div class="step" id="step6">
    <div class="custom-form">
      <form action="updatetest.php"  method="POST" enctype="multipart/form-data">
        <div class="file-input-container">
          <label class="custom-label"
            >Choose Accessory File</label>
          <input type="file" class="custom-input"  name="file" />
        </div>
        <input type="submit" value="Upload" name="submit_accessory" />
      </form>
    </div>
  </div>';
        } ?>


    </div>
</div>
</div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var successMessage = document.querySelector(".success-message");

        if (successMessage) {
            successMessage.style.display = "block";

            setTimeout(function () {
                successMessage.style.display = "none";
            }, 2000);
        }
    });

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(";");
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === " ") c = c.substring(1, c.length);
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
            if(parseInt(currentStep)>5)
            {
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
        document.getElementById("step" + stepNumber).style.display = "none";
    }

    function showStep(stepNumber) {
        document.getElementById("step" + stepNumber).style.display = "block";
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


<!-- =========== Scripts =========  -->
<!-- <script src="main.js"></script> -->

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>