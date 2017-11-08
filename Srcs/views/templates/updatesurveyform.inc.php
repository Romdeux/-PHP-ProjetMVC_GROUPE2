<?php 
function generateInputForResponse($n, $str, $id) {
	?>
	<div class="control-group">
		<label class="control-label" for="responseSurvey<?php echo $n; ?>">Réponse <?php echo $n + 1; ?></label>
		<div class="controls">
			<input class="span3" type="text" name="responseSurvey<?php echo $n + 1; ?>" placeholder="Réponse <?php echo $n + 1; ?>" value="<?php echo $str ?>">
			<input style="display:none;" type="text" name="ResponseId<?php echo $n + 1; ?>" value="<?php echo $id ?>">
		</div>
	</div>
<?php
}
?>

<form method="post" action="index.php?action=UpdateSurvey" class="modal">
	<div class="modal-header">
		<h3>Modification d'un sondage :</h3>
	</div>
	<div class="form-horizontal modal-body">
		<?php	if ($this->message!=="")
			echo '<div class="alert '.$this->style.'">'.$this->message.'</div>';
		?>
		<div class="control-group">
			<label class="control-label" for="questionSurvey">Question</label>
			<div class="controls">
				<input class="span3" type="text" name="questionSurvey" placeholder="Question" value="<?php echo $this->survey->getQuestion() ?>">
				<input style="display:none;" type="text" name="SurveyId" value="<?php echo $this->survey->getId() ?>">
			</div>
		</div>
		<br>
		<?php 
			$responses = $this->survey->getResponses();
			for ($i = 0; $i <= 4; $i++)
				if(isset($responses[$i])) {
					generateInputForResponse($i,$responses[$i]->getTitle(),$responses[$i]->getId());
				} else {
					generateInputForResponse($i, "", "");
				}
		?>
	</div>
	<div class="modal-footer">
		<input class="btn btn-danger" type="submit"	value="Poster le sondage" />
	</div>
</form>



