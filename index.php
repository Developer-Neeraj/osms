<doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Fontawesome link -->
        <link rel="stylesheet" href="css/all.min.css">
        <!-- custom css -->
        <link rel="stylesheet" href="css/custom.css">
        <title>Document</title>
    </head>

    <body>

        <!-- start navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
            <a class="navbar-brand" href="#">Navbar</a>
            <span class="navbar-text">Customer happiness is over Aim</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse pl-4" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto pl-4">
                    <li class="nav-item">
                        <a class="nav-link" href="inde.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registration</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="requester/RequesterLogin.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End navigation -->

        <!-- header Section -->
        <header id="back-image" style="background-image: url(image/header.jpg);">
            <center class="text-light">
                <h1>WELCOME TO OSMS</h1>
                <p>Customer happiness is over Aim</p>
                <a href="requester/RequesterLogin.php" class="btn btn-danger btn-xl mx-4">Login</a>
                <a href="#regisUser" class="btn btn-success btn-xl mx-4">Sign Up</a>
            </center>
        </header>
        <!-- End header section -->

        <!-- Introduction osms service section -->
        <div class="container my-4" id="service">
            <div class="jumbotron my-4">
                <h1 class="text-center">OSMS Services</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat impedit deleniti, eius, et harum nemo
                    voluptatibus animi nisi voluptates, tenetur sequi accusantium! Veritatis iste maxime est
                    repudiandae, aperiam impedit possimus.
                    Ea magni at ullam recusandae harum, in nisi aliquam adipisci praesentium libero quibusdam. Neque
                    excepturi, praesentium recusandae esse asperiores nobis, doloribus omnis incidunt aspernatur iure
                    ipsum. Consequatur eveniet quibusdam quia?
                    Officiis sint error cupiditate, rerum modi consequatur laborum, eum debitis cumque hic eveniet quo
                    totam ex. Natus aliquam animi vero nesciunt. Possimus laboriosam error dolorem doloremque quo, porro
                    asperiores consequuntur.</p>
            </div>
        </div>
        <!-- Introduction osms service section -->

        <!-- start service section -->
        <div class="container text-center border-bottom">
            <h2 class="text-center">Our Services</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
                    <h4 class="mt-4">Electronic Appliance</h4>
                </div>
                <div class="col-md-4">
                    <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
                    <h4 class="mt-4">Preventive Maintenance</h4>
                </div>
                <div class="col-md-4">
                    <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
                    <h4 class="mt-4">Fault Repair</h4>
                </div>
            </div>
        </div>
        <!-- End service section -->

        <!-- start registration form -->
        <div id="regisUser">
            <?php include("userRegistration.php") ?>
        </div>
        <!-- End registration form -->

        <!-- start happy customer -->
        <div class="jumbotron bg-danger">
            <div class="container">
                <h2 class="text-center text-white">Happy Customer</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-lg mt-5">
                            <div class="card-body text-center">
                                <img src="image/1.jpg" class="img-fluid" style="border-radius: 200px; height: 100px; width: 100px" alt="img1">
                                <h4 class="card-title">SEETA</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum tempora esse quo at, neque provident perferendis quis omnis obcaecati?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-lg mt-5">
                            <div class="card-body text-center">
                                <img src="image/2.jpg" class="img-fluid" style="border-radius: 200px; height: 100px; width: 100px" alt="img2">
                                <h4 class="card-title">GEETA</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum tempora esse quo at, neque provident perferendis quis omnis obcaecati?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-lg mt-5">
                            <div class="card-body text-center">
                                <img src="image/3.jpg" class="img-fluid" style="border-radius: 200px; height: 100px; width: 100px" alt="img3">
                                <h4 class="card-title">JYOTI</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum tempora esse quo at, neque provident perferendis quis omnis obcaecati?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-lg mt-5">
                            <div class="card-body text-center">
                                <img src="image/4.jpg" class="img-fluid" style="border-radius: 200px; height: 100px; width: 100px" alt="img4">
                                <h4 class="card-title">SUMAN</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum tempora esse quo at, neque provident perferendis quis omnis obcaecati?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END happy customer -->

        <!-- start contact us form -->
        <div class="container" id="contact">
            <h2 class="text-center mb-5">Contact us</h2>
            <div class="row">

                <!-- start contact form -->

                <?php include("contactForm.php"); ?>

                <!-- End contact form -->

                <div class="col-md-4 pl-5">
                    <strong>Headquarter:</strong><br>
                    OSMS pvt Ltd,<br>
                    Ashok Nagar, Ranchi <br>
                    Jharkhand - 121005 <br>
                    Phone: +00000000 <br>
                    <a href="#" target="_blank">www.OSMS.com</a><br>
                    <br><br>
                    <strong>Branch:</strong><br>
                    OSMS pvt Ltd,<br>
                    New Ashok Nagar, Delhi <br>
                    Delhi - 121005 <br>
                    Phone: +00000000 <br>
                    <a href="#" target="_blank">www.OSMS.com</a>
                </div>
            </div>
        </div>
        <!-- end contact us form -->

        <!-- start footer -->
        
        <footer class="container-fluid bg-dark mt-5">
            <div class="container">
                <div class="row py-3 text-light">
                    <div class="col-md-6">
                        <span class="pr-2">Follow us:</span>
                        <a href="#" target="_blank" class="fi-color"><i class="fab fa-facebook-f" class="pr-2"></i></a>
                        <a href="#" target="_blank" class="fi-color"><i class="fab fa-twitter" class="pr-2"></i></a>
                        <a href="#" target="_blank" class="fi-color"><i class="fab fa-youtube" class="pr-2"></i></a>
                        <a href="#" target="_blank" class="fi-color"><i class="fab fa-google-plus-g" class="pr-2"></i></a>
                        <a href="#" target="_blank" class="fi-color"><i class="fas fa-rss" class="pr-2 fi-color"></i></a>
                    </div>                
                    <div class="col-md-6 text-right">
                        <small>Design by Geekyshow &copy; 2019</small>
                        <small><a href="admin/adminLogin.php">Admin Login</a></small>
                    </div>
                </div>
            </div>
        </footer>

        <!-- End footer -->

        <!-- javascript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/all.min.js"></script>
    </body>

    </html>