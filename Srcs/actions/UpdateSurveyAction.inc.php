<?php

require_once("model/Survey.inc.php");
require_once("model/Response.inc.php");
require_once("actions/Action.inc.php");

class UpdateSurveyAction extends Action {

	public function run() {
        $question = htmlentities($_POST['questionSurvey']);
        
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
                    $this->database->updateSurvey($_POST['SurveyId'],$question);
                    for($i=1 ; $i<=5; $i++){
                        if($_POST['responseSurvey'.$i]!=''){
                            $this->database->updateResponse($_POST['ResponseId'.$i], $_POST['responseSurvey'.$i]);
                        }
                    }
                    $this->setMessageView("Merci, nous avons modifié votre sondage");
                }
            }
            else{
                $this->setMessageView("La question est obligatoire");
            }
        }
	}

	private function setAddSurveyFormView($message) {
		$this->setView(getViewByName("UpdateSurveyForm"));
		$this->getView()->setMessage($message, "alert-error");
	}

}

?>
