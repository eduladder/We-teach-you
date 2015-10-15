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
	$query="SELECT *FROM student_management";
	$data=mysqli_query($connection,$query);
	echo "Score obtained for infrastructure fecility";
	$library=0;
	$canteen=0;
	$lab=0;
	$classroom=0;
	$transport=0;
	$toilet=0;
	$n=0;
	while($row=mysqli_fetch_array($data)){
			$library=$library+$row['student_library'];
			$canteen=$canteen+$row['student_canteen'];
			$lab=$lab+$row['student_lab'];
			$classroom=$classroom+$row['student_classroom'];
			$transport=$transport+$row['student_transport'];
			$toilet=$toilet+$row['student_toilet'];
			$n++;
	}
echo '<table border=0>';
echo '<tr><th><font color="red">Catagory</font color="red"></th><th><font color="red">Score obtained</font color="red"></th><th><font color="red">Score in%</font color="red"></th></tr>';
echo '<tr><td>Library fecility</td><td>:'.$library.'</td><td>:'.($library/($n*'5'))*'100'.'%</td></tr>';
echo '<tr><td>Canteen fecility</td><td>:'.$canteen.'</td><td>:'.($canteen/($n*'5'))*'100'.'%</td></tr>';
echo '<tr><td>Lab fecility</td><td>:'.$lab.'</td><td>:'.($lab/($n*'5'))*'100'.'%</td></tr>';
echo '<tr><td>Class room infrastucture</td><td>:'.$classroom.'</td><td>:'.($classroom/($n*'5'))*'100'.'%</td></tr>';
echo '<tr><td>Transport fecility</td><td>:'.$transport.'</td><td>:'.($transport/($n*'5'))*'100'.'%</td></tr>';
echo '<tr><td>Toilet fecility</td><td>:'.$toilet.'</td><td>:'.($toilet/($n*'5'))*'100'.'%</td></tr>';
echo '</table>';
echo '</fieldset>';
mysqli_close($connection);
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
