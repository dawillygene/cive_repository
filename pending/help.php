<?php
session_start();
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
    
    /* Reset some default styles */
    body, h1, h2, h3, p {
      margin: 0;
      padding: 0;
  }
  
  /* Basic styling for header and navigation */
  header {
      background-color: #2a2185;
      color: white;
      text-align: center;
      padding: 20px;
  }
  
  nav {
      background-color: #f0f0f0;
      padding: 10px;
  }
  
  
  nav ul {
      list-style-type: none;
  }
  
  nav ul li {
      margin-bottom: 15px;
  }
  
  nav ul li a {
      text-decoration: none;
      color: #2a2185;
      font-family: Roman;
  }
  
  nav ul li a:hover {
      color: #007bff;
  }
  
  /* Style main content sections */
  main {
      padding: 20px;
  }
  
  section {
      margin-bottom: 30px;
  }
  
  h2 {
      font-size: 24px;
      margin-bottom: 10px;
      font-family: Roman;
      color: #2a2185;
  }
  h5{
      color: #007bff;
      font-family: Roman;
      margin-bottom: 5px;
      margin-top: 5px;
  }
  h4{
      font-family: Roman;
      margin-bottom: 5px;
      margin-top: 5px;
  }
  
  /* Style footer */
  footer {
      /* background-color: #2a2185; */
      padding: 10px;
      text-align: center;
      color: #2a2185;
  }
  
</style>
    
            <h1>Help Center</h1>
        </header>
        <nav>
            <ul>
                <li><a href="#section1">Getting Started</a></li>
                <li><a href="#section2">Uploading Resources</a></li>
                <li><a href="#section3">Troubleshooting</a></li>
                <li><a href="#section4">FAQs</a></li>
                <li><a href="#section5">Additional Resources</a></li>
                <li><a href="#section6">Legal Information</a></li>
            </ul>
        </nav>
        <main>
            <section id="section1">
                <h2>Getting Started</h2>
                <p>
                    <ul>
                        <li><h4>Creating an account:</h4>To get started,You'll need to craeate an account.Click the "<a href="">Sign Up</a>" button on the homepage ,fill in your details, and verify your email address.</li>
                        <li><h4>Loggin in:</h4>f you already have an account, click "<a href="">Log In</a> " and enter your credentials.</li>
                        <li><h4>Navigating the Dashboard:</h4>Once logged in, you'll see your dashboard. This is where you can access all the features, including uploading exam past papers, notes, and links.</li>
                        <li><h4>Uploading Exam Past Papers, Notes, Links for installation , books and Tutarial:</h4>To upload resources, click on the relevant option in the dashboard. Follow the on-screen instructions to add your content.</li>
                        <li><h4>view contents:</h4>Also you can view different contents uploaded by your fellow students</li>
                    </ul>
                </p>
            </section>
            <section id="section2">
                <h2>Uploading Resources</h2>
                <p>
                    <ul>
                        <li><h4>How to Upload Exam Past Papers:</h4>Click on the "Upload Exam Papers" option and follow the prompts to add your past papers. Be sure to provide details such as subject, year, and course.</li>
                        <li><h4>Uploading Lecture Notes:</h4>Choose "Upload Lecture Notes" to share your study materials. Include a clear title and description for each set of notes.</li>
                        <li><h4>Uploading Installation Links: </h4>For software-related content, click "Add Installation Links." Include URLs and brief instructions.</li>
                        <li><h4>Uploading Various Books:</h4>Under "upload Books" Include URLs and upload book descriptions. Also provide book titles, authors</li>
                        <li><h4>Uploading Tutorial Links: </h4>Under "Submit Tutorials," you can share useful tutorial links. Include a title and a brief description of the tutorial's content.</li>
                    </ul>
                </p>
            </section>
            <section id="section3">
                <h2>Troubleshooting</h2>
                <p>
                    <ul>
                        <li><h4>Common Issues and Solutions: </h4>If you encounter any problems, refer to our troubleshooting guide for solutions to common issues.</li>
                        <li><h4>Contacting Support:</h4> If you need further assistance, our support team is available. Contact us at <u>CiveRepositorysupport@gmail.com</u> or <u>via our live chat.</u></li>
                    </ul>
                </p>
            </section>
            <section id="section4">
                <h2>FAQs</h2>
                <p>
                    <ul>
                        <li><h4>Q: How do I edit or delete uploaded content?</h4><li>A: You can edit or delete your content from your dashboard. Click on the item you wish to modify and follow the options provided.</li></li>
                        <li><h4>Q: Is there a limit to the number of resources I can upload?</h4><li>A: Currently, there is no limit to the number of resources you can upload.</li></li>
                    </ul>
                </p>
            </section>
            <section id="section5">
                <h2>Additional Resources</h2>
                <p>
                    <ul>
                        <li><h4>Video Tutorials: </h4>Visual learners can watch our video tutorials for step-by-step guidance.</li>
                        <li><h4>Community Forums:</h4>Join discussions, ask questions, and connect with other users in our community forums.</li>
                    </ul>
                </p>
            </section>
            <section id="section6">
                <h2>Legal Information</h2>
                <p>
                    <ul>
                        <li><h4>Terms of Service: </h4>
                            
                        <p>
                            <ol>
                                <li><h5>Acceptance of Terms</h5>By accessing or using CIVE REPOSITORY System or website, you agree to comply with and be bound by these Terms of Service. If you do not agree to these terms, please do not use our CIVE REPOSITORY System or website.</li>
                                <li><h5>Use of the CIVE REPOSITORY System or website</h5><ul>&#187;You must be at least 15 years old to use our CIVE REPOSITORY System or website</ul><ul>&#187;You are responsible for any activity that occurs under your account.</ul><ul>&#187;You may not use our CIVE REPOSITORY System or website for any illegal or unauthorized purpose. You must not violate any laws in your jurisdiction.</ul></li>
                                <li><h5>User Content</h5><ul>&#187;You retain ownership of the content you submit to our CIVE REPOSITORY System or website.</ul><ul>&#187;By submitting content, you grant us a worldwide, non-exclusive, royalty-free license to use, reproduce, adapt, publish, and distribute it for the purpose of operating and improving our CIVE REPOSITORY System or website.</ul></li>
                                <li><h5>Privacy Policy</h5>Your use of our CIVE REPOSITORY System or website is also governed by our Privacy Policy [Link to Privacy Policy], which outlines how we collect, use, and protect your personal information.</li>
                                <li><h5>Intellectual Property</h5><ul>&#187;The content and materials available on our CIVE REPOSITORY System or website are protected by copyright, trademark, and other intellectual property laws.</ul><ul>&#187;You may not reproduce, distribute, modify, or create derivative works of any content on our CIVE REPOSITORY System or website without our prior written consent.</ul></li>
                                <li><h5>Termination</h5>We reserve the right to terminate or suspend your account and access to our CIVE REPOSITORY System or website at our discretion, without notice, for any reason, including a breach of these Terms of Service.</li>
                                <li><h5>Disclaimer of Warranties</h5>Our CIVE REPOSITORY System or website is provided "as is" and "as available" without warranties of any kind, whether express or implied.</li>
                                <li><h5>Limitation of Liability</h5>We shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly.</li>
                                <li><h5>Changes to Terms</h5>We reserve the right to modify or revise these Terms of Service at any time. The most current version will be posted on our CIVE REPOSITORY System or website, and your continued use constitutes acceptance of the updated terms.</li>
                                <li><h5>Governing Law</h5>These Terms of Service shall be governed by and construed in accordance with the laws of Tanzania jurisdiction.</li>
                                <li><h5>Contact Us</h5>If you have any questions about these Terms of Service, please contact us at CiveRepository@gmail.com.
                                <p>Thank you for using Cive Repository!</p><br>
                                
                                <p>CIVE REPOSITORY <br>CiveRepository@gmail.com <br>Tanzania, Dodoma.</p></li>
                            </ol>
                        </p>
                        
                        </li><br>
                        <li><h4>Privacy Policy: </h4>Our privacy policy outlines how we handle your data and protect your privacy.</li>
                    </ul>
                </p>
            </section>
        </main>
        <footer>
            <p>Version: 1.0</p>
        </footer>

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
