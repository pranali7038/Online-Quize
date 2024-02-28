<?php
include 'db.php';
$query="SELECT * FROM questions";
$total_questions=mysqli_num_rows(mysqli_query($connection,$query));
?>


<!DOCTYPE html>
<html>
<head>
	<title>Online Test</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<p>PHP QUIZE</p>
		</div>	
	</header>
	
	<div class="container">
		<h2>Test Your PHP knowledge!!</h2>
		<p>
			The test is not official, it's just a nice way to see how much you know, or don't know, about PHP.
			You will get 1 point for each correct answer.Time for each question is 1.5 min. At the end of the Quiz, your total score will be displayed.
		</p>
		<ul>
			<li><strong>Number of Questions:</strong><?php echo $total_questions; ?></li>
			<li><strong>Type:</strong>Multiple Choice</li>
			<li><strong>Estimated Time:</strong><?php echo $total_questions*1.5;?> min</li>
		</ul>
		<a href="question.php?n=1" class="start">Start Quize</a>
	</div>

</body>
</html>
