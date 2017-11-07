<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->

<br><br><br>

<li class="media well">
	<div class="media-body">
		<h4 class="media-heading"><?php echo $survey->getQuestion() ?></h4>
		<br>
	  <?php
	  foreach ($survey->getResponses() as $response) {
		echo "<div class=\"fluid-row\">";
			echo "<div class=\"span2\">".$response->getTitle()."</div>";
			echo "<div class=\"span2 progress progress-striped active\">";
				echo "<div class=\"bar\" style=\"width: ".$response->getPercentage()."%\"></div>";
			echo "</div>";
			echo "<span class=\"span1\">(". $response->getPercentage() ."%)</span>";
			echo "<form class=\"span1\" method=\"post\" action=\"".$_SERVER['PHP_SELF'].'?action=Vote'."\">";
				echo "<input type=\"hidden\" name=\"responseId\" value=\"".$response->getId()."\"> ";
				echo "<input type=\"submit\" style=\"margin-left:5px\" class=\"span1 btn btn-small btn-danger\" value=\"Voter\">";
			echo "</form>";
		echo "</div>";
	  } 
		?>
        <div class="control-group">
            <div class="span2 offset5">
                <form id="formedit<?php echo $survey->getId(); ?>" method="post" action="index.php?action=UpdateSurveyForm">
					<input type="hidden" name="Id" value="<?php echo $survey->getId(); ?>" >
                    <a onclick="document.getElementById('formedit<?php echo $survey->getId(); ?>').submit();"><span class="glyphicon glyphicon-edit"></span></a>
                </form>
            </div>
			<div class="span2 offset5">
                <form id="formdelete<?php echo $survey->getId(); ?>" method="post" action="index.php?action=Delete">
					<input type="hidden" name="Id" value="<?php echo $survey->getId(); ?>">
                    <a onclick="document.getElementById('formdelete<?php echo $survey->getId(); ?>').submit();"><span class="glyphicon glyphicon-trash"></span></a>
                </form>
            </div>
	</div>
</li>
<?php require_once("addcommentform.inc.php"); ?>