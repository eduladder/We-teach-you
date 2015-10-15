<?php
include("authorize.php");
include("include/head.php");
include("include/nav.php");
function surveyForm(){
	echo '<fieldset>';
    echo '<legend><b>Start the survey</b></legend>';
	echo '<form name="usn" action="index.php" method="post">';
	echo 'Enter your usn no here:<input type="text" name="usn">';
	echo '<input type="submit" name="submit" value="Take me to the survey">';
	echo '</form>';
	echo '</fieldset>';
	}
//Start the session
?>
<div class="wrapper col2">
  <div id="gallery">
  <img width=360 src="logos/teachers.jpg"src="logos/student.png">
  </div>
 </div>
<div class="wrapper col4">
  <div id="container">
    <div id="content">
<?php
require_once("../config.php");
$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$query = "SELECT * FROM `teachers_name`";
$data=mysqli_query($connection,$query);
//Verifying the actions
@$action=$_GET['action'];
if($action=='ok'){
	echo "</br><font color='green'>You are sucssessfully updatted the list of the teachers</font></br>";
}
if($action=='delete'){
	$id=$_GET['id'];
	if(!empty($id)){
		$query="DELETE FROM teachers_name WHERE id=$id";
		$result=mysqli_query($connection,$query);
		if($result){
			header("location:index.php?action=ok");
		}
	}
}
//Showing the list
$i=0;
echo '<table border=1>';
while($row=mysqli_fetch_array($data)){
	if($i==0){
	echo '<tr><th><font color="red">Name of the teacher</font></th><th><font color="red">Action has to be done</th></font></tr>';
	}
	echo '<tr><td>'.$row['teacher_name'].'</td><td>';
	echo '<a href="index.php?action=delete&id='.$row['id'].'">delete</a></br>';
	echo '</td></tr>';
	$i++;
}
echo '</table>';
//Inserting query into the database.
if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$screenshot=$_FILES['pic']['name'];
		$screenshot_type=$_FILES['pic']['type'];
		$screenshot_size=$_FILES['pic']['size'];
		if(!empty($name)&&!empty($screenshot)){
		if((($screenshot_type=='image/jpeg')||($screenshot_type=='image/pjpeg')||($screenshot_type=='image/png')||($screenshot_type=='image/gif'))&&($screenshot_size>0)){
		if($_FILES['pic']['error']==0){
			//move files
			$target="images/".$screenshot;
				if(move_uploaded_file($_FILES['pic']['tmp_name'],$target)){
					$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
						$query="INSERT INTO teachers_name VALUES(0,'$name','$screenshot')";
						$result=mysqli_query($connection,$query)
							or die("Cannot put the data to the mesh bench");
						if($result){
								header('Location:index.php');
						}
					mysqli_close($connection);
			}
			}
		else{
			echo 'A problem occured during file uploading pls try again.';
		}
		}
	else{
		$error='The image must be less than 35 kb and one of this type jpeg,pjpeg,gif,png';
		echo '<font size=2><h1>'.$error.'</h1></font>';
		}
	}
	@unlink($_FILES['pic']['tmp_name']);
$error = 'Plese enter all of the field for entering your mesh';
echo '<font size=2><h1>'.$error.'</h1></font>';
//Old
//Adding datas to the database
}
?>
<form enctype="multipart/form-data" method="post" action="index.php">
<input type="hidden" name="MAX_FILE_SIZE" value="327600"/>
<th align="center">
<h2>Create teachers.</h2>
<label for ="name"> Name:</label>
<input type="name" id="name" name="name"/></br></br>
Choose a picture</b>
<label for ="file"> File:</label>
<input type="file" id="pic" name="pic"/></br></br>
<input type="submit" value="add" name="submit"/>
</form>
	</div>
<?php
	include("include/rightside.php");
?>
    <div class="clear"></div>
  </div>
</div>
<?php
include("include/footer.php");
?>