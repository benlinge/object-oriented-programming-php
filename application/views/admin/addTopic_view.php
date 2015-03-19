<?php

// show falshdata set by the controller.
echo $this->session->flashdata('success');


//standard codeIgniter form using the form helper class.

echo form_open();
	
	// added validation feedback for this specific field
	echo form_error('topic_name','<div class="error">','</div>');
	$input = array(
		'name' => 'topic_name'
	);
	echo form_input($input);
	
	$button = array(
		'name' => 'add_topic',
		'value' => 'Add Topic'
	);
	echo form_submit($button);

echo form_close();



