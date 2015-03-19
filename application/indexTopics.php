<!DOCTYPE html>
<html>
<head>
<title>Topics View</title>
</head>

<body>
<table>
    <tr>
    	<th colspan="2">Topics</th>
    </tr>
<?php 
	if (count($topics) > 0) {
		
		foreach ($topics as $topic)  {?>
			
			<tr>
           	<td>
           		<a href="<?php echo base_url(); ?>topics/topic/<?php echo $topic['topic_id']; ?>">
					<?php echo $topic['topic_name']; ?>
                </a>
              </td>
           </tr>
<?php  
		} 
	} else {
?>
	<tr>
		<td>No topics found</td>
	</tr>
<?php
	}
?>
</table>
<div><br /><br /><a href="<?php echo base_url(); ?>poll/">Poll Question</a></div>
</body>
</html>