<?php

require_once("actions/Action.inc.php");

class DeleteAction extends Action {

	/**
	 * Récupère l'identifiant de la réponse choisie par l'utilisateur dans la variable
	 * $_POST["responseId"] et met à jour le nombre de voix obtenues par cette réponse.
	 * Pour ce faire, la méthode 'vote' de la classe 'Database' est utilisée.
	 * 
	 * Si une erreur se produit, un message est affiché à l'utilisateur lui indiquant
	 * que son vote n'a pas pu être pris en compte.
	 * 
	 * Sinon, un message de confirmation lui est affiché.
	 *
	 * @see Action::run()
	 */	
	public function run() {
		
		if($this->database->deleteSurvey(intval($_POST['Id']),$_SESSION['login'])) {
			$this->setMessageView("Votre sondage a été supprimé. RIP", "alert-success");
		} else {
			$this->setMessageView("Erreur, seul le propriétaire peut supprimer son sondage", "alert-failure");
		}
	}

}

?>
