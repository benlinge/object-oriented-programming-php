<!DOCTYPE html>
<html>
<head>
<title>Quizzes for <?php echo $topic->topic_name; ?></title>
</head>
<body>

<h1>Quizzes for <?php echo $topic->topic_name; ?></h1>
<?php
	// make sure a quiz has been found.
	if ($quizzes) {	
		// loop and show the quiz name but wrap the name in a link
		foreach($quizzes as $quiz) { ?>
        <a href="<?php echo base_url('quiz/take/'.$quiz['quiz_id']) ?>"><?php echo $quiz['quiz_name']; ?></a>
		<br />
<?php } 
} else {
?>
<p>No quizzes found for the <?php echo $topic->topic_name; ?> topic</p>
<?php
	}
?>

</body>
</html>


