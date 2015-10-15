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
//Verifying the actions
@$action=$_GET['action'];
if($action=='ok'){
	echo "</br><font color='green'>You are sucssessfully updatted the list of the teachers</font></br>";
}
if($action=='delete'){
	$id=$_GET['id'];
	if(!empty($id)){
		$query="DELETE FROM teachers_catagory WHERE id=$id";
		$result=mysqli_query($connection,$query);
		if($result){
			header("location:sectionwisealotment.php?action=ok");
		}
	}
}
//Showing the list
$query = "SELECT * FROM `teachers_catagory`";
$data=mysqli_query($connection,$query);
$i=0;
echo '<table border=1>';
while($row=mysqli_fetch_array($data)){
	if($i==0){
	echo '<tr><th><font color="red">Name of the teacher<font color="red"></th><th><font color="red">Subject code of the teacher</font color="red"></th><th><font color="red">Section of the teacher.</font color="red"></td><th><font color="red">Remove the teacher.</font color="red"></th></tr>';
	}
	echo '<tr><td>';
	echo $row['teacher_name'];
	echo '</td><td>';
	echo $row['subject_code'];
	echo '</td><td>';
	echo $row['teacher_section'];
	echo '</td><td>';
	echo '<a href="sectionwisealotment.php?action=delete&id='.$row['id'].'">delete</a></br>';
	echo '</td></tr>';
	$i++;
}
echo '</table>';
//Inserting query into the database.
if(isset($_POST['submit'])){
	$teacher_id=$_POST['teacherid'];
	$department_id=$_POST['departmentid'];
	$section_id=$_POST['sectionid'];
	$subject_code=$_POST['subcode'];
//Reading databse to add name
	$query="SELECT *FROM teachers_name WHERE id=$teacher_id";
	$data=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($data);
	$teachername=$row['teacher_name'];
	$query="SELECT *FROM teachers_section WHERE id=$section_id";
	$data=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($data);
	$sectionname=$row['teacher_section'];
//Adding datas to the database
		if(!empty($teacher_id)&&!empty($section_id)&&!empty($subject_code)&&!empty($department_id)){
			$query="INSERT INTO teachers_catagory VALUES(0,'$subject_code','$section_id','$teacher_id','$department_id','$teachername','$sectionname')";
			$result=mysqli_query($connection,$query);
				if($result){
				header("location:sectionwisealotment.php?action=ok");
				exit;
				}
			$name="";
			$subcode="";
			$branch="";
		}else{
		echo "<font color='red'>Plese fill all the fields</font>";
	}
}
?>
<form name="create" action="<?php $_SERVER['PHP_SELF']?>" method="post">
<fieldset>
      <legend><b>Create teacher</b></legend>
	<!-- -----------------------------selecting name of the teacher----------------------------------- -->
</br></br>Select teacher name.</br></br>
<?php
		$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query="SELECT * FROM  teachers_name";
		$data=mysqli_query($connection,$query);
		echo '<select name="teacherid">';
		echo "<option value=''>Select from this list</option>";
		while($row=mysqli_fetch_array($data)){
		$value=$row['id'];
		echo "<option value='$value'>".$row['teacher_name']."</option>";
		}
		echo '</select>';
		mysqli_close($connection);
?>
	</br></br>Code of the subject:<input type="text" name="subcode" value="<?php if(!empty($subcode)){echo $subcode;}else{echo "";}?>"></input>
<!-- -----------------------------selecting a section for the teacher----------------------------------- -->
</br></br>Select a section.</br></br>
<?php
		$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query="SELECT * FROM  teachers_section";
		$data=mysqli_query($connection,$query);
		echo '<select name="sectionid">';
		echo "<option value=''>Select from this list</option>";
		while($row=mysqli_fetch_array($data)){
		$value=$row['id'];
		echo "<option value='$value'>".$row['teacher_section']."</option>";
		}
		echo '</select>';
		mysqli_close($connection);
?>
</br></br>Select a department.</br></br>
<?php
		$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		$query="SELECT * FROM  teachers_department";
		$data=mysqli_query($connection,$query);
		echo '<select name="departmentid">';
		echo "<option value=''>Select from this list</option>";
		while($row=mysqli_fetch_array($data)){
		$value=$row['id'];
		echo "<option value='$value'>".$row['teacher_department']."</option>";
		}
		echo '</select>';
		mysqli_close($connection);
?>
</br></br><input type="submit" name="submit" value="create">
</fieldset>
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