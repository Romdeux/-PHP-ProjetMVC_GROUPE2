<?php

require_once("actions/Action.inc.php");

class UpdateUserAction extends Action {

	/**
	 * Met à jour le mot de passe de l'utilisateur en procédant de la façon suivante :
	 *
	 * Si toutes les données du formulaire de modification de profil ont été postées
	 * ($_POST['updatePassword'] et $_POST['updatePassword2']), on vérifie que
	 * le mot de passe et la confirmation sont identiques.
	 * S'ils le sont, on modifie le compte avec les méthodes de la classe 'Database'.
	 *
	 * Si une erreur se produit, le formulaire de modification de mot de passe
	 * est affiché à nouveau avec un message d'erreur.
	 *
	 * Si aucune erreur n'est détectée, le message 'Modification enregistrée.'
	 * est affiché à l'utilisateur.
	 *
	 * @see Action::run()
	 */
	public function run() {
		/* TODO START */
		/** On recupere les valeurs du formulaire ($_POST) dans des variables */
		$updatePassword=$_POST['updatePassword'];
		$updatePassword2=$_POST['updatePassword2'];

        if (strcmp($updatePassword, $updatePassword2) !== 0) {
        	/** On vérifie que le mot de passe et la confirmation soit identique */
            $this->setUpdateUserFormView("Le mot de passe et sa confirmation sont différents.");
        }
        else{
        	/** On utilise la méthode de la classe Database et on définie ses variables */
        	$update=$this->database->updateUser($_SESSION['login'], $updatePassword);
            if($update === true){
            	/** On affiche a l'utilisateur que le mot de passe à bien était modifié */
                $this->setMessageView("Modification enregistrée.");
            } else {
            	/** On renvoie une erreur à l'utilisateur et on affiche le formulaire */
                $this->setUpdateUserFormView($update);
            }
        }



		/* TODO END */
	}

	private function setUpdateUserFormView($message) {
		$this->setView(getViewByName("UpdateUserForm"));
		$this->getView()->setMessage($message, "alert-error");
	}

}

?>
