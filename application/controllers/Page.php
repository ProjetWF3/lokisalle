<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public $classActive;

	public function __construct()
	{
		// Obligatoire
		parent::__construct();
	}

	/*** nom fonction = nom de la page créée ***/
	public function index($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'accueil';
		$this->layout->view('accueil', $data);
	}

	public function reservation($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'réservation';
		$this->layout->view('reservation', $data);
	}

	public function recherche($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'recherche';
		$this->layout->view('recherche', $data);
	}

	public function inscription($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'inscription';
		$this->layout->view('inscription', $data);
	}

	public function connexion($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'connexion';
		$this->layout->view('connexion', $data);
	}
}
