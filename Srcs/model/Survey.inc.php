<?php
class Survey {
	
	private $id;
	private $owner;
	private $question;
	private $responses;

	public function __construct($owner, $question) {
		$this->id = null;
		$this->owner = $owner;
		$this->question = $question;
		$this->responses = array();
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		if ($this->id != null) {
			return $this->id;
		} else {
			return "null";
		}
	}

	public function getOwner() {
		return $this->owner;
	}
	
	public function getQuestion() {	
		return $this->question;
	}

	public function getResponses() {
		return $this->responses;
	}

	public function setResponses($responses) {
		$this->responses = $responses;
	}
	
	public function addResponse($response) {
		$this->responses[] = $response;
	}
	
	public function computePercentages() {
		$total = 0;
		for($i = 0; $i < count($this->responses); $i++) {
			$total += $this->responses[$i]->getCount();
		}
		for($i = 0; $i < count($this->responses); $i++) {
			$this->responses[$i]->computePercentage($total);
		}
	}
}
?>
