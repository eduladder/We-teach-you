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
	echo '</select>';
}
session_start();
if(isset($_SESSION['usn'])){
require_once("config.php");
//Showing faculty details
$teacherid=$_GET['teacherid'];
$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$query="SELECT *FROM teachers_name WHERE id=$teacherid";
$data=mysqli_query($connection,$query);
$row=mysqli_fetch_array($data);
echo '<h3>'.$row['teacher_name'].'</h3>';
echo '<img src="admin/images/'.$row['photo'].'">';
//Dumping datas into the database
	$id=$_GET['id'];
	echo '</br><a href="viewsection.php?id='.$_GET['sectionid'].'">Go back to teachers list</a></br>';
	require_once("config.php");
	$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	//After submitting the form
	
		if(isset($_POST['submit'])){
			$name=$_POST['teachername'];
			$teacher_id=$_POST['teacherid'];
			$section_id=$_POST['sectionid'];
			$department_id=$_POST['departmentid'];
			$usn=$_SESSION['usn'];
			$clarity=$_POST['clarity'];
			$easy=$_POST['easy'];
			$usefull=$_POST['usefull'];
			$questions=$_POST['questions'];			
			$coverage=$_POST['coverage'];
			$explanation=$_POST['explanation'];
			$guidence=$_POST['guidence'];
			$communication=$_POST['communication'];
			$control=$_POST['control'];
			$overol=$_POST['overol'];
			if(!empty($name)&&!empty($clarity)&&!empty($easy)&&!empty($usefull)&&!empty($questions)&&!empty($coverage)&&!empty($explanation)&&!empty($guidence)&&!empty($communication)&&!empty($control)&&!empty($overol)){
				$query="SELECT *FROM teachers_feedback WHERE student_usn='$usn' AND teacher_id='$teacher_id'";
				$data=mysqli_query($connection,$query);
				if(mysqli_num_rows($data)==0){
					$query="INSERT INTO teachers_feedback VALUES(0,'$name','$teacher_id','$section_id','$department_id','$usn','$clarity','$easy','$usefull','$questions','$coverage','$explanation','$guidence','$communication','$control','$overol')";
					$result=mysqli_query($connection,$query);
					if($result){
					//Getting teacher id
						$query="SELECT *FROM teachers_feedback WHERE teacher_name='$name' AND student_usn='$usn'";
						$data=mysqli_query($connection,$query) or die("cannot connect to thedatabase");
						$row=mysqli_fetch_array($data);
						$teechid=$row['teacher_id'];
					//Dumping datas into overoll table
						$query="SELECT *FROM teachers_overoll WHERE teacher_id=$teechid";
						$data=mysqli_query($connection,$query);
						if(mysqli_num_rows($data)==0){
							//Dumping datas
							$query="INSERT INTO teachers_overoll VALUES(0,'$name','$teacher_id','$clarity','$easy','$usefull','$questions','$coverage','$explanation','$guidence','$communication','$control','$overol')";
							$data=mysqli_query($connection,$query);
						}else{
							$query="SELECT *FROM teachers_overoll WHERE teacher_id='$teechid'";
							$data=mysqli_query($connection,$query);
							$row=mysqli_fetch_array($data);
							//Adding everythign again
										$clarity1=$row['teacher_clarity'];
										$easy1=$row['teacher_understand'];
										$usefull1=$row['teacher_relevent'];
										$question1=$row['teacher_answer'];
										$coverage1=$row['teacher_ontime'];
										$explanation1=$row['teacher_example'];
										$guidence1=$row['teacher_help'];
										$communication1=$row['teacher_communication'];
										$control1=$row['teacher_control'];
										$overol1=$row['teacher_overoll'];
										echo $clarity1=$clarity+$clarity1;
										$easy1=$easy+$easy1;
										$usefull1=$usefull+$usefull;										
										$question1=$questions+$question1;
										$coverage1=$coverage+$coverage1;
										$explanation1=$explanation+$explanation1;
										$guidence1=$guidence+$guidence1;
										$communication1=$communication+$communication1;
										$control1=$control+$control1;
										$overol1=$overol+$overol1;
								$query1="UPDATE teachers_overoll SET teacher_clarity=$clarity1, teacher_understand=$easy1 ,teacher_relevent=$usefull1 ,teacher_answer=$question1 ,teacher_ontime=$coverage1 , teacher_example=$explanation1 ,teacher_help=$guidence1 ,teacher_communication=$communication1, teacher_control=$control1, teacher_overoll=$overol1 WHERE teacher_id=$teechid";
								$result2=mysqli_query($connection,$query1) or die("Cannot make a query");
								if($result2){
									echo 'Everything is fine';
								}else{
									echo 'Somthing went wrong';
								}
						}
						echo "<font color='green'><h3>You are submitted the review</h3></font>";
					}					
				}else{
					echo "<font color='red'>You are already submitted the data</font>";
				}
			}else{
				echo"<font color='red'>Plese fill all the fields</font>";
			}
		}
	//Showing the teachers and voting
	$connection=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$query = "SELECT * FROM teachers_catagory where id=$id";
	$data=mysqli_query($connection,$query);
	echo '<form name="review" action="reviewfaculty.php?id='.$_GET['id'].'&sectionid='.$_GET['sectionid'].'&teacherid='.$_GET['teacherid'].'" method="POST">';
	echo 'You are logged in as';
	echo '&nbsp'.$_SESSION['usn'].'&nbsp;&nbsp;&nbsp;&nbsp;I am not this one &nbsp;';
	echo "<a href='logout.php'>Logout</a>";
	$row=mysqli_fetch_array($data);
	echo "</br>*Plese be honest your openion will be treated as completley confidentel.";
	echo '<table border=1><tr><td>';
	echo "Clarity in explaining subject:</td><td><select name='clarity'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Subject explained was easy to understand:</td><td><select name='easy'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Content quality is relevent and usefull:</td><td><select name='usefull'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Faculty answers to your quries/Questions:</td><td><select name='questions'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Coverage of topic/Subject on time:</td><td><select name='coverage'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>The concepts were explained with examples:</td><td><select name='explanation'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Faculty guidence for preperation of seminar, confrence and exams:</td><td><select name='guidence'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Communicate effectivley:</td><td><select name='communication'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Control of the class room by the faculty:</td><td><select name='control'>";
	marks();
	echo '</select></td></tr>';
	echo "<tr><td>Overall satisfaction:</td><td><select name='overol'>";
	marks();
	echo '</select></td></tr>';
	echo '<input type="hidden" name="teachername" value='.$row['teacher_name'].'>';
	echo '<input type="hidden" name="sectionid" value='.$row['section_id'].'>';
	echo '<input type="hidden" name="teacherid" value='.$row['teacher_id'].'>';
	echo '<input type="hidden" name="departmentid" value='.$row['department_id'].'>';
	echo '<tr><td colspan=2 align="center"><input type="submit" value="submit" name="submit" value="submit"></td></tr>';
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

