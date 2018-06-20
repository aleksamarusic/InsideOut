<!--
Autori:
    Aleksa Marusic
    Marija Kostic

    php> Nikola Nedeljkovic, Stefan Milanovic
-->

<body>
<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar primary-navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button class="pmd-ripple-effect navbar-toggle pmd-navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" title="" href="#intro">
                <h3 style="color:#4acc8e;">Inside Out</h3>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse pmd-navbar-sidebar">

            <!-- Navbar Right -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#intro">Home</a>
                </li>
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="#team-members">Team</a>
                </li>
                <li>
                    <a href="#sign-up">Sign up</a>
                </li>
                <li>
                    <a href="#log-in">Login</a>
                </li>
                <span class="nav-active"></span>
            </ul>
            <!-- End Navbar Right -->
        </div>
    </div>
    <div class="pmd-sidebar-overlay"></div>
</nav>
<!-- End Navbar -->

<!-- Intro section -->
<div id="intro" class="intro-section owl-carousel text-center">
    <div class="intro-img intro-banner-left" style="background-image: url('<?php echo base_url()?>assets/img/bg-1.jpg'); background-size: cover;">
        <div class="container">
            <div class="intro-text">
                <h1 class="inverse">Project <span style="color: #4acc8e;">Inside Out</span></h1>
                <p class="lead inverse"> The ultimate web application for improving your company's time and resource management. Invite your colleagues and employees with the
                    click of a button. Easily distribute them into teams you create and manage. Give them tasks and track your teams' progress.
                    <span style="color:#4acc8e;">Inside Out</span> provides all of this and more!</p>
                    <p>&nbsp; </p>
                <p class="lead inverse">If you're unsure whether this is the application for you, just keep scrolling down. 
                        We've presented a highlight of the functionalities our app provides.
                        Otherwise, thank you for considering us! Press the Get Started button below and start using <span style="color:#4acc8e;">Inside Out</span> today.
                    </p>
                <a href="#sign-up" class="btn btn-primary pmd-btn-outline pmd-ripple-effect btn-lg">Get Started</a>
            </div>
        </div>
    </div>
</div>
<!-- End Section Intro Slider -->

<!-- Section About Product -->
<div id="about" class="section">
    <div class="container">
        <h2 class="text-center">Here's a preview of what we give you</h2>
        <p class="lead text-center"> This section will show you a glance of the key features <span style="color:#4acc8e;">Inside Out</span> has to offer. 
        </p>
        <!-- Our Mission -->
        <div class="card-media row">
            <div class="col-sm-6 col-xs-12">
                <img src="<?php echo base_url()?>assets/img/our-mission.jpg" title="Our Mission" alt="Our Mission" class="img-responsive" />
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="card-media-body">
                    <h3 class="card-media-title text-uppercase">Create teams and tasks</h3>
                    <p>Structure your project development by splitting your employees into as many teams as you'd like. 
                        Our application lets you issue out tasks you can monitor, while also providing you with a way
                        to keep your personal tasks private and separate. You can give tasks yourself or you can declare team managers
                        who manage the tasks for you, while you keep track of your projects' overall progress. Or both. Either way,
                        <span style="font-weight:bold; color:#4acc8e;">Inside Out</span> gives you full control of your company and resources at all times.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Our Mission -->
        <!-- Our Vision -->
        <div class="card-media row">
            <div class="col-sm-6 col-xs-12 pull-right">
                <img src="<?php echo base_url()?>assets/img/our-vision.jpg" title="Our Vision" alt="Our Vision" class="img-responsive" />
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="card-media-body">
                    <h3 class="card-media-title text-uppercase">Maintain your own hierarchy</h3>
                    <p>We give you the possibility to organise your employees however you see fit. As the overseer of your company, you can promote 
                        accounts to help you out by keeping your teams in check. These priviledged accounts have the ability to create tasks for other employees, 
                        and can even manage entire teams themselves.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Our Vision -->
        <!-- Our Goals -->
        <div class="card-media row">
            <div class="col-sm-6 col-xs-12">
                <img src="<?php echo base_url()?>assets/img/our-goals.jpg" title="Our Goals" alt="Our Goals" class="img-responsive" />
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="card-media-body">
                    <h3 class="card-media-title text-uppercase">Simple invite link mechanism</h3>
                    <p>Inviting colleagues and employees to join in has never been easier. <span style="font-weight:bold; color:#4acc8e;">Inside Out</span> provides a generator for 
                        invite links that is exclusive to your company. Accounts created using your invite link are automatically connected to your company
                        and appear in your dashboard, making registration for the entire company fast and efficient.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Our Goals -->
        <!-- Our Accomplishments -->
        <div class="card-media row">
            <div class="col-sm-6 col-xs-12 pull-right">
                <img src="<?php echo base_url()?>assets/img/our-accomplishments.jpg" title="Our Accomplishments" alt="Our Accomplishments" class="img-responsive"
                />
            </div>
            <div class="col-sm-6 col-xs-12">
                <div class="card-media-body">
                    <h3 class="card-media-title text-uppercase">Modern technology and design</h3>
                    <p>
                        <span style="font-weight:bold; color:#4acc8e;">Inside Out</span> is a new project, and as such is developed using the latest
                        technology in the area of web design and back-end programming. Our website provides an elegant, clean-looking interface on both
                        desktop and mobile, while our server processes and handles the requests of a large number of users simultaneously in a matter of seconds.
                        Speed, responsiveness, scalability, and security are only some of the things we worry about in the background so you don't have to.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Our Accomplishments -->
    </div>
</div>
<!-- End Section About Product -->

<!-- Section Team Members -->
<div id="team-members" class="section white-bg text-center">
    <div class="container">
        <h2>Our Awesome Team</h2>
        <p class="lead">United by our mutual passion for programming and driven by our aspiration for quality. Meet the people behind the project:</p>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <!-- Team Member Card -->
                <div class="pmd-card pmd-card-border pmd-z-depth">
                    <div class="pmd-card-media">
                        <img class="img-fluid" style="border-radius: 5px" src="<?php echo base_url()?>assets/img/nikola.jpg" alt="Nikola Nedeljković" title="Nikola Nedeljković">
                    </div>
                    <div class="pmd-card-body">
                        <h4 class="pmd-card-title-text">Nikola Nedeljković</h4>
                        <p class="pmd-card-description">Third year student of Software Engineering at the University of Belgrade.</p>
                    </div>
                </div>
                <!-- end Team Member Card -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="pmd-card pmd-card-border pmd-z-depth">
                    <div class="pmd-card-media">
                        <img class="img-fluid" style="border-radius: 5px" src="<?php echo base_url()?>assets/img/marija.jpg" alt="Marija Kostić" title="Marija Kostić">
                    </div>
                    <div class="pmd-card-body">
                        <h4 class="pmd-card-title-text">Marija Kostić</h4>
                        <p class="pmd-card-description">Third year student of Software Engineering at the University of Belgrade.</p>
                    </div>
                </div>
                <!-- End Team Member Card -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <!-- Team Member Card -->
                <div class="pmd-card pmd-card-border pmd-z-depth">
                    <div class="pmd-card-media">
                        <img class="img-fluid" style="border-radius: 5px" src="<?php echo base_url()?>assets/img/stefan.jpg" alt="Stefan Milanović" title="Stefan Milanović">
                    </div>
                    <div class="pmd-card-body">
                        <h4 class="pmd-card-title-text">Stefan Milanović</h4>
                        <p class="pmd-card-description">Third year student of Software Engineering at the University of Belgrade.</p>
                    </div>
                </div>
                <!-- End Team Member Card -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <!-- Team Member Card -->
                <div class="pmd-card pmd-card-border pmd-z-depth">
                    <div class="pmd-card-media">
                        <img class="img-fluid" style="border-radius: 5px" src="<?php echo base_url()?>assets/img/aleksa.jpg" alt="Aleksa Marušić" title="Aleksa Marušić">
                    </div>
                    <div class="pmd-card-body">
                        <h4 class="pmd-card-title-text">Aleksa Marušić</h4>
                        <p class="pmd-card-description">Third year student of Software Engineering at the University of Belgrade.</p>
                    </div>
                </div>
                <!-- End Team Member Card -->
            </div>
        </div>
    </div>
</div>
<!--End Section Team Members -->

<!-- Section Signup -->
<div id="sign-up" class="section primary-bg">
    <div class="container">
        <div class="media">
            <div class="media-middle">
                <h1 class="section-title text-center">
                    Start using Inside Out today
                </h1>
            </div>
            <div class="media-middle">
                <div id="sign-up" class="media-middle text-center">
                    <a href="<?php echo site_url().'/guest/signup'?>" title="sign up" class="btn btn-lg pmd-btn-outline pmd-ripple-effect btn-default">Sign up</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Section Sign up -->

<!-- footer-->
<footer id="log-in" class="section site-footer">
    <div class="container">

        <!--log in form -->
        <div class="card-form">
            <div class="text-center">
                    <?php if (isset($bad_login)) echo "<h5 class='inverse' style='color:red'>Please insert correct login data!</h5>" ?>
                    <?php if (isset($bad_email)) echo "<h5 class='inverse' style='color:red'>Please insert correct email!</h5>" ?>
                    <?php if (isset($bad_reset)) echo "<h5 class='inverse' style='color:red'>Passwords do not match!</h5>" ?>
                    <?php if (isset($password_changed)) echo "<h5 class='inverse' style='color:red'>Password changed successfully.</h5>" ?>
            </div>

            <form class="form-inverse" action="<?php echo site_url('Guest/login')?>" method="post">
                <div class="text-left">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="inputError1" class="control-label pmd-input-group-label">Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="material-icons pmd-sm">email</i></div>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="inputError1" class="control-label pmd-input-group-label">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="material-icons pmd-sm">lock_outline</i></div>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary pmd-ripple-effect btn-lg">Log in</button>
                </div>

                <a href="" class="text-center" data-target="#forgot-pass-modal" data-toggle="modal">
                    <h5 class="inverse">Forgot your password?</h5>
                </a>
            </form>
        </div>
        <!-- End log in form -->

        <br>
        <br>
        <!-- Social icons -->
        <div class="social-icons text-center">
            <h2 class="inverse text-capitalize">follow us on</h2>
            <ul class="icons-medium list-inline">
                <li class="facebook">
                    <a href="javascript:void(0)" target="_blank" class="pmd-ripple-effect">
                        <svg version="1.1" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                            <g>
                                <path fill="#FFFFFF" d="M17.5,14.5c0,0.504,0,3,0,3h-2v2.994l2,0.006v10h4v-10h3c0,0,0-0.985,0-3c-0.35,0-3,0-3,0s0-2.657,0-3
                                        c0-0.344,0.569-1,1-1c0.43,0,1.16,0,2,0c0-0.459,0-1.537,0-3c-1.121,0-2.438,0-3,0C17.307,10.5,17.5,13.997,17.5,14.5z"
                                />
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="instagram">
                    <a href="javascript:void(0)" target="_blank" class="pmd-ripple-effect">
                        <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                            <g>
                                <path fill="#FFFFFF" d="M26.071,9.938H13.803c-2.132,0-3.865,1.734-3.865,3.865v12.271c0,2.131,1.734,3.864,3.865,3.864h12.271
                                        c2.131,0,3.864-1.734,3.864-3.864V13.803C29.938,11.672,28.203,9.938,26.071,9.938L26.071,9.938z M27.289,12.174l0.438-0.001v3.319
                                        l-3.344,0.011l-0.011-3.319L27.289,12.174z M19.938,16.592c2.774,0,3.346,2.604,3.346,3.347c0,1.843-1.502,3.345-3.346,3.345
                                        c-1.846,0-3.346-1.502-3.346-3.345C16.591,19.195,17.164,16.592,19.938,16.592L19.938,16.592z M27.745,25.83
                                        c0,1.057-0.858,1.916-1.917,1.916H14.009c-1.058,0-1.917-0.858-1.917-1.916v-8.119h2.777c-0.258,0.635-0.403,1.501-0.403,2.228
                                        c0,3.015,2.452,5.469,5.468,5.469c3.017,0,5.468-2.454,5.468-5.469c0-0.727-0.146-1.593-0.402-2.228h2.744v8.119H27.745z
                                            M27.745,25.83" />
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="youtube">
                    <a href="javascript:void(0)" target="_blank" class="pmd-ripple-effect">
                        <svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                            <g>
                                <path fill="#FFFFFF" d="M29.988,18.326c-0.007-0.402-0.039-0.91-0.094-1.523c-0.057-0.614-0.137-1.163-0.24-1.646
                                        c-0.119-0.543-0.378-1.001-0.775-1.373c-0.398-0.372-0.861-0.588-1.391-0.647c-1.651-0.186-4.147-0.278-7.488-0.278
                                        s-5.837,0.093-7.489,0.278c-0.528,0.06-0.99,0.275-1.384,0.647c-0.395,0.372-0.651,0.83-0.771,1.373
                                        c-0.111,0.483-0.195,1.032-0.251,1.646c-0.056,0.613-0.087,1.121-0.095,1.523C10.004,18.728,10,19.286,10,20
                                        s0.004,1.272,0.011,1.674c0.007,0.402,0.039,0.91,0.095,1.523c0.056,0.614,0.136,1.163,0.24,1.646
                                        c0.119,0.543,0.377,1.001,0.775,1.373c0.398,0.371,0.861,0.587,1.39,0.646c1.652,0.187,4.148,0.279,7.489,0.279
                                        s5.837-0.093,7.488-0.279c0.529-0.06,0.99-0.275,1.385-0.646c0.395-0.372,0.65-0.83,0.77-1.373
                                        c0.111-0.483,0.195-1.032,0.252-1.646c0.055-0.613,0.087-1.121,0.094-1.523C29.996,21.272,30,20.714,30,20
                                        S29.996,18.728,29.988,18.326z M23.951,20.603l-5.714,3.571c-0.104,0.074-0.231,0.111-0.38,0.111c-0.111,0-0.227-0.029-0.346-0.089
                                        c-0.246-0.134-0.368-0.343-0.368-0.625v-7.143c0-0.282,0.123-0.491,0.368-0.625c0.253-0.134,0.495-0.127,0.726,0.022l5.714,3.571
                                        c0.223,0.126,0.334,0.327,0.334,0.603S24.174,20.477,23.951,20.603z" />
                            </g>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <!--End social icons -->

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

    <!-- forgot pass modal -->
    <div tabindex="-1" class="modal fade" id="forgot-pass-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="color:black;">×</button>
                    <h2 class="pmd-card-title-text text-center">Forgot password?</h2>
                    <h6 class="text-center">Submit your email address and we'll send you a link to reset your password</h6>
                </div>
                <form class="form-horizontal" action="<?php echo site_url('Guest/checkEmail')?>" method="post">
                <div class="modal-body">
                   
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="email">Email Address</label>
                            <input type="email" class="mat-input form-control" id="email" name="reset_email" value="">
                        </div>
                    
                </div>
                <div class="pmd-modal-action text-center">
                    <button href = "#log-in" class="btn pmd-ripple-effect btn-primary" type="submit">Send me a reset link</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>

</footer>
    <!-- .site-footer -->
    