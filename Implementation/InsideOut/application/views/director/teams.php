    <!--content area start-->
	<div id="content" class="pmd-content dashboard">
		<!--tab start-->
		<div class="container-fluid full-width-container">
			<div class="row">
				<div class="col-lg-12" style="margin-bottom: 20px">
					<i class="btn btn-success pmd-ripple-effect" data-target="#add-team-modal" data-toggle="modal" style="font-style:normal">Create team</i>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
                    <font color="red"><?php if (isset($message)) echo urldecode($message); ?> </font>
					<!-- responsive table example -->
					<div class="pmd-card pmd-z-depth pmd-card-custom-view">
						<table id="example" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Team name</th>
									<th>Manager</th>
									<th>Number of team members</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
                                    foreach($teams as $team) {
                                        $teamName = $team['teamName'];
                                        $managerId = null;
                                        $managerName = null;
                                        $managerSurname = null;
                                        if ($team['manager'] != null) {
                                            $managerId = $team['manager']->Id;
                                            $managerName = $team['manager']->name;
                                            $managerSurname = $team['manager']->surname;
                                        }
                                        $numOfWorkers = $team['numWorkers'];
                                        echo
                                        "<tr>
                                            <td><a href=\"".base_url()."index.php/Director/viewTeam/$teamName"."\">$teamName</a></td>";
                                        if (isset($managerId)) {
                                            echo "<td><a href=\"".base_url()."index.php/Director/viewEmployee/$managerId\">$managerName $managerSurname</a></td>";
                                        } else {
                                            echo "<td><font color=\"#4acc8e\">no manager</font></td>";
                                        }    
                                        echo    
                                            "<td>$numOfWorkers</td>
                                            <td class=\"pmd-table-row-action\" style=\"text-align: center\">
                                                <form method=\"post\" action=\"".base_url()."index.php/Director/deleteTeam\" name=\"deleteForm$teamName\">
                                                    <input type=\"hidden\" name=\"teamName\" value=\"$teamName\">
                                                    <button type=\"submit\" value=\" \" class=\"btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm\"
                                                        onclick=\"function() {document.deleteForm$teamName.submit();}\"> 
                                                        <i class=\"material-icons md-dark pmd-sm\">delete</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>";
                                    }
                                ?>					
							</tbody>
						</table>
					</div>
					<!-- responsive table end -->
				</div>
			</div>
		</div>
		<!-- tab end -->
	</div>
	<!-- content area end -->


	<!-- add team modal -->
	<div tabindex="-1" class="modal fade" id="add-team-modal" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="color:black;">×</button>
					<h2 class="pmd-card-title-text text-center">Create team</h2>
                </div>
                <form method="post" <?php echo "action=\"".base_url()."index.php/Director/createTeam/"."\" " ?> class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                            <label for="teamName">Team name</label>
                            <input type="text" class="mat-input form-control" required="required" name="teamName" value="">
                        </div>
                    </div>
                    <div class="pmd-modal-action text-center">
                        <input type="submit" value="Create" class="btn pmd-ripple-effect btn-success" type="button">
                    </div>
                </form>
			</div>
		</div>
	</div>