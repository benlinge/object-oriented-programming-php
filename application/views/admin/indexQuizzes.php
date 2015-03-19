<!DOCTYPE html>
<html>
<head>
<title>Quizzes View</title>
</head>
<body>


<?php

	// show flashdata set by the controller.
	echo $this->session->flashdata('success');
	
	// provide a link to the addQuestion page.
	echo '<div><a href="'.base_url('admin/quizzes/addQuiz/'.$topic_id).'">Add Quiz</a></div>';
	// make sure a quiz has been found.
	if ($quizzes) {	
		// loop and show the quiz name but wrap the name in a link
		foreach($quizzes as $quiz) { ?>
		<a href="<?php echo base_url(); ?>admin/questions/home/<?php echo $quiz['quiz_id']; ?>">
        <?php echo $quiz['quiz_name']; ?>
        </a>
		<br />
<?php } 
} else {
?>
<p>No quizzes found</p>
<?php
	}
?>

</body>
</html>
		

