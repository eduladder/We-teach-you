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
	$query="SELECT *FROM teachers_overoll";
	$data=mysqli_query($connection,$query);
	$clarity=0;
	$easy=0;
	$usefull=0;
	$coverage=0;
	$questions=0;
	$explanation=0;
	$guidence=0;
	$communication=0;
	$control=0;
	$overol=0;
	$n=0;
	echo '<table>';
	echo '<tr><th><font color="red">Name</font color="red"> </th><th><font color="red">Clarity</font color="red"></th><th><font color="red">Understandable</font color="red"></th><th><font color="red">Relevent<font color="red"></th><th><font color="red">Answer</th><th><font color="red">Ontime</font color="red"></th><th><font color="red">Example</font color="red"></th><th><font color="red">Help</font color="red"></th><th><font color="red">Communication</font color="red"></th><th><font color="red">Control</font color="red"></th><th><font color="red">Overol</font color="red"></th></tr>';
	while($row=mysqli_fetch_array($data)){
		echo '<tr><td>'.$row['teacher_name'].'</td>';
		echo '<td>'.$row['teacher_clarity'].'</td>';
		echo '<td>'.$row['teacher_understand'].'</td>';
		echo '<td>'.$row['teacher_relevent'].'</td>';
		echo '<td>'.$row['teacher_answer'].'</td>';
		echo '<td>'.$row['teacher_ontime'].'</td>';
		echo '<td>'.$row['teacher_example'].'</td>';
		echo '<td>'.$row['teacher_help'].'</td>';
		echo '<td>'.$row['teacher_communication'].'</td>';
		echo '<td>'.$row['teacher_control'].'</td>';
		echo '<td>'.$row['teacher_overoll'].'</td>';
	}
	echo '</tr>';
	echo '</table>';
	mysqli_close($connection);
?>
	</div>
    <div class="clear"></div>
  </div>
</div>
<?php
include("include/footer.php");
?>
