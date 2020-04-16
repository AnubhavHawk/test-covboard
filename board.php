<?php
	if(!isset($_REQUEST['project_code']) && !isset($_SESSION['project_id']))
		die("access denied");

	include("includes/utility.php");
	include("includes/headers.php");
	include("includes/navbar.php");
	include("includes/db_connection.php");
	if(!isset($_SESSION['project_id']))
	{
		$l = "location:".baseurl()."/enter/".$_REQUEST['project_code'];
		header($l);
	}
	else
	{
		if($_SESSION['project_code'] != $_REQUEST['project_code'])
		{
			$l = "location:".baseurl()."/enter/".$_REQUEST['project_code'];
			header($l);
		}
		else
		{
			$sql = "SELECT p.project_name, p.project_description, p.project_deadline, p.is_completed, p.project_progress, u.user_name, p.project_img FROM project p INNER JOIN users u ON p.creater_id = u.user_id WHERE p.project_id = ".$_SESSION['project_id'];
			$result = $conn->query($sql);
			if($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$creater_name = $row['user_name'];
				$date = date_create($row['project_deadline']);
				$date = date_format($date,"d M Y");
				?>
				<div class="row ">
					<div class="col-12 p-5 project-info-container">
						<?php 
						if($row['is_completed'] == 1) 
						{
							?>
							<span class="completed">Already completed</span>
							<?php
						}
						else
						{
							?>
							<span class="deadline">Due: <?=$date?></span>
							<?php
						}
						?>
						<div class="row">
							<div class="col-md-4 text-center">
								<img src="<?=baseurl()?>/assets/img/project_images/project.jpg" class="img-fluid rounded shadow-lg " width="80%" />
							</div>
							<div class="col-md-8 mt-5">
								<h4><?=$row['project_name']?></h4>
								<p>
									<?=$row['project_description']?>
								</p>
								<p>Project Code: <code><?=$_REQUEST['project_code']?></code></p>
							</div>
						</div>
					</div>
					<div class="progress col-12">
					  <div class="progress-bar progress-bar-stripd bg-success text-dark" role="progressbar" style="width: <?=$row['project_progress']?>%;"><?=$row['project_progress']?>% completed</div>
					</div>

					<?php
						$sql = "SELECT t.task_name, t.is_private, t.task_description, t.task_id FROM task t INNER JOIN project_task_list p_t_l ON p_t_l.task_id = t.task_id WHERE p_t_l.project_id = ".$_SESSION['project_id'];
					?>
					<div class="col-12 mt-2 extra-light-bg">
						<div class="row">
							<!-- left sidebar for tasks starts -->
							<div class="col-sm-8 p-4">
								<!-- section showing directories and comments and tasks starts -->
								<nav class="mt-3">
								  <div class="nav nav-tabs" id="nav-tab" role="tablist">
								    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Project Tasks</a>
								    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Project comments</a>
								    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Directories</a>
								  </div>
								</nav>
								<div class="tab-content mt-3" id="nav-tabContent">
									<!-- tab container for tasks starts -->
								  	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									  	<h5 class="container text-center">
										Current project tasks
										</h5>
										<div class="task-container">
											<?php
											$task_array = array();
											$id_array = array();
											$result = $conn->query($sql);
												while($row = $result->fetch_assoc())
												{
													array_push($task_array, $row['task_name']);
													array_push($id_array, $row['task_id']);
													?>
													<a href="<?=baseurl()?>/task-login/<?=$row['task_id']?>"><kbd class="p-2" title="<?=$row['task_description']?>"><?=$row['task_name']?> <?php if($row['is_private'] == 1) echo "&#128274;"; ?></kbd></a>
													<?php
												}
											?>
											
										</div>
										<div class="container mt-4 text-center">
											<a href="<?=baseurl()?>/create-task.php" class="new-task-btn"><b>&#10010;</b> Create new task</a>
										</div>							  	
								  	</div>
									<!-- tab container for tasks ends -->
									
									<!-- tab container for comments starts -->

								  	<div class="tab-pane fade row p-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								  		<!-- person comment starts -->
								  		<div class="col-12">
								  			<img src="<?=baseurl()?>/assets/img/user_images/default.png" width="80px" height="80px">
								  			<b>user name</b> (<i>20 Jan 2020</i>)
								  			<p>
								  				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								  				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								  				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								  				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								  				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								  				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								  			</p>
								  		</div>
								  		<!-- person comment ends -->
								  	</div>
									<!-- tab container for comments ends -->

									<!-- tab container for directory starts -->

								  	<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...
								  	</div>
									<!-- tab container for directory ends -->
								</div>
								<!-- section showing directories and comments and tasks ends -->

								<!-- section for adding comment starts -->
								<div class="mt-5">
									<hr>
									<h5 class="mt-4">Add project comment</h5>
									<form action="<?=baseurl()?>/includes/add_comment.php">
										<textarea rows="5" class="form-control" name="comment" required></textarea>
										<input type="submit" name="submit" class="btn mt-1 btn-primary" value="Add comment">
									</form>
								</div>
								<!-- section for adding comment ends -->

							</div>
							<!-- left sidebar for tasks ends -->
								

							<!-- right sidebar for members -->
							<div class="col-sm-4 p-4 text-white member-section right-sidebar-color-2">
								<h5 class="text-center">Project members</h5>
								<?php
									$sql = "SELECT u.user_name, u.user_id FROM project_assign p_a INNER JOIN users u ON p_a.user_id = u.user_id INNER JOIN project p ON p.project_id = p_a.project_id WHERE p.project_id = ".$_SESSION['project_id'];
									$result = $conn->query($sql);
								?>
								<ul class="text-success ">
									<?php
										if($result->num_rows > 0)
										{
											while($row = $result->fetch_assoc())
											{
												?>
												<li>
													<div  class="btn btn-secondary btn-block">
													  <?=$row['user_name']?> <div class="badge assign-badge ml-4 badge-light" id="<?=$row["user_id"]; ?>" us_name="<?=$row['user_name']?>"  title="request person to do a particular task in project">Assign task &#10010;</div>
													</div>
												</li>
												<?php
											}
										}
										else
										{
											?>
											<li class="no-project text-center p-2">
												No Member available
											</li>
											<?php
										}
									?>
									<li class="text-center mt-5">
										Share link to make members join project
										<kbd class="no-project" style="font-size: 11px;"><?=baseurl()?>/join/<?=$_REQUEST['project_code']?></kbd>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div id="dataModal" class="modal fade">  
					<div class="modal-dialog">  
						<div class="modal-content">  
							<div class="modal-header">  
								<h6 class="modal-title" id="modal-title">Select task to assign</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>  

							</div>  
							<div class="modal-body" id="user_detail">  
								<form>
									<label>Task name</label>
									<select name="task_id" id="task_dropdown" class="form-control">
										<option value="">Please select a task</option>
										<?php
										for($i = 0; $i < count($task_array); $i++) {
											echo "<option value='$id_array[$i]'>$task_array[$i]</option>";
										}
										?>
									</select>
									<input type="submit" id="submit" name="submit" value="Assign" class="btn btn-primary mt-2">
								</form>
							</div>  
							<div class="modal-footer">  
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
							</div>  
						</div>  
					</div>  
				</div>
				<script>  
					$(document).ready(function(){  
						$('.assign-badge').click(function(){  
							var user_id = $(this).attr("id");  
							var user_name = $(this).attr("us_name");
							document.getElementById('modal-title').innerHTML += ' <b>'+user_name+'</b>';
							$('#dataModal').modal("show");  
							$('#submit').click(function(e){
								var task_id = $('#task_dropdown').children("option:selected").val();
								e.preventDefault();
						           $.ajax({  
						                url:"<?=baseurl()?>/includes/assign_task_db.php",  
						                method:"post",  
						                data:{user_id:user_id, task_id: task_id},  
						                success:function(data){  
						                     window.alert(data);
						                }  
						        });  
					      	});
						});   
					});  
				</script>
				<?php
			}
			
		}
	}
?>