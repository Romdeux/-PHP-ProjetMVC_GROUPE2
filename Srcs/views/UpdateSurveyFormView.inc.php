<?php
require_once("views/View.inc.php");

class UpdateSurveyFormView extends View {
	public $survey;
	
	/**
	 * Affiche le formulaire d'ajout de sondage.
	 *
	 * @see View::displayBody()
	 */
	public function displayBody() {

		require("templates/updatesurveyform.inc.php");
	}
	
	public function setSurvey($survey) {
		$this->survey = $survey;
	}
}
?>
