
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
		
		<!--<div class="fluid-row">
			<div class="span2">Réponse 1</div>
			<div class="span2 progress progress-striped active">
				<div class="bar" style="width: 20%"></div>
			</div>
			<span class="span1">(20%)</span>
			<form class="span1" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?action=Vote';?>">
				<input type="hidden" name="responseId" value="1"> 
				<input type="submit" style="margin-left:5px" class="span1 btn btn-small btn-danger" value="Voter">
			</form>
		</div>

		<div class="fluid-row">
			<div class="span2">Réponse 2</div>
			<div class="span2 progress progress-striped active">
				<div class="bar" style="width: 80%"></div>
			</div>
			<span class="span1">(80%)</span>
			<form class="span1" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?action=Vote';?>">
				<input type="hidden" name="responseId" value="2"> 
				<input type="submit" style="margin-left:5px" class="span1 btn btn-small btn-danger" value="Voter">
			</form>
		</div>-->
		
	</div>
</li>