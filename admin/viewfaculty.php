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
	$id=$_GET['id'];
	$query="SELECT *FROM teachers_feedback";
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
	while($row=mysqli_fetch_array($data)){
		if($row['teacher_id']==$id){
			if($n==0){
			echo "<b>Name of the teacher:</b>";
			echo $row['teacher_name'].'</br></br>';
			echo "Score obtained</br>";
			}
			$clarity=$clarity+$row['teacher_clarity'];
			$easy=$easy+$row['teacher_understand'];
			$usefull=$usefull+$row['teacher_relevent'];
			$questions=$questions+$row['teacher_answer'];
			$coverage=$coverage+$row['teacher_ontime'];
			$explanation=$explanation+$row['teacher_example'];
			$guidence=$guidence+$row['teacher_help'];
			$communication=$communication+$row['teacher_communication'];
			$control=$control+$row['teacher_control'];
			$overol=$overol+$row['teacher_overoll'];
			$n++;
		}
	}
	echo '<table border=0>';
	echo '<tr><th><font color="red">Catagory<font color="red"></td><th><font color="red">Score obtained</font color="red"></td><th><font color="red">Score obtained in%</font color="red"></th></tr>';
	echo '<tr><td>Clarity on explaining subject</td><td>:'.$clarity.'</td><td>:'.($clarity/($n*'5'))*'100'.'%</td></tr>';
	echo '<tr><td>Subject is easy tounderstand</td><td>:'.$easy.'</td><td>:'.($easy/($n*'5'))*'100'.'%</td></tr>';
	echo '<tr><td>Content quality is relevent and usefull</td><td>:'.$usefull.'</td><td>:'.($usefull/($n*'5'))*'100'.'%</td></tr>';
	echo '<tr><td>Faculty answering questions</td><td>:'.$questions.'</td><td>:'.($questions/($n*'5'))*'100'.'%</td></tr>';
	echo '<tr><td>Coverage of topic on time</td><td>:'.$coverage.'</td><td>:'.($coverage/($n*'5'))*'100'.'%</td></tr>';
	echo '<tr><td>Concept is with examples<td>:'.$explanation.'</td><td>:'.($explanation/($n*'5'))*'100'.'%</td></tr>';
	echo '<tr><td>Guidence for preparation of seminar<td>:'.$guidence.'</td><td>:'.($guidence/($n*'5'))*'100'.'%</td></tr>';
	echo '<tr><td>Communication skill of the faculty<td>:'.$communication.'</td><td>:'.($communication/($n*'5'))*'100'.'%</td></tr>';
	echo '<tr><td>Control of the faculty over the class room<td>:'.$control.'</td><td>:'.($control/($n*'5'))*'100'.'%</td></tr>';
	echo '<tr><td>Overoll perfomance of the faculty<td>:'.$overol.'</td><td>:'.($overol/($n*'5'))*'100'.'%</td></tr>';
	echo '</table>';
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
