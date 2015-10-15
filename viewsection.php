<?php
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
<div class="wrapper col4">
  <div id="container">
    <div id="content">
<?php
session_start();
if(isset($_SESSION['usn'])){
	$id=$_GET['id'];
	require_once("config.php");
	//Showing the teachers list
	$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$query = "SELECT * FROM teachers_catagory";
	$data=mysqli_query($connection,$query);
	echo '<fieldset>';
	echo 'You are logged in as';
	echo '&nbsp'.$_SESSION['usn'].'&nbsp;&nbsp;&nbsp;&nbsp;I am not this one &nbsp;';
	echo "<a href='logout.php'>Logout</a>";
	echo '<table>';
	echo '<tr><h3>Click on a faculty to make review.</h3></tr>';
	while($row=mysqli_fetch_array($data)){
		if($row['section_id']==$id){
		echo '<tr><td>';
		echo '</br><a href="reviewfaculty.php?id='.$row['id'].'&sectionid='.$_GET['id'].'&teacherid='.$row['teacher_id'].'">'.$row['teacher_name'].'</a>';
		echo '</td></tr>';
		}
	}
	echo "<tr><td>";
	echo"<h3>Feed back to the collage management</h3>";
	echo '<a href="reviewmanagement.php?id='.$_GET['id'].'">Give feed back</a>';
	echo "</td></tr>";
	echo '</table>';
	echo '</fieldset>';
}else{
	echo "You dont have permission to access this page go back to the<a href='index.php'>Home</a>";
}
?>
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
