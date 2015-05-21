<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	private $nom_site;

	public function __construct()
	{
		//	Obligatoire
		parent::__construct();
		
		//	Maintenant, ce code sera exécuté chaque fois que ce contrôleur sera appelé.
		$this->nom_site = 'Lokisalle';
	}

	public function index($page = '')
	{
		$data = array();
		$data['nom_page'] = 'Coco';
		$data['titre_page'] = 'Bienvenue sur la page de Coco !';
		$data['nom_site'] = $this->nom_site;
		$this->layout->view('page_test', $data);
	}

	public function bonjour() 
	{
		echo 'bonjour';
	}

}
