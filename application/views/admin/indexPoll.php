<?php
	// show flashdata set by the controller.
	echo $this->session->flashdata('success');

	//standard codeIgniter form using the form helper class.
		echo form_open();
			$input = array(
				'name' => 'question',
				'placeholder' => 'Question'
			);
			echo form_input($input);
			$button = array(
				'name' => 'add_question',
				'value' => 'Update Questions'
			);
			echo form_submit($button);
		echo form_close();
		
		
		echo form_open();
			$input = array(
				'name' => 'answer',
				'placeholder' => 'answer three'
			);
			echo form_input($input);
			$input = array(
				'name' => 'answer',
				'placeholder' => 'answer one'
			);
			echo form_input($input);
			$input = array(
				'name' => 'answer',
				'placeholder' => 'answer two'
			);
			echo form_input($input);
			$button = array(
				'name' => 'add_question',
				'value' => 'Update Answers'
			);
			echo form_submit($button);
		echo form_close();
		

		
