
<?php
session_start();
$session_id = $_SESSION['unique_id'];
if($_SESSION["unique_id"]==""){
    header("location:student_login.php");
}
include "php/config.php";
$incoming_id = $_GET['unique_id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Benue State University</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
        <link rel="icon" type="icon/jgp" href="img/bsu logo.jpg">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/all.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="header-top" style="background-color: black ;">
                <div class="row">
                    <div class="col-md-7">
                        
                    </div>
                    <div class="col-md-5">
                        <div class="header-top-right">
                            <div class="content"><a href="w3/bursarAdvert21.php" target="_blank"><i class="fa fa-university"></i>Careers</a></div>
                            <div class="content"><a target="_blank" href="student_login.php"><i class="fa fa-user-circle"></i>Login</a></div>
                            <div class="content"><a target="_blank" href="https://login.microsoftonline.com/"><i class="fa fa-envelope-open"></i> Email</a></div>
                            <div class="content"><a target="_blank" href="http://alumni.bsum.edu.ng"><i class="fa fa-briefcase"></i>Alumni</a></div>
                            <div class="content"><a target="_blank" href="https://www.facebook.com/BSUNewsonline/"><i class="fab fa-facebook"></i> Facebook</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="row">
                    <div class="col-md-10">
                        <div id="logocontainer">
                            <a href="index.php"><img id="logoimage" src="img/bsu logo.jpg" alt="BSUM" style="margin-top: -8px;" class="logo"></a>
                            <h1>&nbsp;&nbsp;Benue State University, Makurdi<br><span class="chs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;College Of Health Science</span></h1>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="header-top-dashs">
                            <div class="content"><a target="_blank" href="dashboard.php"><i class="fab fa-dashboard"></i>Logout</a><a href="dashboard.php"><img src="img/bsu logo.jpg"></a></div> 
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="row" style="transition: 0.5s ease all;">
                <div class="col-md-12"style="background-color: #2d3e50;">
                        
                    <div id="toggle">
                        <h3>MENU</h3>
                        <i class="fa fa-bars" onclick="toggle()" id="bars"></i>
                        <i class="fa fa-times" onclick="clone()" id="clone"></i>
                    </div>
                </div>
            </div>
            
            
                <div class="row">
                    <div class="col-md-12">
                        <section id="list">
                        <div class="list">
                            <ul>
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="profile.php">Check Profile</a>
                                    <!-- <ul class="underlisted">
                                        <li><a>Brief History</a></li>
                                        <li><a>Our Staff</a></li>
                                        <li><a>Bachelor Courses</a></li>
                                        <li><a>Medical Courses</a></li>
                                        <li><a>Admins and Alumni</a></li>
                                        <li><a>Our Contact</a></li>
                                    </ul> -->
                                </li>
                                <li><a>E-Payment</a></li>
                                <li><a href="result.php">Check Result</a>
                                    <!-- <ul class="underlisted">
                                        <li><a>Anatomy Department</a></li>
                                        <li><a>Physiology Department</a></li>
                                        <li><a>Biochemistry Department</a></li>
                                        <li><a>Nursing Department</a></li>
                                        <li><a>Radiology Department</a></li>
                                        <li><a>MBBS</a></li>
                                    </ul> -->
                                </li>
                                <li><a href="show_blog.php">CHS student blog</a>
                                    <!-- <ul class="underlisted">
                                        <li><a>Student</a></li>
                                        <li><a>Workers</a></li>
                                        <li><a>Teachers</a></li>
                                        <li><a>Laboratory</a></li>
                                        <li><a>Hostel and Accommodation</a></li>
                                        <li><a>Halls and Auditorium</a></li>
                                    </ul> -->
                                </li>
                                <li><a href="chat.php">Chat</a>
                                    <!-- <ul class="underlisted">
                                        <li><a>Latest News</a></li>
                                        <li><a>Trending News</a></li>
                                        <li><a>Student Blog</a></li>
                                        <li><a>Rules and Obligation</a></li>
                                    </ul> -->
                                </li>
                            </ul>
                        </div>
                     </section>
                    </div>
                </div>
               <section id="dashboard-page">
                   <div class="row">
                        <div class="col-md-12">
                            <!-- <center> -->
                                <div class="official-chs-news">
                                <div class="header-you-top">
                                    <?php
                                        $sql = mysqli_query($con,"SELECT * FROM users WHERE unique_id = '$incoming_id' ");
                                        if (mysqli_num_rows($sql) > 0) {
                                            $rows = mysqli_fetch_assoc($sql);
                                            $profile = $rows['profile'];
                                             $name = $rows['name'];
                                            $status = $rows['status'];
                                       
                                        ?>
                                        <p><a href="chat.php"><i class="fas fa-long-arrow-alt-left"></i></a>&nbsp;&nbsp;&nbsp;<img src="php/img/<?php echo $profile; ?>"><?php echo $name; ?><br>
                                            <span><?php echo $status; ?></span>
                                        </p>
                                        <?php
                                     }
                                    ?>
                                </div>
                                <div class="massage" style='width:100%;'>
                                
                                    <div class='row' style='width:80%;'>

                                        <!-- <<center> -->
                                         <div class='col-md-12' style='width:100%; padding:30px;margin-left:100px; margin-top:30px;' id='chat_character'>
                                                <!-- <div class='header-middle-right' style=''>
                                                     <p>i am john</p>
                                                 </div>
                                                            
                                                  <div class='header-middle-left'>
                                                    <p><img src='img/WhatsApp Image 2021-07-14 at 5.17.20 PM (1).jpeg'> i am snikky</p>
                                                </div> -->
                                                        
                                    </div>
                                    
                                         <!-- <div class='col-md-0'>

                                        </div> -->
                                    </div>
                                   
                                    
                                </div>
                                <div class="text-bottom">
                                    <center>
                                        <form action="#" id='form1'>
                                        <input type="text" placeholder="Enter Message" name='message' id='chat_message'>
                                        <input type="hidden" value="<?php echo $incoming_id; ?>" name='incoming_id'>
                                        <button type="submit" onclick='Register()' class='btn btn-default'><i class="fab fa-telegram-plane"></i></button>
                                        </form>
                                        <form action="#" id='form2'>
                                        <input type="hidden" value="<?php echo $incoming_id; ?>" name='incoming_id'>
                                        </form>
                                     </center>
                    
                                </div>
                                </div>
                            <!-- </center> -->
                            
                        </div>
                   </div>
               </section>
               <section id="last">
                <div class="newsletter-area" style="background-color:darkcyan;">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-5 col-md-5">
                             <div class="newsletter-content" style="margin-top: 30px;">
                                 <h3 style="font-weight: bolder;">SUBSCRIBE</h3>
                                 <h2 style="font-size: 40px;">TO OUR NEWSLETTER</h2>
                             </div>
                         </div>
                         <div class="col-lg-7 col-md-7">
                             <div class="newsletter-form angle" style="margin-top: 30px;">
                                 <for action="#" id="mc-form" class="mc-form footer-newsletter fix">
                                     <div class="subscribe-form">
                                         <input id="mc-email" class="form-control" type="email" name="email" placeholder="Enter your email address...">
                                         <button id="mc-submit" type="submit" class="btn btn-primary">SUBSCRIBE</button>
                                     </div>    
                                 </form>
                                 <!-- mailchimp-alerts Start -->
                                 <div class="mailchimp-alerts text-centre fix pull-right">
                                     <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                     <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                     <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                 </div>
                                 <!-- mailchimp-alerts end -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!--End of Newsletter Area-->
             <!--Footer Widget Area Start-->
             <div class="footer-widget-area" style="margin-top: 50px;">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-3" style="padding: 20px;">
                             <div class="single-footer-widget">
                                 <div class="footer-logo">
                                     <a href="index.php"><!--<img src="img/logo/footer.png" alt="">--></a>
                                 </div>
                                 <p>To be the University of first choice in Nigerian, Africa and among the top 200 in the world.</p>
                                 <div class="social-icons">
                                     <a href="https://www.facebook.com/BSUNewsonline"><i class="zmdi zmdi-facebook"></i></a>
                                     <a href="#"><i class="zmdi zmdi-rss"></i></a>
                                     <a href="#"><i class="zmdi zmdi-google-plus"></i></a>
                                     <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                                     <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-3" style="padding: 20px;">
                             <div class="single-footer-widget">
                                 <h3>GET IN TOUCH</h3>
                                 <span><a href="tel:555-555-1212" style="text-decoration: none; color: white;"><i class="fa fa-phone"></i>+234 703 332 6160</a></span>
                                 <span><i class="fa fa-envelope"></i>directorict@bsum.edu.ng</span>
                                 <span><i class="fa fa-globe"></i>www.bsum.edu.ng</span>
                                 <span><i class="fa fa-map-marker"></i>Km 1, Gboko Road, Makurdi, Benue State, Nigeria.</span>
                             </div>
                         </div>
                         <div class="col-md-3" style="padding: 20px;">
                             <div class="single-footer-widget">
                                 <h3>Useful Links</h3>
                                 <ul class="footer-list">
                                     <li><a href="https://portal.bsum.edu.ng/">Applications</a></li>
                                     <li><a href="https://portal.bsum.edu.ng/transcriptApp.jsp">Transcript</a></li>
                                     <li><a href="https://portal.bsum.edu.ng/payments/payonline.jsp">E-payment</a></li>
                                     <li><a href="https://portal.bsum.edu.ng/login.jsp">Login</a></li>
                                 </ul>
                             </div>
                         </div>
                         <div class="col-md-3" style="padding: 20px;">
                             <div class="single-footer-widget">
                                 <h3>PROVOST(CHS)</h3>
                                 <div class="instagram-image">
                                     <div class="">
                                         <img src="https://bsum.edu.ng/img/placeholder.gif" alt="Vice Chancelor" title="Vice Chancelor" width="193" height="230" style="display:none;">
                                         <div>
                                             <a target="blank" href="https://www.bsum.edu.ng/web/principalofficers.php" style="color: #ffffff; font-family: 'Ariel';">
                                                 PROF. LINUS CHIA SAALU
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!--End of Footer Widget Area-->
             <!--Footer Area Start-->
             <footer class="footer-area" style="margin-top: 50px; background-color:  darkcyan; padding: 20px;">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-6 col-md-7 col-12">
                             <span>Copyright &copy; Benue State University 2021. All rights reserved.</span>
                         </div>
                         <div class="col-lg-6 col-md-5 col-12">
                             <div class="column-right">
                                 <span style="float: right ;">Powered by Directorate of ICT, BSUM</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </footer>
             <!--End of Footer Area-->
         </div>   
         <!--End of Bg White--> 
     </div> 
     </section>   
        </div>
    </body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="message.js"></script>
    
</html>