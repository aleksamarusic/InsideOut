<!--
Autori:
    Aleksa Marusic
    Marija Kostic
-->
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

    <title>Inside Out</title>

    <!--Google Material icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!--Bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="all"
    />

    <!--Propeller css-->
    <link rel="stylesheet" href="assets/css/propeller.min.css" type="text/css" media="all" />

    <!--Owl Carousel css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.css" type="text/css"
        media="all" />

    <!--Quantify css-->
    <link rel="stylesheet" href="assets/css/quantify-theme.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/quantify.css" type="text/css" media="all" />

</head>

<body  style="background: #4acc8e">
    <nav class="navbar navbar-fixed-top pmd-navbar primary-navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="pmd-ripple-effect navbar-toggle pmd-navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" title="" href="index.html">
                    <h3 style="color:#4acc8e;">Inside Out</h3>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse pmd-navbar-sidebar">
                <!-- Navbar Right -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                </ul>
                <!-- End Navbar Right -->
            </div>
        </div>
        <div class="pmd-sidebar-overlay"></div>
    </nav>
    <!-- End Navbar -->

    <div class="container">

        <div class="section section-custom" style="margin-top:80px; margin-bottom:80px">
            <!--section-title -->
            <h2 align="center">Reset password</h2>
            <!--section-title end -->

            <!-- section content start-->
            <div class="pmd-card pmd-z-depth"  style="width:75%; margin-left:auto; margin-right:auto">
                <div class="pmd-card-body">
                
                    <form class="form-horizontal" role="form"  action="<?php echo site_url('Guest/reset_password')?>" method="post">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label" style = "visible: false">
                            <input id="conf-pass" class="form-control" type="hidden" name = "reset_email" value = $user['email']>
                        </div> 
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="pass" class="control-label">Password</label>
                            <input id="pass" class="form-control" type="password" name = "password1">
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="conf-pass" class="control-label">Confirm password</label>
                            <input id="conf-pass" class="form-control" type="password" name = "password2">
                        </div>                        

                        <div class="form-group">
                            <div class="pull-right">
                                <button class="btn btn-primary pmd-checkbox-ripple-effect" type = "submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- section content end -->
        </div>
    </div>

    <!-- footer-->
    <footer class="section site-footer">
        <div class="container">
            <!-- Copyrights -->
            <div class="copyright pull-right">
                <div class="site-info text-right">
                    <span class="crafted">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script> , made with
                        <i class="material-icons pmd-xs">favorite</i>
                        by F4nt4stic
                    </span>
                </div>
            </div>
            <!-- End Copyrights -->

        </div>

    </footer>
    <!-- .site-footer -->

    <!--Jquery-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!--Bootstrap js-->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--Propeller js-->
    <script type="text/javascript" src="assets/js/propeller.min.js"></script>

    <!--Owl Carousel js-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

    <!--Quantify custom js-->
    <script type="text/javascript" src="js/jquery.loadie.js"></script>
    <script type="text/javascript" src="assets/js/quantify-global.js"></script>

</body>

</html>