<!--
Autori:
    Aleksa Marusic
    Marija Kostic
	
	php> Stefan Milanovic
-->
<!doctype html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="InsideOut - Blank Page">
<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
<!-- <?php echo $this->session->userdata('account')->name . " " . $this->session->userdata('account')->surname; ?> | --> 
<title> InsideOut - Dashboard</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>/assets/img/favicon.ico">

<!-- Google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">

<!-- Propeller css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/propeller.min.css">

<!-- Propeller theme css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>themes/css/propeller-theme.css">

<!-- Propeller admin theme css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>themes/css/propeller-admin.css">

<!-- custom css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">

</head>

<body>
<!-- Header Starts -->
<!--Start Nav bar -->
<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">

	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<!-- <a href="javascript:void(0);" data-target="basicSidebar" data-placement="left" data-position="slidepush" is-open="false" is-open-width="1000" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons md-light">menu</i></a> -->	
		  <a href="<?php echo base_url()?>index.php/Worker" class="navbar-brand">
		  	Inside Out
		  </a>
		</div>
        <a href='<?php echo base_url()."index.php/employee/signout"?>' class="navbar-right navbar-brand">Logout</a>
	</div>

</nav><!--End Nav bar -->
<!-- Header Ends -->

<!-- Sidebar Starts -->
<div class="pmd-sidebar-overlay"></div>

<!-- Left sidebar -->
<aside id="basicSidebar" class="pmd-sidebar  sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-dar sidebar-with-icons" role="navigation">
	<ul class="nav pmd-sidebar-nav">
	
        <!-- User info -->
			<!-- <li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg"> -->
			<li>
				<!-- <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);"> -->
				<a>	
					<!-- <div class="media-left">
						<img src="assets/img/johndoesmall.jpg" alt="New User">
					</div> -->
					<div class="media-body media-middle" style="text-align:center;">Welcome, <?php echo $this->session->userdata('account')->name;?></div>
					<div class="media-right media-middle">
						<i class="dic-more-vert dic"></i>
					</div>
				</a>
				<!-- <ul class="dropdown-menu">
					<li>
						<a href='<?php echo base_url()."index.php/employee/signout"?>'>Logout</a>
					</li>
				</ul> -->
			</li>
			<!-- End user info -->
		
		<li> 
			<a class="pmd-ripple-effect" href='<?php echo base_url()."index.php/worker/tasks"?>'>
				<i class="material-icons md-white media-left media-middle">event_note</i>
				<span class="media-body">Tasks</span>
			</a> 
		</li>
		
		<li class="dropdown pmd-dropdown"> 
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href='<?php echo base_url()."index.php/worker/teams"?>'>	
				<i class="material-icons md-white media-left media-middle">people</i> 
				<span class="media-body">Teams</span>
				<div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
			</a> 
			<ul class="dropdown-menu">
			<?php
                foreach($teams as $team){
                    $teamName = $team->teamName;
                    $email = $team->email;
                    $companyName = $team->companyName;
                    $dataTeam = array(
                            'teamName' => $teamName,
                            'companyName' => $companyName
                    );
					echo "<form id = \"viewTeamForm-".$teamName."\" method=\"post\" action=\"".base_url()."index.php/Manager/viewTeam/$teamName"."\">
                        <li><a onclick='document.getElementById(\"viewTeamForm-".$teamName."\").submit();'>$teamName</a></li>
                        </form>";
                }
                ?>
			</ul>
		</li>
		<!--
		<li> 
			<a class="pmd-ripple-effect" href="manager-settings.html">	
				<i class="material-icons md-white media-left media-middle">settings</i> 
				<span class="media-body">Settings</span>
			</a> 
		</li> -->
	</ul>
</aside><!-- End Left sidebar -->
<!-- Sidebar Ends -->