<!--content area start-->
<div id="content" class="pmd-content content-area dashboard">
	<!--tab start-->
	<div class="container-fluid">

		<?php 
			$controller = $this->router->fetch_class();
			if ($manager != null) {
				echo "<h2><font color=\"#4acc8e\">Manager: </font> <a href=\"".base_url()."index.php/$controller/viewEmployee/$manager->Id\">$manager->name $manager->surname</a></h2>";
			} else {
				echo "<p><font color=\"#4acc8e\">Manager: </font>none</p>";
			}   
		?>

		<div class="row">
			<div class="col-lg-12">
				<!-- responsive table example -->
				<div class="pmd-card pmd-z-depth pmd-card-custom-view">
					<table id="example" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width="30%">First name</th>
								<th width="30%">Last name</th>
								<th width="40%">email</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($employees as $employee) {
									$name = $employee->name;
									$surname = $employee->surname;
									$email = $employee->email;
									$id = $employee->Id;
									echo
									"<tr>
										<td>
											<a href=\"".base_url()."index.php/$controller/viewEmployee/$id"."\">$name</a>
										</td>
										<td>
											<a href=\"".base_url()."index.php/$controller/viewEmployee/$id"."\">$surname</a>
										</td>
										<td>
											<a href=\"mailto:$email\">$email</a>
										</td>
									</tr>";
								}
							?>						

						</tbody>
					</table>
				</div>
				<!-- responsive table example end -->

			</div>
		</div>
	</div>

</div>
<!-- content area end -->