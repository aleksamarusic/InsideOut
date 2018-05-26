
<body style="background: #4acc8e">
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
                <a class="navbar-brand" title="" href="<?php echo base_url()."index.php/Guest"?>">
                    <h3 style="color:#4acc8e;">Inside Out</h3>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse pmd-navbar-sidebar">
                <!-- Navbar Right -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url()."index.php/Guest"?>">Home</a>
                    </li>
                </ul>
                <!-- End Navbar Right -->
            </div>
        </div>
        <div class="pmd-sidebar-overlay"></div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid" style="background-image: url('<?php echo base_url()?>assets/img/bg-1.jpg'); background-size: cover;">

        <div class="section section-custom">
            <!--section-title -->
            <h2 align="center" style="margin-top: 70px; color: #4acc8e;">Register for the company <span style="color:white">ETF</span></h2>
            <!--section-title end -->

            <!-- section content start-->
            <div class="pmd-card pmd-z-depth" style="width:75%; margin-left:auto; margin-right:auto">
                <div class="pmd-card-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" id="name" class="form-control">
                        </div>

                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="surname" class="control-label">Surname</label>
                            <input type="text" id="surname" class="form-control">
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="email" class="control-label">Email</label>
                            <input type="emal" id="email" class="form-control">
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="pass" class="control-label">Password</label>
                            <input id="pass" class="form-control" type="password">
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="conf-pass" class="control-label">Confirm password</label>
                            <input id="conf-pass" class="form-control" type="password">
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <a href="employee-dashboard.html" class="btn btn-primary pmd-checkbox-ripple-effect">Sign up</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- section content end -->
        </div>
    </div>

    <!-- -->
    <div tabindex="-1" class="modal fade" id="price-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="color:black;">×</button>
                    <h2 class="pmd-card-title-text text-center">Registration is not possible</h2>
                </div>
                <div class="modal-body">
                </div>
                <div class="pmd-modal-action text-center">
                    <a href="director-dashboard.html" class="btn pmd-ripple-effect btn-primary" type="button">Confirm</a>
                    <a href="" data-dismiss="modal" class="btn pmd-ripple-effect btn-primary" type="button">Cancel</a>
                </div>
            </div>
        </div>
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