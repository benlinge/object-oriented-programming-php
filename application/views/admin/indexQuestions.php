<!DOCTYPE html>
<html>
<head>
<title>Questions View</title>
</head>
<body>


<?php

	// show flashdata set by the controller.
	echo $this->session->flashdata('success');
	
	// provide a link to the addQuestion page.
	echo '<div><a href="'.base_url('admin/questions/addQuestion/'.$quiz_id).'">Add Question</a></div>';
	// make sure a topic has been found.
	if ($questions) {
		// loop and show the topic name but wrap the name in a link
		foreach($questions as $question) { ?>
            <a href="<?php echo base_url(); ?>admin/answers/home/<?php echo $question['question_id']; ?>">
                <?php echo $question['question']; ?>
            </a>
		    <br />
    <?php }
    } else {
?>
    <p>No questions found</p>
<?php
	}
?>

</body>
</html>
		
		
