<?php

//show flashdata set by controller.
echo $this->session->flashdata('success');

echo '<div class="add_row"><a class="add_btn" href="'.current_url().'/addTopic">Add Topic</a></div>';
// make sure a topic has been found.
echo '<div class="clear">';
if (count($topics) > 0) {
	// loop and show the topic name but wrap the name in a link
	foreach($topics as $topic) { ?>
		<div class="edit_row clear">
            <?php echo $topic['topic_name']; ?>
            <a class="edit_btn" href="<?php echo base_url(); ?>admin/quizzes/home/<?php echo $topic['topic_id']; ?>">Edit</a>
        </div>
<?php } 
} else {
?>
<p>No topics found</p>
<?php
	}
?>

<!--Poll area-->
<h2>Poll</h2>
    <div class="clear">
    	<p><!--Button to update poll question-->
			<a class="edit_btn" href="<?php echo base_url(); ?>admin/poll/updateQuestion">Edit Question</a>
		</p>
    </div>
	<div class="clear">
    	<p><!--Button to update poll answer one-->
			<a class="edit_btn" href="<?php echo base_url(); ?>admin/poll/updateAnswerOne">Edit Answer One</a>
		</p>
    </div>
	<div class="clear">
    	<p><!--Button to update poll answer two-->
			<a class="edit_btn" href="<?php echo base_url(); ?>admin/poll/updateAnswerTwo">Edit Answer Two</a>
		</p>
    </div>