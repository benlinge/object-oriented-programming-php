<h1><?php echo $question; ?></h1>
<?php

    echo form_open();

        $i = 0;
        foreach($answers as $answer) {

            $question_id = $answer['question_id'];

            echo form_label(htmlspecialchars($answer['answer']).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'answer');

            $radio = array(
                'name' => 'answer',
                'id' => 'answer',
                'value' => $answer['answer_id']
            );
            if($i == 0){
                $radio['checked'] = 'checked';
            }
            echo form_radio($radio);

            echo '<br /><br />';

            $i++;
        }

        echo form_hidden('question_id', $question_id);

        echo form_submit('answer_question', 'Answer Question');

    echo form_close();

?>
