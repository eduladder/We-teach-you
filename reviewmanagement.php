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
function marks(){
		echo "<option value=''>Drop down</option>";
		echo "<option value='1'>Poor</option>";
		echo "<option value='2'>Fair</option>";
		echo "<option value='3'>Good</option>";
		echo "<option value='4'>Very good</option>";
		echo "<option value='5'>Excellent</option>";
		echo "<option value='6'>Not applicable</option>";
	echo '</select>';
}
session_start();
if(isset($_SESSION['usn'])){
	require_once("config.php");
	$id=$_GET['id'];
	echo '</br><a href="viewsection.php?id='.$id.'">Go back to the sections</a></br>';
	require_once("config.php");
	$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	//After submitting the form
	
		if(isset($_POST['submit'])){
			$usn=$_SESSION['usn'];
			$library=$_POST['library'];
			$canteen=$_POST['canteen'];
			$lab=$_POST['lab'];
			$infra=$_POST['infra'];
			$transport=$_POST['transport'];
			$toilet=$_POST['toilet'];
			if(!empty($library)&&!empty($canteen)&&!empty($lab)&&!empty($infra)&&!empty($transport)&&!empty($toilet)&&!empty($usn)){
				$query="SELECT *FROM student_management WHERE student_usn='$usn' ";
				$data=mysqli_query($connection,$query);
				if(mysqli_num_rows($data)==0){
					$query="INSERT INTO student_management VALUES(0,'$usn','$library','$canteen','$lab','$infra','$transport','$toilet')";
					$result=mysqli_query($connection,$query);
					if($result){
						echo "<font color='green'><h3>You are submitted the review</h3></font>";
					}else{
						echo "Cannot make a query";
					}					
				}else{
					echo "<font color='red'>You are already submitted the data</font>";
				}
			}else{
				echo"<font color='red'>Plese fill all the fields</font>";
			}
		}
	//Showing form for infrastucture reply
	echo '<form name="review" action="reviewmanagement.php?id='.$_GET['id'].'" method="POST">';
	echo 'You are logged in as';
	echo '&nbsp'.$_SESSION['usn'].'&nbsp;&nbsp;&nbsp;&nbsp;I am not this one &nbsp;';
	echo "<a href='logout.php'>Logout</a></br>";
	echo "*Plese be honest your openion will be treated as completley confidentel.";
	echo '</br><h3>Giving feed back to the management</h3>';
	echo '<table border=1>';
	echo "<tr><td>Library fecility:</td><td><select name='library'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Canteen facility:</td><td><select name='canteen'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Lab facility:</td><td><select name='lab'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Class room infrastucture:</td><td><select name='infra'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Transport facilities of the collage:</td><td><select name='transport'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Toilet facilities and maintance:</td><td><select name='toilet'>";
	marks();
	echo '</select></td></tr>';
	echo '<tr><td colspan=2 align="center"><input type="submit" value="submit" name="submit" value="submit"></td><td>';
	echo '</table>';
	echo '</form>';
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
