<!DOCTYPE html>
<html>
<head>
<title>Questions View</title>
</head>
<body>


<?php

	// show flashdata set by the controller.
	echo $this->session->flashdata('success');
	
	// provide a link to the addAnswers page.
	echo '<div><a href="'.base_url('admin/answers/addAnswer/'.$question_id).'">Add Answer</a></div>';
	// make sure answers have been found.
	if($answers) {
        // legend to show correct answer
        echo '<div><strong>* = correct answer</strong></div>';
		// loop and show the answer name but wrap the name in a link
		foreach($answers as $answer) { ?>
            <?php
                if($answer['correct'] == 1) {
                    echo '<strong>*</strong> ';
                }
                echo htmlspecialchars($answer['answer']);
            ?>
		    <br />
        <?php }
    } else {
?>
    <p>No answers found</p>
<?php
	}
?>

</body>
</html>
		
		
