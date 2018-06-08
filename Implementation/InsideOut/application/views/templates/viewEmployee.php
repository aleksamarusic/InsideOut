
	<!--content area start-->
	<div id="content" class="pmd-content dashboard">
		<!--tab start-->
		<div class="container-fluid full-width-container">
		<?php
			if ($canGiveTask)
				echo "<div class=\"row\">
				<div class=\"col-lg-6 col-lg-offset-3\">
					<button class=\"btn pmd-btn-raised btn-primary btn-block pmd-ripple-effect btn-primary\" type=\"button\" data-target=\"#give-task-modal\"
					 data-toggle=\"modal\">Give task</button>
				</div>
			</div>
			<br>" 
		?>

			
			<div class="row">

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="pmd-card pmd-card-default pmd-z-depth">
						<div class="pmg-card-media">
							<div class="pmd-card-body" style="text-align: justify;">
								 <dl class="row">
									<dt class="col-md-4" style="margin-top: 20px;"> <b> Name: </b> </dt>
									<dd class="col-md-8" style="margin-top: 20px; text-align: center;"><i> <?php echo $employeeName ?> </i></dd>
									
									<dt class="col-md-4" style="margin-top: 50px"> <b> Surname: </b> </dt>
									<dd class="col-md-8" style="margin-top: 50px; text-align: center;"> <i><?php echo $employeeSurname ?> </i></dd>
									
									<dt class="col-md-4" style="margin-top: 50px"> <b> Teams: </b> </dt>
									<dd class="col-md-8" style="margin-top: 50px; text-align: center;"> <i> <?php echo $employeeTeams ?> </i></dd>
									
									<dt class="col-md-4" style="margin-top: 50px"> <b> Company name: </b> </dt>
									<dd class="col-md-8" style="margin-top: 50px; text-align: center;"> <i> <?php echo $employeeCompany ?> </i> </dd>
									
								</dl>
							</div>
						</div>
						
					</div>
				</div>


				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="pmd-card pmd-z-depth todos">
						<div class="pmd-card-title">
							<div class="media-left">
								<span class="service-icon img-circle bg-fill-feedback">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="31.999px" height="30.769px" viewBox="281.642 394.113 31.999 30.769" enable-background="new 281.642 394.113 31.999 30.769"
									 xml:space="preserve">
										<g>
											<path fill="#FFFFFF" d="M290.526,394.574l-4.218,5.273l-2.753-1.835c-0.567-0.379-1.331-0.224-1.707,0.341
										s-0.224,1.331,0.341,1.707l3.692,2.461c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.462l4.923-6.154
										c0.425-0.53,0.338-1.306-0.192-1.729C291.726,393.958,290.951,394.044,290.526,394.574z" />
											<path fill="#FFFFFF" d="M290.526,405.651l-4.218,5.272l-2.753-1.835c-0.566-0.379-1.331-0.225-1.707,0.341
										c-0.376,0.565-0.224,1.33,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.461l4.923-6.154
										c0.425-0.531,0.338-1.306-0.192-1.729C291.726,405.036,290.951,405.12,290.526,405.651z" />
											<path fill="#FFFFFF" d="M290.526,416.729l-4.218,5.272l-2.753-1.835c-0.566-0.378-1.331-0.224-1.707,0.341
										c-0.376,0.566-0.224,1.329,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.206,0.683,0.206c0.362,0,0.72-0.159,0.961-0.461
										l4.923-6.154c0.425-0.531,0.338-1.306-0.192-1.73C291.726,416.113,290.951,416.198,290.526,416.729z" />
											<rect x="296.41" y="419.959" fill="#FFFFFF" width="17.23" height="2.462" />
											<rect x="296.41" y="408.882" fill="#FFFFFF" width="17.23" height="2.461" />
											<rect x="296.41" y="397.805" fill="#FFFFFF" width="17.23" height="2.461" />
										</g>
									</svg>
								</span>
							</div>
							<div class="media-body media-middle">
								<h2 class="pmd-card-title-text typo-fill-secondary">Open tasks</h2>
							</div>
						</div>
						<table id="example-checkbox" class="table pmd-table table-hover table-striped display responsive nowrap">
							<thead>
								<th></th>
								<th></th>

							</thead>
							<tbody>
							<?php
							foreach($employeeTasks as $task){
							    $id = $task->taskId;
							    $statusPrivacy = $task->statusPrivacy;
                                $statusCompletion = $task->statusCompletion;
                                $statusAcceptance = $task->statusAcceptance;
                                $taskName = $task->taskName;
                                $description = $task->description;
                                $comment = $task->comment;
                                $expectedStartDate = $task->expectedStartDate;
                                $expectedEndDate = $task->expectedEndDate;
                                if ($statusCompletion == "NS" && $statusPrivacy == 'G' && $statusAcceptance == 'A'){
                                    echo "<tr>";
                                    echo "<td>$taskName</td>";
                                    echo "<td class=\"td-actions text-right\">
										<button class=\"btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary btn-xs\" type=\"button\" style=\"display: block;\" data-target=\"#info-open-task-modal\" data-toggle=\"modal\"><i class=\"material-icons pmd-xs\">info</i></button>
                                    	</td>
                                    	</tr>";
                                }
							}
							?>

							</tbody>
						</table>
						<span class="btn-loader loader hidden">Loading...</span>
					</div>
				</div>
				<!--end Todo Lists-->


				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="pmd-card pmd-z-depth todos">
						<div class="pmd-card-title">
							<div class="media-left">
								<span class="service-icon img-circle bg-fill-feedback">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="31.999px" height="30.769px" viewBox="281.642 394.113 31.999 30.769" enable-background="new 281.642 394.113 31.999 30.769"
									 xml:space="preserve">
										<g>
											<path fill="#FFFFFF" d="M290.526,394.574l-4.218,5.273l-2.753-1.835c-0.567-0.379-1.331-0.224-1.707,0.341
										s-0.224,1.331,0.341,1.707l3.692,2.461c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.462l4.923-6.154
										c0.425-0.53,0.338-1.306-0.192-1.729C291.726,393.958,290.951,394.044,290.526,394.574z" />
											<path fill="#FFFFFF" d="M290.526,405.651l-4.218,5.272l-2.753-1.835c-0.566-0.379-1.331-0.225-1.707,0.341
										c-0.376,0.565-0.224,1.33,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.461l4.923-6.154
										c0.425-0.531,0.338-1.306-0.192-1.729C291.726,405.036,290.951,405.12,290.526,405.651z" />
											<path fill="#FFFFFF" d="M290.526,416.729l-4.218,5.272l-2.753-1.835c-0.566-0.378-1.331-0.224-1.707,0.341
										c-0.376,0.566-0.224,1.329,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.206,0.683,0.206c0.362,0,0.72-0.159,0.961-0.461
										l4.923-6.154c0.425-0.531,0.338-1.306-0.192-1.73C291.726,416.113,290.951,416.198,290.526,416.729z" />
											<rect x="296.41" y="419.959" fill="#FFFFFF" width="17.23" height="2.462" />
											<rect x="296.41" y="408.882" fill="#FFFFFF" width="17.23" height="2.461" />
											<rect x="296.41" y="397.805" fill="#FFFFFF" width="17.23" height="2.461" />
										</g>
									</svg>
								</span>
							</div>
							<div class="media-body media-middle">
								<h2 class="pmd-card-title-text typo-fill-secondary">In progress</h2>
							</div>
						</div>
						<table id="example-checkbox" class="table pmd-table table-hover table-striped display responsive nowrap">
							<thead>
								<th></th>
								<th></th>

							</thead>
							<tbody>
							<?php
							foreach($employeeTasks as $task){
							    $id = $task->taskId;
							    $statusPrivacy = $task->statusPrivacy;
                                $statusCompletion = $task->statusCompletion;
                                $statusAcceptance = $task->statusAcceptance;
                                $taskName = $task->taskName;
                                $description = $task->description;
                                $comment = $task->comment;
                                $expectedStartDate = $task->expectedStartDate;
                                $expectedEndDate = $task->expectedEndDate;
                                if ($statusCompletion == "S" && $statusPrivacy == 'G' && $statusAcceptance == 'A'){
                                    echo "<tr>";
                                    echo "<td>$taskName</td>";
                                    echo "<td class=\"td-actions text-right\">
										<button class=\"btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary btn-xs\" type=\"button\" style=\"display: block;\" data-target=\"#info-open-task-modal\" data-toggle=\"modal\"><i class=\"material-icons pmd-xs\">info</i></button>
                                    	</td>
                                    	</tr>";
                                }
							}
							?>

							</tbody>
						</table>
						<span class="btn-loader loader hidden">Loading...</span>
					</div>
				</div>


				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="pmd-card pmd-z-depth todos">
						<div class="pmd-card-title">
							<div class="media-left">
								<span class="service-icon img-circle bg-fill-feedback">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="31.999px" height="30.769px" viewBox="281.642 394.113 31.999 30.769" enable-background="new 281.642 394.113 31.999 30.769"
									 xml:space="preserve">
										<g>
											<path fill="#FFFFFF" d="M290.526,394.574l-4.218,5.273l-2.753-1.835c-0.567-0.379-1.331-0.224-1.707,0.341
										s-0.224,1.331,0.341,1.707l3.692,2.461c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.462l4.923-6.154
										c0.425-0.53,0.338-1.306-0.192-1.729C291.726,393.958,290.951,394.044,290.526,394.574z" />
											<path fill="#FFFFFF" d="M290.526,405.651l-4.218,5.272l-2.753-1.835c-0.566-0.379-1.331-0.225-1.707,0.341
										c-0.376,0.565-0.224,1.33,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.207,0.683,0.207c0.362,0,0.72-0.16,0.961-0.461l4.923-6.154
										c0.425-0.531,0.338-1.306-0.192-1.729C291.726,405.036,290.951,405.12,290.526,405.651z" />
											<path fill="#FFFFFF" d="M290.526,416.729l-4.218,5.272l-2.753-1.835c-0.566-0.378-1.331-0.224-1.707,0.341
										c-0.376,0.566-0.224,1.329,0.341,1.707l3.692,2.462c0.209,0.139,0.447,0.206,0.683,0.206c0.362,0,0.72-0.159,0.961-0.461
										l4.923-6.154c0.425-0.531,0.338-1.306-0.192-1.73C291.726,416.113,290.951,416.198,290.526,416.729z" />
											<rect x="296.41" y="419.959" fill="#FFFFFF" width="17.23" height="2.462" />
											<rect x="296.41" y="408.882" fill="#FFFFFF" width="17.23" height="2.461" />
											<rect x="296.41" y="397.805" fill="#FFFFFF" width="17.23" height="2.461" />
										</g>
									</svg>
								</span>
							</div>
							<div class="media-body media-middle">
								<h2 class="pmd-card-title-text typo-fill-secondary">Done</h2>
							</div>
						</div>
						<table id="example-checkbox" class="table pmd-table table-hover table-striped display responsive nowrap">
							<thead>
								<th></th>
								<th></th>

							</thead>
							<tbody>
							<?php
							foreach($employeeTasks as $task){
							    $id = $task->taskId;
							    $statusPrivacy = $task->statusPrivacy;
                                $statusCompletion = $task->statusCompletion;
                                $statusAcceptance = $task->statusAcceptance;
                                $taskName = $task->taskName;
                                $description = $task->description;
                                $comment = $task->comment;
                                $expectedStartDate = $task->expectedStartDate;
                                $expectedEndDate = $task->expectedEndDate;
                                if ($statusCompletion == "D" && $statusPrivacy == 'G' && $statusAcceptance == 'A'){
                                    echo "<tr>";
                                    echo "<td>$taskName</td>";
                                    echo "<td class=\"td-actions text-right\">
										<button class=\"btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary btn-xs\" type=\"button\" style=\"display: block;\" data-target=\"#info-open-task-modal\" data-toggle=\"modal\"><i class=\"material-icons pmd-xs\">info</i></button>
                                    	</td>
                                    	</tr>";
                                }
							}
							?>

							</tbody>
						</table>
						<span class="btn-loader loader hidden">Loading...</span>
					</div>
				</div>




			</div>
		</div>
		<!-- tab end -->

	</div>
	<!-- content area end -->




	<div tabindex="-1" class="modal fade" id="give-task-modal" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bordered">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h2 class="pmd-card-title-text">Give task</h2>
				</div>
				
				<div class="modal-body">
				<form class="form-horizontal" name="giveTaskForm" id="giveTaskForm" method="post" action="<?php echo site_url($controller.'/giveTask/'.$employeeId); ?>">
					<div class="form-group pmd-textfield pmd-textfield-floating-label"> 
						<!-- class="mat-input form-control" -->
						<label for="name" class="control-label" <?php if (isset($nameInvalid) && $nameInvalid == 1) { echo "style='color: red'"; } ?> >Task name</label>
						<?php
							if (!isset($nameInvalid)) {
								echo "<input type='text' id='name' name='name' class='form-control' aria-describedby='nameWarningBlock'>";
							}
							else if ($nameInvalid == 1) {
								echo "<input type='text' id='name' name='name' class='form-control' aria-describedby='nameWarningBlock'>";
								echo "<small id='nameWarningBlock' class='form-text' style='color:red'> The task name field cannot be empty! </small>";
							}
							else {
								echo "<input type='text' id='name' name='name' class='form-control' aria-describedby='nameWarningBlock' value='" . $name . "'/>" ;
							}
						?>
						
					</div>
					
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="startDate" class="control-label" <?php if (isset($startDateInvalid) && $startDateInvalid == 1) { echo "style='color: red'"; } ?> >Expected start date</label>
						
						<?php
							if (!isset($startDateInvalid)) {
								echo "<input type='text' id='datepicker-left-header' name='startDate' class='form-control' aria-describedby='startDateWarningBlock' />"; 
							}
							else if ($startDateInvalid == 1) {
								echo "<input type='text' id='datepicker-left-header' name='startDate' class='form-control' aria-describedby='startDateWarningBlock' />";
								echo "<small id='startDateWarningBlock' class='form-text' style='color:red'> This field must contain a valid date (or it can be left empty)! </small>";
							}
							else {
								echo "<input type='text' id='datepicker-left-header' name='startDate' class='form-control' aria-describedby='startDateWarningBlock' value='" . $startDate . "'/>";
							}
						?>
						
					</div>		
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
					
						<label for="endDate" class="control-label" <?php if (isset($endDateInvalid) && $endDateInvalid == 1) { echo "style='color: red'"; } ?> >Expected end date</label>
						
						<?php
							if (!isset($endDateInvalid)) {
								echo "<input type='text' id='datepicker-left-header' name='endDate' class='form-control' aria-describedby='endDateWarningBlock' />"; 
							}
							else if ($endDateInvalid == 1) {
								echo "<input type='text' id='datepicker-left-header' name='endDate' class='form-control' aria-describedby='endDateWarningBlock' />";
								echo "<small id='endDateWarningBlock' class='form-text' style='color:red'> This field must contain a valid date (or it can be left empty)! </small>";
							}
							else {
								echo "<input type='text' id='datepicker-left-header' name='endDate' class='form-control' aria-describedby='startDateWarningBlock' value='" . $endDate . "'/>";
							}
						?>
						
					</div>	

					<div class="pmd-card pmd-z-depth pmd-card-custom-view">
						<div class="pmd-card-body">
							<label for="task-status" class="control-label">Select a task status</label>
							<!-- Simple radio with label -->
							<div class="radio">
								<label class="pmd-radio pmd-radio-ripple-effect">
									<input type="radio" name="taskStatusRadio" id="clickOpen" value="open" checked="">
									<span for="clickOpen">Open</span> </label>
							</div>
							<!-- Radio button checked -->
							<div class="radio">
								<label class="pmd-radio pmd-radio-ripple-effect">
									<input type="radio" name="taskStatusRadio" id="clickInProgress" value="inProgress">
									<span for="clickInProgress">In progress</span> </label>
							</div>
							<!-- Radio button disable -->
							<div class="radio">
								<label class="pmd-radio pmd-radio-ripple-effect">
									<input type="radio" name="taskStatusRadio" id="clickDone" value="done">
									<span for="clickDone">Done</span> </label>
							</div>
						</div>
					</div>
					
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label class="control-label">Description</label>
						<textarea class="form-control" name="description"><?php if (isset($descriptionData)) { echo $descriptionData; }?></textarea>
					</div>
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label class="control-label">Any other comment</label>
						<textarea class="form-control" name="comment"><?php if (isset($commentData)) { echo $commentData; }?></textarea>
							
					</div>
				</form>
			</div>
				
				<div class="pmd-modal-action text-right">
				<input type="hidden" name="employeeId" value="<?php echo $employeeId; ?>" />
				<input type="submit" form="giveTaskForm" class="btn pmd-ripple-effect btn-primary" value="Give task" />
				<button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
			</div>
			</div>
		</div>
	</div>

	<div tabindex="-1" class="modal fade" id="info-open-task-modal" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bordered">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h2 class="pmd-card-title-text">About task</h2>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label for="first-name">Task name</label>
							<input type="text" class="mat-input form-control" id="name" value="Task name" disabled="">
							<span class="help-text">Input is required!</span>
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label for="start-date" class="control-label">Expected start date</label>
							<input type="text" id="datepicker-left-header" class="form-control" value="some date" disabled="">
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label for="end-date" class="control-label">Expected end date</label>
							<input type="text" id="datetimepicker-default" class="form-control" value="some date" disabled="">
						</div>

						<div class="pmd-card pmd-z-depth pmd-card-custom-view">
							<div class="pmd-card-body">
								<label for="task-status" class="control-label">Select a task status</label>
								<!-- Simple radio with label -->
								<div class="radio">
									<label class="pmd-radio pmd-radio-ripple-effect">
										<input type="radio" name="optionsRadios" id="click4" value="open" disabled="" checked="">
										<span for="click4">Open</span>
									</label>
								</div>
								<!-- Radio button checked -->
								<div class="radio">
									<label class="pmd-radio pmd-radio-ripple-effect">
										<input type="radio" name="optionsRadios" id="click5" value="in-progress" disabled="">
										<span for="click5">In progress</span>
									</label>
								</div>
								<!-- Radio button disable -->
								<div class="radio">
									<label class="pmd-radio pmd-radio-ripple-effect">
										<input type="radio" name="optionsRadios" id="optionsRadios3" value="done" disabled="">
										<span for="optionsRadios3">Done</span>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label class="control-label">Description</label>
							<textarea required class="form-control" disabled="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde dolores cupiditate vitae. consectetur adipisicing elit.</textarea>
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label class="control-label">Any other comment</label>
							<textarea required class="form-control" disabled="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde dolores cupiditate vitae. consectetur adipisicing elit.</textarea>
						</div>
					</form>
				</div>
				<div class="pmd-modal-action">
					<button data-dismiss="modal" class="btn pmd-ripple-effect btn-primary" type="button">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div tabindex="-1" class="modal fade" id="info-in-progress-task-modal" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bordered">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h2 class="pmd-card-title-text">About task</h2>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label for="first-name">Task name</label>
							<input type="text" class="mat-input form-control" id="name" value="Task name" disabled="">
							<span class="help-text">Input is required!</span>
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label for="start-date" class="control-label">Expected start date</label>
							<input type="text" id="datepicker-left-header" class="form-control" value="some date" disabled="">
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label for="end-date" class="control-label">Expected end date</label>
							<input type="text" id="datetimepicker-default" class="form-control" value="some date" disabled="">
						</div>

						<div class="pmd-card pmd-z-depth pmd-card-custom-view">
							<div class="pmd-card-body">
								<label for="task-status" class="control-label">Select a task status</label>
								<!-- Simple radio with label -->
								<div class="radio">
									<label class="pmd-radio pmd-radio-ripple-effect">
										<input type="radio" name="optionsRadios" id="click4" value="open" disabled="" checked="">
										<span for="click4">Open</span>
									</label>
								</div>
								<!-- Radio button checked -->
								<div class="radio">
									<label class="pmd-radio pmd-radio-ripple-effect">
										<input type="radio" name="optionsRadios" id="click5" value="in-progress" disabled="">
										<span for="click5">In progress</span>
									</label>
								</div>
								<!-- Radio button disable -->
								<div class="radio">
									<label class="pmd-radio pmd-radio-ripple-effect">
										<input type="radio" name="optionsRadios" id="optionsRadios3" value="done" disabled="">
										<span for="optionsRadios3">Done</span>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label class="control-label">Description</label>
							<textarea required class="form-control" disabled="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde dolores cupiditate vitae. consectetur adipisicing elit.</textarea>
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label class="control-label">Any other comment</label>
							<textarea required class="form-control" disabled="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde dolores cupiditate vitae. consectetur adipisicing elit.</textarea>
						</div>
					</form>
				</div>
				<div class="pmd-modal-action">
					<button data-dismiss="modal" class="btn pmd-ripple-effect btn-primary" type="button">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div tabindex="-1" class="modal fade" id="info-done-task-modal" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bordered">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h2 class="pmd-card-title-text">About task</h2>
				</div>
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label for="first-name">Task name</label>
							<input type="text" class="mat-input form-control" id="name" value="Task name" disabled="">
							<span class="help-text">Input is required!</span>
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label for="start-date" class="control-label">Expected start date</label>
							<input type="text" id="datepicker-left-header" class="form-control" value="some date" disabled="">
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label for="end-date" class="control-label">Expected end date</label>
							<input type="text" id="datetimepicker-default" class="form-control" value="some date" disabled="">
						</div>

						<div class="pmd-card pmd-z-depth pmd-card-custom-view">
							<div class="pmd-card-body">
								<label for="task-status" class="control-label">Select a task status</label>
								<!-- Simple radio with label -->
								<div class="radio">
									<label class="pmd-radio pmd-radio-ripple-effect">
										<input type="radio" name="optionsRadios" id="click4" value="open" disabled="" checked="">
										<span for="click4">Open</span>
									</label>
								</div>
								<!-- Radio button checked -->
								<div class="radio">
									<label class="pmd-radio pmd-radio-ripple-effect">
										<input type="radio" name="optionsRadios" id="click5" value="in-progress" disabled="">
										<span for="click5">In progress</span>
									</label>
								</div>
								<!-- Radio button disable -->
								<div class="radio">
									<label class="pmd-radio pmd-radio-ripple-effect">
										<input type="radio" name="optionsRadios" id="optionsRadios3" value="done" disabled="">
										<span for="optionsRadios3">Done</span>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label class="control-label">Description</label>
							<textarea required class="form-control" disabled="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde dolores cupiditate vitae. consectetur adipisicing elit.</textarea>
						</div>
						<div class="form-group pmd-textfield pmd-textfield-floating-label">
							<label class="control-label">Any other comment</label>
							<textarea required class="form-control" disabled="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde dolores cupiditate vitae. consectetur adipisicing elit.</textarea>
						</div>
					</form>
				</div>
				<div class="pmd-modal-action">
					<button data-dismiss="modal" class="btn pmd-ripple-effect btn-primary" type="button">Close</button>
				</div>
			</div>
		</div>
	</div>
