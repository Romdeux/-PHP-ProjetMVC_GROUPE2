<?php

require_once("model/Survey.inc.php");
require_once("model/Response.inc.php");
require_once("actions/Action.inc.php");

class UpdateSurveyAction extends Action {

	public function run() {
		/* TODO START */
        $question = htmlentities($_POST['questionSurvey']);
          
        for ($i = 1; $i <= (count($_POST)-1) ; $i++){
            $Response[$i] = htmlentities($_POST['responseSurvey'.$i]);
        }
        
        
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
                            $tampon=new Response($survey, $Response[$i],0);
                            $this->database->saveResponse($tampon);
                        }
                    }
                    $this->setMessageView("Merci, nous avons modifié votre sondage");
                }
            }
            else{
                $this->setMessageView("La question est obligatoire");
            }
        }
		
		/* TODO END */
	}

	private function setAddSurveyFormView($message) {
		$this->setView(getViewByName("UpdateSurveyForm"));
		$this->getView()->setMessage($message, "alert-error");
	}

}

?>
