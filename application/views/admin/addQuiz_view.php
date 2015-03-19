<?php

// show flashdata set by the controller.
	echo $this->session->flashdata('success');


//standard codeIgniter form using the form helper class.

echo form_open();

	// added validation feedback for this specific field(s)
	echo form_error('quiz_name','<div class="error">','</div>');
	echo form_error('short_desc','<div class="error">','</div>');

	$input = array(
		'name' => 'quiz_name'
	);
	//codeignter label
	echo form_label('quiz name', 'quiz_name').'<p>'.form_input($input).'</p>';
	
	$input = array(
		'name' => 'short_desc'
	);
	//standard html label
	echo '<label for="short_desc">Quiz Short Description</label><p>'.form_textarea($input).'</p>';
	
	$button = array(
		'name' => 'add_quiz',
		'value' => 'Add Quiz'
	);
	echo form_submit($button);

echo form_close();



