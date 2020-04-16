<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/index.css">
    
</head>
<body>
<?php
include("includes/utility.php");
  include("includes/headers.php");
  include("includes/navbar.php");
?>
       
  <!-- ---------------- -->
    <div id="empcolor">
      <h2 id="empower">
        Empower your Knowledge
      </h2>
      <p id="emppara"><b> Talent wins games, But Teamwork and Intelligence win championships.</b></p>
    </div>
              
              

              
               <br> <br>

            <h1 style="text-align: center;"><b>Our Motto</b></h1> <br> <br>

              
            <div class="container">
                      
                        <div class="row">
                        <div class="col-sm">
                          <p id="para1" style="text-align: center;"> <b> "Teamwork is the ability to work together toward a common vision. The ability to direct individual accomplishments toward organizational objectives. It is the fuel that allows common people to attain uncommon results." </b> </p>
                        </div>
                        <div class="col-sm">
                          <p id="para2" style="text-align: center;"><b>"A dream does not become reality through magic; it takes sweat, determination, and hard work. "</b></p>
                        </div>
                        </div>
                  
            </div>
            <!-- ---------------------------- -->
            <br>

           
            

            <div class="container" >
                <form action="#">
                    <h2 style="text-align: center;">|Get In Touch|</h2>
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
        
                          <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                            placeholder='Enter Message....'></textarea>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                        </div>
                      </div>

                      

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Send Message</button>
                      </div>

                </form>

            </div>
                       <br> <br> <br>

        <!-- -------------------- -->
    
            <!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

    
    <!-- Footer Links -->
  
    <hr>
  
    <!-- Call to action -->
    <ul class="list-unstyled list-inline text-center py-2">
      
      <li class="list-inline-item">
        <a href="#!" class="btn btn-danger btn-rounded">Sign up!</a>
      </li>
    </ul>
    <!-- Call to action -->
  
    <hr>
  
    <!-- Social buttons -->
    <div id="social">
      <a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-linkedin"></a>
<a href="#" class="fa fa-instagram"></a>

    </div>
   
    <!-- Social buttons -->
  
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://covBoard.in/"> covBoard.in</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->

 

<!-- --------------- -->
    <!-- <script>
        var myIndex = 0;
                     carousel();
                     
                     function carousel() {
                       var i;
                       var x = document.getElementsByClassName("mySlides");
                       for (i = 0; i < x.length; i++) {
                         x[i].style.display = "none";  
                       }
                       myIndex++;
                       if (myIndex > x.length) {myIndex = 1}    
                       x[myIndex-1].style.display = "block";  
                       setTimeout(carousel, 2000); // Change image every 2 seconds
                     }
       </script> -->

<!-- ------------ -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>