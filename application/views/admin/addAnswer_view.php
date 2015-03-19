<?php

// show flashdata set by the controller.
echo $this->session->flashdata('success');


//standard codeIgniter form using the form helper class.

echo form_open();

    // check if first question, if so echo correct answer, if not echo incorrect answer + the question
    if($first_question) {
        echo '<p>This will be the <strong>CORRECT</strong> answer for the question: <strong>'.$question.'</strong></p>';
    } else {
        echo '<p>This will be an <strong>INCORRECT</strong> answer for the question: '.$question.'</p>';
    }

	$input = array(
		'name' => 'answer'
	);
	echo form_input($input);
	
	$button = array(
		'name' => 'add_answer',
		'value' => 'Add Answer'
	);
	echo form_submit($button);

echo form_close();



