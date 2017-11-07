<?php

require_once("actions/Action.inc.php");

class GetMySurveysAction extends Action {

	/**
	 * Construit la liste des sondages de l'utilisateur et le dirige vers la vue "ServeysView" 
	 * de façon à afficher les sondages.
	 *
	 * Si l'utilisateur n'est pas connecté, un message lui demandant de se connecter est affiché.
	 *
	 * @see Action::run()
	 */
	public function run() {
		$fauxglobal = "";
		$Solosondage;
		$Soloresponse;
		$Sondages = array();
		$c = -1;
		
		foreach($this->database->loadSurveysByOwner($_SESSION["login"]) as $foo) {
			if($foo['question'] != $fauxglobal) {
				$fauxglobal = $foo['question'];
				$Solosondage = new Survey($_SESSION["login"], $fauxglobal);
				$Solosondage->setId($foo['idsurv']);
				array_push($Sondages, $Solosondage);
				$c++;
			}
			$Soloresponse = new Response($Solosondage, $foo['title'], intval($foo['count']));
			$Soloresponse->setId(intval($foo['id']));
			$Sondages[$c]->addResponse($Soloresponse);
		}
		
		$this->setView(getViewByName("Surveys"));
		$this->getView()->setSurveys($Sondages);
	}

}

?>
