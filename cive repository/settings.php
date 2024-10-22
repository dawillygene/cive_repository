<?php
session_start();
$showSearchBar = false;
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
 <style>
        

body {
    font-family: Arial, sans-serif;

}

.containerr {
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
    margin-top: 10px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: column;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}


.form-group {
    margin-bottom: 20px;
}

input[type="file"] {
    display: none;
    text-align: center;
}

input[type="file"]{
  
    color: #007BFF;
    padding: 10px 15px;
    height: 50px;
    cursor: pointer;
    margin-left: 170px;
    margin-right: 300px;
    border-radius: 2px;
    text-align: center;
    display:block;
}
  

#preview-image{
    text-align: center;
    max-width: 10%;
    height: auto;
    display: block;
    margin-top: 10px;
    border-radius: 70%;
   margin-bottom: 10%;
    overflow: auto;
   
    
}
#profile-picture{
    text-align: center;
    display: block;
    padding-left: 90px;
    padding-right: 60px;
}

input[type="password"] {
    width: 90%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Responsive layout */
@media (max-width: 480px) {
    .container {
        max-width: 100%;
        padding: 10px;
    }
}
</style>
        <!-- ======================= Cards ================== -->
        


        <div class="containerr">
          <h1>Settings</h1>
          <form action="updatetest.php" id="settings-form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <center>
                    <?php if ($profilePicture) 
                    {  echo '<img id="preview-image"  src="' . $profilePicturePath . '" alt="Profile Picture">'; }?>
                <label>change profile</label>
            </center>
            <center>
                <input type="file" id="profile-picture" name="file" accept="image/*">
                </center>
                </div>
            <div class="form-group">
                 <input style="width: 30%;" type="submit" value="upload" name="upload_picture">
            </div>
         </form>
         <br> <br>
         <h1>Change password</h1> <br>
         <form action="updatetest.php" id="settings-form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="password" id="new-password" name="passchange" placeholder="Enter new password" required>
            </div>
            <div class="form-group">
               <input type="password" id="confirm-password" name="passchangeconf" placeholder="Confirm new password" required>
            </div>
            <div class="form-group">
                 <input style="width: 60%;" type="submit" value="change password" name="changepassword">
            </div>
          </form>




      </div>
  
 </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

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



