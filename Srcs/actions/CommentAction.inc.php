<?php

require_once("actions/Action.inc.php");

class CommentAction extends Action {

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
        if ($this->getSessionLogin() === null) {
            $this->setMessageView("Vous devez être authentifié.", "alert-error");
            return;
        } else {
            if (isset($_POST['commentaire'])) {
				$commentaire = htmlentities($_POST['commentaire']);
                $this->database->addComment($_SESSION['login'],$_POST['Id'],$commentaire);
            }
            $this->setMessageView("Commentaire posté");
        }
	}
}

?>
