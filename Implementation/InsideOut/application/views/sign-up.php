<!--
Autori:
    Aleksa Marusic
    Marija Kostic
	
	php> Stefan Milanovic
-->
<body  >
<!-- style="background: #4acc8e"> -->
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
                <a class="navbar-brand" title="" href="<?php echo site_url('guest/index')?>">
                    <h3 style="color:#4acc8e;">Inside Out</h3>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse pmd-navbar-sidebar">
                <!-- Navbar Right -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo site_url('guest/index')?>">Home</a>
                    </li>
                </ul>
                <!-- End Navbar Right -->
            </div>
        </div>
        <div class="pmd-sidebar-overlay"></div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid"  style="background-image: url('<?php echo base_url()?>assets/img/bg-1.jpg'); background-size: cover;">

        <div class="section section-custom">
            <!--section-title -->
            <h2 align="center" style="margin-top: 70px; color: #4acc8e">Sign up</h2>
            <!--section-title end -->

            <!-- section content start-->
            <div class="pmd-card pmd-z-depth" style="width:75%; margin-left:auto; margin-right:auto">
                <div class="pmd-card-body">
                    <form class="form-horizontal" role="form" id="signupForm" name="signupForm" method="post" action="<?php echo site_url('guest/attempt_signup/')?>">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="name" class="control-label" <?php if (isset($nameInvalid) && $nameInvalid == 1) { echo "style='color: red'"; } ?> >Name</label>
							<?php
								if (!isset($nameInvalid)) {
									echo "<input type='text' id='name' name='name' class='form-control' aria-describedby='nameWarningBlock'>";
								}
								else if ($nameInvalid == 1) {
									echo "<input type='text' id='name' name='name' class='form-control' aria-describedby='nameWarningBlock'>";
									echo "<small id='nameWarningBlock' class='form-text' style='color:red'> The name field cannot be empty! </small>";
								}
								else {
									echo "<input type='text' id='name' name='name' class='form-control' aria-describedby='nameWarningBlock' value='" . $name . "'/>" ;
								}
							?>
                            
                        </div>

                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="surname" class="control-label"  <?php if (isset($surnameInvalid) && $surnameInvalid == 1) { echo "style='color: red'"; } ?> >Surname</label>
							<?php
								if (!isset($surnameInvalid)) {
									echo "<input type='text' id='surname' name='surname' class='form-control' aria-describedby='surnameWarningBlock'>";
								}
								else if ($surnameInvalid == 1) {
									echo "<input type='text' id='surname' name='surname' class='form-control' aria-describedby='surnameWarningBlock'>";
									echo "<small id='surnameWarningBlock' class='form-text' style='color:red'> The surname field cannot be empty! </small>";
								}
								else {
									echo "<input type='text' id='surname' name='surname' class='form-control' aria-describedby='nameWarningBlock' value='" . $surname . "'/>" ;
								}
							?>
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="email" class="control-label" <?php if (isset($emailInvalid) && $emailInvalid == 1) { echo "style='color: red'"; } ?> >Email</label>

							<?php
								if (!isset($emailInvalid)) {
									echo "<input type='email' id='email' name='email' class='form-control' aria-describedby='emailWarningBlock'>";
								}
								else if ($emailInvalid == 1) {
									echo "<input type='email' id='email' name='email' class='form-control' aria-describedby='emailWarningBlock'>";
									echo "<small id='emailWarningBlock' class='form-text' style='color:red'> Please select a valid email address! </small>";
								}
								else if ($emailInvalid == 0) {
									echo "<input type='email' id='email' name='email' class='form-control' aria-describedby='emailWarningBlock' value='" . $email . "'/>" ;
								}
								else {
									echo "<input type='email' id='email' name='email' class='form-control' aria-describedby='emailWarningBlock' value='" . $email . "'/>" ;
									echo "<small id='emailWarningBlock' class='form-text' style='color:red'> This email address is already in use! </small>";
								}
							?>
							
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="pass" class="control-label" <?php if (isset($passInvalid) && $passInvalid == 1) { echo "style='color: red'"; } ?> >Password</label>
							
							<?php
								if (!isset($passInvalid)) {
									echo "<input type='password' id='pass' name='pass' class='form-control' aria-describedby='passWarningBlock'>";
								}
								else if ($passInvalid == 1) {
									echo "<input type='password' id='pass' name='pass' class='form-control' aria-describedby='passWarningBlock'>";
									echo "<small id='passWarningBlock' class='form-text' style='color:red'> The password field cannot be empty! </small>";
								}
								else {
									echo "<input type='password' id='pass' name='pass' class='form-control' aria-describedby='passWarningBlock'>";
								}
							?>
							
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="conf-pass" class="control-label" <?php if (isset($confPassInvalid) && $confPassInvalid == 1) { echo "style='color: red'"; } ?>  >Confirm password</label>
							
							<?php
								if (!isset($confPassInvalid)) {
									echo "<input type='password' id='conf-pass' name='conf-pass' class='form-control' aria-describedby='confPassWarningBlock'>";
								}
								else if ($confPassInvalid == 1) {
									echo "<input type='password' id='conf-pass' name='conf-pass' class='form-control' aria-describedby='confPassWarningBlock'>";
									echo "<small id='confPassWarningBlock' class='form-text' style='color:red'> The password fields must match! </small>";
								}
								else {
									echo "<input type='password' id='conf-pass' name='conf-pass' class='form-control' aria-describedby='confPassWarningBlock'>";
								}
							?>
							
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="company" class="control-label" <?php if (isset($companyInvalid) && $companyInvalid == 1) { echo "style='color: red'"; } ?> >Company name</label>

							<?php
								if (!isset($companyInvalid)) {
									echo "<input type='text' id='company' name='company' class='form-control' aria-describedby='companyWarningBlock'>";
								}
								else if ($companyInvalid == 1) {
									echo "<input type='text' id='company' name='company' class='form-control' aria-describedby='companyWarningBlock'>";
									echo "<small id='companyWarningBlock' class='form-text' style='color:red'> The company name field cannot be empty! </small>";
								}
								else if ($companyInvalid == 0) {
									echo "<input type='text' id='company' name='company' class='form-control' aria-describedby='companyWarningBlock' value='" . $company . "'/>";
								}
								else {
									echo "<input type='text' id='company' name='company' class='form-control' aria-describedby='companyWarningBlock' value='" . $company . "'/>";
									echo "<small id='companyWarningBlock' class='form-text' style='color:red'> This company name is already taken! </small>";
								}
							?>
							
                        </div>
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="accountNumber" class="control-label" <?php if (isset($accountNumberInvalid) && $accountNumberInvalid == 1) { echo "style='color: red'"; } ?> >Number of accounts</label>
                          
							<?php
								if (!isset($accountNumberInvalid)) {
									echo "<input type='number' id='accountNumber' name='accountNumber' class='form-control' aria-describedby='numberWarningBlock' min='1' value='1'>";
								}
								else if ($accountNumberInvalid == 1) {
									echo "<input type='number' id='accountNumber' name='accountNumber' class='form-control' aria-describedby='numberWarningBlock' min='1' value='1'>";
									echo "<small id='numberWarningBlock' class='form-text' style='color:red'> The account number cannot be lesser than 0! </small>";
								}
								else {
									echo "<input type='number' id='accountNumber' name='accountNumber' class='form-control' aria-describedby='numberWarningBlock' min='1' value='" . $accountNumber . "'/>";
								}
							?>
							
                        </div>
                        <div class="form-group">
                            <div class="pull-right">
                                <a href="javascript:;" class="btn btn-primary pmd-checkbox-ripple-effect" data-target="#price-modal" data-toggle="modal"
								onclick="(function(){
									document.confirmationForm.accountNumberField.value = document.signupForm.accountNumber.value;
									document.confirmationForm.totalField.value= '$' + (document.signupForm.accountNumber.value * 20) + '.00';
								})()"
								>Sign up</a>
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

        <div tabindex="-1" class="modal fade" id="price-modal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="color:black;">×</button>
                        <h2 class="pmd-card-title-text text-center">Thank you for considering our product</h2>
                    </div>
                    <div class="modal-body">
                        <table class="table" style="width:60%; margin-left:auto; margin-right:auto; margin-top:50px">
                            
							<form name="confirmationForm">
                            <tr>
                                <td>Number of accounts</td>
                                <td id="accountNumberColumn">
									<input type="text" name="accountNumberField" style="border:0; margin-left: 160px;"/>
								</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td style="font-weight: bold;"> <input type="text" style="border:0; margin-left: 160px;" name="totalField"/> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
							</form>
                        </table>
                    </div>
                    <div class="pmd-modal-action text-center">
						<input type="submit" form="signupForm" class="btn pmd-ripple-effect btn-primary" value="Confirm"/>
                        <!-- <a href="director-dashboard.html" class="btn pmd-ripple-effect btn-primary" type="button">Confirm</a> --> 
                        <a href="" data-dismiss="modal" class="btn pmd-ripple-effect btn-primary" type="button">Cancel</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- .site-footer -->
