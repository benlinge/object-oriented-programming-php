<?php
	// show flashdata set by the controller.
	echo $this->session->flashdata('success');
		//Form to update question
		echo form_open();//Form Opened
			$input = array(//array for inpit box properties
				'name' => 'choice',
				'placeholder' => 'Answer one'//placeholder so admin knows what to type
			);
			echo form_input($input);//Input box displayed with array elements
			$button = array(//array for button properties
				'name' => 'add_answer',
				'value' => 'Update Answer'//Text display on the button
			);
			echo form_submit($button);//Button displayed with array elements
		echo form_close();//Form Closed