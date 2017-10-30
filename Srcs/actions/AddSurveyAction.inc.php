<?php

require_once("model/Survey.inc.php");
require_once("model/Response.inc.php");
require_once("actions/Action.inc.php");

class AddSurveyAction extends Action {

	/**
	 * Traite les données envoyées par le formulaire d'ajout de sondage.
	 *
	 * Si l'utilisateur n'est pas connecté, un message lui demandant de se connecter est affiché.
	 *
	 * Sinon, la fonction ajoute le sondage à la base de données. Elle transforme
	 * les réponses et la question à l'aide de la fonction PHP 'htmlentities' pour éviter
	 * que du code exécutable ne soit inséré dans la base de données et affiché par la suite.
	 *
	 * Un des messages suivants doivent être affichés à l'utilisateur :
	 * - "La question est obligatoire.";
	 * - "Il faut saisir au moins 2 réponses.";
	 * - "Merci, nous avons ajouté votre sondage.".
	 *
	 * Le visiteur est finalement envoyé vers le formulaire d'ajout de sondage en cas d'erreur
	 * ou vers une vue affichant le message "Merci, nous avons ajouté votre sondage.".
	 * 
	 * @see Action::run()
	 */
	public function run() {
		/* TODO START */
        $question = htmlentities($_POST['questionSurvey']);
          
        for ($i = 1; $i <= (count($_POST)-1) ; $i++){
            $Response[$i] = htmlentities($_POST['responseSurvey'.$i]);
        }
        
         var_dump($_POST);
        
        if ($this->getSessionLogin()===null) {
			$this->setMessageView("Vous devez être authentifié.", "alert-error");
			return;
		}
        else {
            if($question!=''){
                if($_POST['responseSurvey1']=='' or $_POST['responseSurvey2']==''){
                    $this->setMessageView("Il faut saisir au moins 2 réponses.");
                }
                else{
                    
                    $survey=new Survey($_SESSION['login'],$question);
                    $this->database->saveSurvey($survey);
                    for($i=1 ; $i<=5; $i++){
                        if($_POST['responseSurvey'.$i]!=''){
                            $tampon=new Response($question, $Response[$i],$i);
                            $this->database->saveResponse($tampon);
                        }
                    }
                    $this->setMessageView("Merci, nous avons ajouté votre sondage");
                }
            }
            else{
                $this->setMessageView("La question est obligatoire");
            }
        }
		
		/* TODO END */
	}

	private function setAddSurveyFormView($message) {
		$this->setView(getViewByName("AddSurveyForm"));
		$this->getView()->setMessage($message, "alert-error");
	}

}

?>
