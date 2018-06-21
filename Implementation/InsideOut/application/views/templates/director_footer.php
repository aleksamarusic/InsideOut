<footer class="admin-footer">
		<div class="container-fluid">
			<ul class="list-unstyled list-inline">
				<li>
					<div>
						<br>
						<h3 class="pmd-card-title-text">&copy;
							<span class="auto-update-year"></span>, made by F4nt4stic</h3>

					</div>
				</li>

				<li class="pull-right for-support">
					<a href="mailto:support@f4t4stic.com">
						<div>
							<svg x="0px" y="0px" width="38px" height="38px" viewBox="0 0 38 38" enable-background="new 0 0 38 38">
								<g>
									<path fill="#A5A4A4" d="M25.621,21.085c-0.642-0.682-1.483-0.682-2.165,0c-0.521,0.521-1.003,1.002-1.524,1.523
		c-0.16,0.16-0.24,0.16-0.44,0.08c-0.321-0.2-0.683-0.32-1.003-0.521c-1.483-0.922-2.726-2.125-3.809-3.488
		c-0.521-0.681-1.002-1.402-1.363-2.205c-0.04-0.16-0.04-0.24,0.08-0.4c0.521-0.481,1.002-1.003,1.524-1.483
		c0.721-0.722,0.721-1.524,0-2.246c-0.441-0.44-0.842-0.842-1.203-1.202c-0.441-0.441-0.842-0.842-1.243-1.243
		c-0.642-0.642-1.483-0.642-2.165,0c-0.521,0.521-1.002,1.002-1.524,1.523c-0.481,0.481-0.722,1.043-0.802,1.685
		c-0.08,1.042,0.16,2.085,0.521,3.047c0.762,2.085,1.925,3.849,3.328,5.532c1.884,2.286,4.17,4.05,6.815,5.333
		c1.203,0.562,2.406,1.002,3.729,1.123c0.922,0.04,1.724-0.201,2.365-0.923c0.441-0.521,0.923-0.922,1.403-1.403
		c0.682-0.722,0.682-1.563,0-2.245C27.265,22.729,26.423,21.927,25.621,21.085z" />
									<path fill="#A5A4A4" d="M32.437,5.568C28.869,2,24.098-0.005,19.005-0.005S9.182,2,5.573,5.568C2.005,9.177,0,13.908,0,19
		s1.965,9.823,5.573,13.432c3.568,3.568,8.34,5.573,13.432,5.573s9.823-1.965,13.431-5.573
		C39.854,25.014,39.854,12.985,32.437,5.568z M30.299,30.294c-3.003,3.045-7.021,4.695-11.293,4.695
		c-4.272,0-8.291-1.65-11.294-4.695C4.666,27.29,3.016,23.271,3.016,19c0-4.272,1.649-8.291,4.695-11.294
		c3.003-3.003,7.022-4.695,11.294-4.695c4.272,0,8.291,1.649,11.293,4.695C36.56,13.924,36.56,24.075,30.299,30.294z" />
								</g>
							</svg>
						</div>
						<div>
							<span class="pmd-card-subtitle-text">For Support</span>
							<h3 class="pmd-card-title-text">support@f4nt4stic.com</h3>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</footer>
	<!-- Footer Ends -->

	<!-- Scripts Starts -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/propeller.min.js"></script>
	<script>
		$(document).ready(function () {
			var sPath = window.location.pathname;
			var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
			$(".pmd-sidebar-nav").each(function () {
				$(this).find("a[href='" + sPage + "']").parents(".dropdown").addClass("open");
				$(this).find("a[href='" + sPage + "']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
				$(this).find("a[href='" + sPage + "']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
				$(this).find("a[href='" + sPage + "']").addClass("active");
			});
			$(".auto-update-year").html(new Date().getFullYear());
		});
	</script>

	<!-- Scripts Ends -->
	<!-- Initialize the plugin: -->
    <script type="text/javascript">
        
		// $(document).ready(function () {
        //     $('.multiselect').multiselect();
        // });

		<?php 
        if (isset($calcModal)) {
            echo
            "$(document).ready(function(){
                $('#num-of-accounts-modal').modal('show');
            })";
		}
		if (isset($priceModal)) {
            echo
            "$(document).ready(function(){
                $('#price-modal').modal('show');
            })";
		}
		if (isset($giveTaskModal)) {
			echo
            "$(document).ready(function(){
                $('#give-task-modal').modal('show');
            })";
		}
    ?>
		
    </script>

</body>

</html>