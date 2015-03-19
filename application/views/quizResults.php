<h2>Results</h2>
<h1><?php echo $quiz['quiz_name']; ?></h1>
<p>* = Correct Answer<br />
    <strong>Bold</strong> = Your Answer</p>
<?php

    $total = 0;
    $correct = 0;
    $question_id = 0;
    foreach($answers as $answer) {
        if($answer['question_id'] != $question_id) {
            $total++;
            $question_id = $answer['question_id'];
            echo '<h3>'.$answer['question'].'</h3>';
        }

        echo '<p>';

        if($user_answers[$answer['question_id']] == $answer['answer_id']) {
            echo '<strong>';
        }

        if($answer['correct'] == 1) {
            echo '*';
        }

        echo htmlspecialchars($answer['answer']);

        if($user_answers[$answer['question_id']] == $answer['answer_id']) {
            echo '</strong>';
        }

        if($user_answers[$answer['question_id']] == $answer['answer_id'] && $answer['correct'] == 1) {
            $correct++;
        }

        echo '</p>';

    }
    echo '<p>Correct Answers: '.$correct.' of out '.$total.'</p>';

    $percentage = round( ($correct / $total) * 100 , 0);
	
    echo 'Overall Percentage: '.$percentage.'%';
	//Badge else if statements
	if($percentage >= 80) {//if score is equal to or over 80%
		foreach($diamond as $diamondBadge) {//diamond badge
			?><img src="data:image/jpeg;base64,<?php echo base64_encode($diamondBadge['image'])?>" width="100px" height="100px"><?php //echo image
		}
		echo '<p>Congratulations, you got the DIAMOND badge this quiz!</p>';
	} elseif($percentage >= 60) {//if score is equal to or over 60%
		foreach($plat as $platBadge) {//platinum badge
			?><img src="data:image/jpeg;base64,<?php echo base64_encode($platBadge['image'])?>" width="100px" height="100px"><?php //echo image
		}
		echo '<p>Congratulations, you got the PLATINUM badge this quiz!</p>';
	} elseif($percentage >= 40) {//if score is equal to or over 40%
		foreach($gold as $goldBadge) {//gold badge
			?><img src="data:image/jpeg;base64,<?php echo base64_encode($goldBadge['image'])?>" width="100px" height="100px"><?php //echo image
		}
		echo '<p>Congratulations, you got the GOLD badge this quiz!</p>';
	} elseif($percentage >= 20) {//if score is equal to or over 20%
		foreach($silver as $silverBadge) {//silver badge
			?><img src="data:image/jpeg;base64,<?php echo base64_encode($silverBadge['image'])?>" width="100px" height="100px"><?php //echo image
		}
		echo '<p>Congratulations, you got the SILVER badge this quiz!</p>';
	} elseif($percentage > 0) {//if score is over 0%
		foreach($bronze as $bronzeBadge) {//bronze badge
			?><img src="data:image/jpeg;base64,<?php echo base64_encode($bronzeBadge['image'])?>" width="100px" height="100px"><?php //echo image
		}
		echo '<p>Congratulations, you got the BRONZE badge this quiz!</p>';
	} elseif($percentage == 0) {//if score is equal to 0%
		echo '<p>You need to try better next time</p>';
	}
	
?>