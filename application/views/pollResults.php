<!DOCTYPE html>
<html>
<head>
<title>Poll</title>
</head>
<body>
<table>
    <tr>
    	<th colspan="1">
        	<p>Poll Results</p>
        </th>
    </tr>    
    <tr>
		<?php
    		foreach ($poll_answers as $pollAnswer)  {//Loop for poll choices?>	
    		<th colspan="1">
				<?php echo $pollAnswer['choice'];//Displays the answers ?>
        	</th>
		<?php }?>
    </tr>
    <tr>
    <?php
    		foreach ($yesResults as $yesResult)  {//Loop for first choice results?>	
			<th colspan="1">
				<?php echo $yesResult['number'];//Displays the number for first choice?>
        	</th>
            <?php }?>
            <?php
    		foreach ($noResults as $noResult)  {//Loop for second choice results?>	
            <th colspan="1">
				<?php echo $noResult['number'];//Displays the number for second choice?>
        	</th>
            <?php }?>
    </tr>
    <tr>
</table>
</body>
</html>