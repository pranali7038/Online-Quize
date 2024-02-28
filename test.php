<?php include 'db.php';
if(isset($_POST['submit'])){
	$question_number=$_POST['question_number'];
	$question_text=$_POST['question_text'];
	$correct_choice=$_POST['correct_choice'];
	
	$choice=array();
	$choice[1]=$_POST['choice1'];
	$choice[2]=$_POST['choice2'];
	$choice[3]=$_POST['choice3'];
	$choice[4]=$_POST['choice4'];
	$choice[5]=$_POST['choice5'];
	
	$query="INSERT INTO questions(";
	$query.="question_number,question_text)";
	$query.="VALUES (";
	$query.=" '{$question_number}','{$question_text}' ";
	$query.=")";
	
	$result=mysqli_query($connection,$query);
	if($result){
		foreach($choice as $option=>$value){
			if($value!=""){
				if($correct_choice==$option){
					$is_correct=1;
				}else{
					$is_correct=0;
				}
				
				
				$query="INSERT INTO options (";
				$query.="question_number,is_correct,coption)";
				$query.="VALUES (";
				$query.="'{$question_number}','{$is_correct}','{$value}')";
				
				$insert_row=mysqli_query($connection,$query);
				
				if($insert_row){
					continue;
				}else{
					die("2nd Query for Choices could not be executaed");
				}
			}
		}
		$message="Question has been added successfully!";
	}
}

		$query="SELECT * FROM questions";
		$questions=mysqli_query($connection,$query);
		$total=mysqli_num_rows($questions);
		$next=$total+1;
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Test</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
	<header>
		<div class="container">
			<p>PHP QUIZE</p>
		</div>	
	</header>
	<div class="container">
	  
	  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="margin-top:20px; background-color:gray; border:1px solid black">Click Here!</button>
	  
	  <div class="modal fade" id="myModal" style="display:none;">
	    <div class="modal-dialog modal-md">
		  
		  <div class="modal-content">
            <div class="modal-header" style="background-color:black;">
			  <button type="button" class="close" data-dismiss="modal" style="background-color:white;">X</button>
			  <h5 class="modal-title" style="color:white;"><b>Add Question here<b></h5>
		   </div>
		    <div class="modal-body" style="background-color:black; color:white;">
			<form>
			
		<form method="POST" action="add.php">
			<p>
				<label>Question Number:</label>
				<input style="color:black;" type="number"  name="question_number" value="<?php echo $next; ?>">
			</p>
			<p>
				<label>Question Text:</label>
				<input style="color:black;" type="text" name="question_text">
			</p>
			<p>
				<label>Choice 1:</label>
				<input style="color:black;" type="text" name="choice1">
			</p>
			<p>
				<label>Choice 2:</label>
				<input  style="color:black;" type="text" name="choice2">
			</p>
			<p>
				<label>Choice 3:</label>
				<input style="color:black;" type="text" name="choice3">
			</p>
			<p>
				<label>Choice 4:</label>
				<input style="color:black;" type="text" name="choice4">
			</p>
			<p>
				<label>Choice 5:</label>
				<input style="color:black;" type="text" name="choice5">
			</p>
			<p>
				<label>Correct Choice</label>
				<input style="color:black;" type="number" name="correct_choice">
			</p>
			<input style="color:black;" type="submit" name="submit" value="submit">
		</form>
	</div>

             <div class="modal-footer" style="background-color:black;color:white">
               <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
             </div>			 
		  </div>
		</div>
	  </div>
	</div>

</body>
</html>