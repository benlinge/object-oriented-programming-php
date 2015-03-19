<?php

// show flashdata set by the controller.
echo $this->session->flashdata('success');


//standard codeIgniter form using the form helper class.

echo form_open();

	$input = array(
		'name' => 'question'
	);
	echo form_input($input);
	
	$button = array(
		'name' => 'add_question',
		'value' => 'Add Question'
	);
	echo form_submit($button);

echo form_close();



