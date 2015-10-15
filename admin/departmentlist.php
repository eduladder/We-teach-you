<?php
include("authorize.php");
include("include/head.php");
include("include/nav.php");
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
$query = "SELECT * FROM `teachers_department`";
$data=mysqli_query($connection,$query);
//Verifying the actions
@$action=$_GET['action'];
if($action=='ok'){
	echo "<font color='green'>You are sucssessfully updatted the list of the teachers</font></br>";
}
if($action=='delete'){
	$id=$_GET['id'];
	if(!empty($id)){
		$query="DELETE FROM teachers_department WHERE id=$id";
		$result=mysqli_query($connection,$query);
		if($result){
			header("location:departmentlist.php?action=ok");
		}
	}
}
//Showing the list
$i=0;
echo '<table border=1>';
echo '<tr><th colspan="2" align="center"><font color="red">Department list</font></th></tr>';
while($row=mysqli_fetch_array($data)){
	echo '<tr><td>';
	echo $row['teacher_department'];
	echo '</td><td>';
	echo '<a href="departmentlist.php?action=delete&id='.$row['id'].'">delete</a></br>';
	echo '</td></tr>';
	$i++;
}
echo '</table>';
//Inserting query into the database.
if(isset($_POST['submit'])){
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		if(!empty($name)){
			$query="INSERT INTO teachers_department VALUES(0,'$name')";
			$result=mysqli_query($connection,$query);
				if($result){
				header("location:departmentlist.php?action=ok");
				exit;
				}
			$name="";
		}else{
		echo "<font color='red'>Plese fill all the fields</font>";
	}
}
}
?>
<form name="create" action="<?php $_SERVER['PHP_SELF']?>" method="post">
<fieldset>
      <legend><b>Create departments</b></legend>
	Name of the department:<input type="text" name="name" value="<?php if(!empty($name)){echo $name;}else{echo "";}?>"></input>
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