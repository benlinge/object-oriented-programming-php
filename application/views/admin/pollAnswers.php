<?php
	// show flashdata set by the controller.
	echo $this->session->flashdata('success');
		
		echo form_open();
			$input = array(
				'name' => 'answer',
				'placeholder' => 'answer three'
			);
			echo form_input($input);
			$input = array(
				'name' => 'answer2',
				'placeholder' => 'answer one'
			);
			echo form_input($input);
			$input = array(
				'name' => 'answer3',
				'placeholder' => 'answer two'
			);
			echo form_input($input);
			$button = array(
				'name' => 'add_question',
				'value' => 'Update Answers'
			);
			echo form_submit($button);
		echo form_close();