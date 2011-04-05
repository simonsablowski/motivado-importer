<?php

class ImporterController extends Controller {
	protected $Importer;
	
	public function setup($void = NULL) {
		if (is_null($this->getConfiguration('pathModeling'))) {
			throw new FatalError('Modeling path not set');
		}
		
		if (!is_null($this->getRequest()->getData('autoRun'))) {
			
		}
		
		try {
			$Coaching = Coaching::findByKey('psychotest');
		} catch (Error $Error) {
			$Coaching = new Coaching(array(
				'key' => 'psychotest',
				'language' => 'de_DE',
				'title' => 'Psychotest'
			));
			$Coaching->create();
		}
		
		$this->setImporter(new Importer($this->getConfiguration()));
		$this->getImporter()->setCoachings(array($Coaching));
	}
	
	public function index() {
		$this->setup();
		$this->getImporter()->run();
		var_dump(count($this->getImporter()->getObjects()));
	}
}