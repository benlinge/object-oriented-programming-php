<!DOCTYPE html>
<html>
<head>
<title>Poll</title>
</head>
<body>
<table>
    <tr>
    <th colspan="1"><?php
    	foreach ($poll_question as $pollQuestion) {//Loop for poll question?>	
				<?php echo $pollQuestion['question'];//Displays the question?>
		<?php }?>
    </th>
    </tr>
	<?php
   	echo form_open();//Open Form	
		$i = 0;//Set for only one radio to be selected
			
		foreach ($poll_answers as $pollAnswer)  {//Loop for poll choices?>
	<tr>
    <td>
			<?php
			$answer_id = $pollAnswer['choice'];//Answer_id set to the choice
			//Displays the choice "Yes" or "No"
			echo form_label(htmlspecialchars($pollAnswer['choice']).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'choice');
			//Array of properties for the poll form
			$radio = array(
    			'name'        => 'choice',
    			'id'          => 'choice',
				'value'       => $pollAnswer['answer_id'],//Value set to the answer_id so that the system recognises the which record been chosen
    			'checked'     => FALSE
   			);
			if($i == 0){//Allows only one radio option to be checked, so the chosen option can be processed once submitted.
               	$radio['checked'] = 'checked';
           	}
			echo form_radio($radio);//Radio displayed for yes and no poll options with array attributes defined earlier
			$i++;//increments by one for the second radio check box.
		}
			
		echo form_hidden('answer_id', $answer_id);//Id hidden but is used to detect which answer_id the check box belongs to.
		//Array of properties for the submit button
		$button = array(
			'name' => 'submit_choice',
			'value' => 'Submit'
		);
		?><br /><?php
		echo form_submit($button);//button displayed
		
	echo form_close();//Close form
	?>
    </td>		
    </tr>
</table>
</body>
</html>