<?php session_start();
	   require_once 'settings/config.php';
    $db = DB();
    require_once 'settings/library.php';
    $app = new library;

	$id = $_SESSION['user'];
	$query = $db->prepare("SELECT * FROM users WHERE user_id=:id");
    $query->bindParam("id", $id, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    $email = $result->email;
    $name = $result->name;
 ?>
<?php include 'header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-sm-3" style="    background-color: #fff; padding: 0;">
				<ul class="list-group">
				  <li class="list-group-item">Profile</li>
				  <li class="list-group-item">Change password</li>
				  <li class="list-group-item">Professional Qualifications</li>
				  <li class="list-group-item">Language Proficiency</li>
				  <li class="list-group-item">Training and Workshop</li>
				  <li class="list-group-item">Referees</li>
				  <li class="list-group-item">Working Experience</li>
				  <li class="list-group-item">Academic Qualifications</li>
				  <li class="list-group-item">Other Attachments</li>
				  <li class="list-group-item">Applied Jobs</li>
				</ul>
			</div>
			<div class="col-sm-9 my-5">
			<form>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="inputEmail4">Name</label>
			      <input type="text" class="form-control"  placeholder="FirsName" value="<?= $name ?>">
			    </div>
			   <div class="form-group col-md-6">
			    <label for="inputAddress2">Email</label>
			    <input type="text" class="form-control" placeholder="Email" value="<?= $email ?>">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="inputAddress">Phone Number</label>
			    <input type="text" class="form-control" id="inputAddress" placeholder="">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="inputAddress">Date of Birth</label>
			    <input type="date" class="form-control" placeholder="Date of Birth">
			  </div>
			   <div class="form-group col-md-6">
			    <label for="inputAddress">Education Level</label>
			    <input type="text" class="form-control" id="inputAddress" placeholder="BSc">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="inputAddress2">Course</label>
			    <input type="text" class="form-control" id="inputAddress2" placeholder="Computer Science">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="inputAddress2">Street</label>
			    <input type="text" class="form-control" id="inputAddress2" placeholder="">
			  </div>
			    <div class="form-group col-md-6">
			      <label for="inputCity">City</label>
			      <input type="text" class="form-control" id="inputCity">
			    </div>
			    <div class="form-group col-md-6">
			    <label for="inputAddress2">Zip Code</label>
			    <input type="text" class="form-control" id="inputAddress2" placeholder="">
			  </div>
			    <div class="form-group col-md-6">
			      <label for="inputState">Country</label>
			      <select id="inputState" class="form-control">
			        <option selected>Choose...</option>
			        <option>...</option>
			      </select>
			    </div>
			  <div class="form-group col-md-12">
			    <label for="exampleFormControlTextarea1">About me</label>
			    	<textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
			  </div>
			  </div>
			  <button type="submit" class="btn btn-primary">Create CV</button>
			</form>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>