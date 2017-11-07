<?php

class enemyController extends Controller {

	public function index() {		
		$enemies = $this->model->load();
        $this->setResponce($enemies);
	}
	
	public function view($data) {
		$enemy = $this->model->load($data['id']);
        $this->setResponce($enemy);
	}
	
	public function add() {

		if((isset($_POST['id'])) && (isset($_POST['name'])) 
			&& (isset($_POST['image'])) && (isset($_POST['power'])) && (isset($_POST['speed']))) 
		{
				
			$dataToSave = array(
				'id'=>$_POST['id'], 
				'name'=>$_POST['name'],
				'image'=>$_POST['image'],
				'power'=>$_POST['power'],
				'speed'=>$_POST['speed']
			);
			
			$addedItem=$this->model->create($dataToSave);
			$this->setResponce($addedItem);
		}
	}
	
	public function edit($data) {
		
		if((isset($_PUT['id'])) && (isset($_PUT['name'])) 
			&& (isset($_PUT['image'])) && (isset($_PUT['power'])) && (isset($_PUT['speed']))) 
		{			
			$dataToUpd=array(
				'id'=>$_PUT['id'], 
				'name'=>$_PUT['name'],
				'image'=>$_PUT['image'],
				'power'=>$_PUT['power'],
				'speed'=>$_PUT['speed']
			);

			$updItem=$this->model->save($data['id'], $dataToUpd);
			$this->setResponce($updItem);
		}
	}
	
	public function delete($data) {

		$delItem = $this->model->delete($data['id']);
        $this->setResponce($delItem);
	}

}