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
<div class="wrapper col2">
  <div id="gallery">
  <img width=360 src="logos/teachers.jpg"src="logos/student.png">
  </div>
 </div>
<div class="wrapper col4">
  <div id="container">
    <div id="content">
<?php
session_start();
if(isset($_POST['usn'])){
	$usn=$_POST['usn'];
	if(!empty($usn)){
	$_SESSION['usn']=$_POST['usn'];
	}else{
		echo '<font color="red">Plese provide your usn</font>';
	}
}
if(isset($_SESSION['usn'])){
	require_once("config.php");
	//Showing the teachers list
	$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$query = "SELECT * FROM teachers_section";
	$data=mysqli_query($connection,$query);
	echo '<fieldset>';
	echo 'You are logged in as';
	echo '&nbsp'.$_SESSION['usn'].'&nbsp;&nbsp;&nbsp;&nbsp;I am not this one &nbsp;';
	echo "<a href='logout.php'>Logout</a>";
	echo '<table>';
	echo '<tr><th>Select your section.</th></tr>';
	while($row=mysqli_fetch_array($data)){
		echo '<tr><td>';
		echo '</br><a href="viewsection.php?id='.$row['id'].'">'.$row['teacher_section'].'</a>';
		echo '</td></tr>';
	}
	echo '</table>';
	echo '</fieldset>';
}else{
	echo surveyForm();
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



