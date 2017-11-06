<?php
require_once("views/View.inc.php");

class UpdateSurveyFormView extends View {

	/**
	 * Affiche le formulaire d'ajout de sondage.
	 *
	 * @see View::displayBody()
	 */
	public function displayBody() {
		require("templates/updatesurveyform.inc.php");
	}

}
?>


