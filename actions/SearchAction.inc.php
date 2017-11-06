<?php

require_once("actions/Action.inc.php");

class SearchAction extends Action {

	/**
	 * Construit la liste des sondages dont la question contient le mot clé
	 * contenu dans la variable $_POST["keyword"]. L'utilisateur est ensuite 
	 * dirigé vers la vue "ServeysView" permettant d'afficher les sondages.
	 *
	 * Si la variable $_POST["keyword"] est "vide", le message "Vous devez entrer un mot clé
	 * avant de lancer la recherche." est affiché à l'utilisateur.
	 *
	 * @see Action::run()
	 */
	public function run() {
		$fauxglobal = "";
		$Solosondage;
		$Soloresponse;
		$Sondages = array();
		$c = -1;
		
		foreach($this->database->loadSurveysByKeyword($_POST["keyword"]) as $foo) {
			if($foo['question'] != $fauxglobal) {
				$fauxglobal = $foo['question'];
				$Solosondage = new Survey($foo['owner'], $fauxglobal);
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
