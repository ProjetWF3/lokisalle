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

	public function contact($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'contact';
		$this->layout->view('contact', $data);
	}

	public function mentions($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'mentions légales';
		$this->layout->view('mentions', $data);
	}
	public function cgv($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'cgv';
		$this->layout->view('cgv', $data);
	}	
	public function plan($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'plan';
		$this->layout->view('plan', $data);
	}
	public function newsletter($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'newsletter';
		$this->layout->view('newsletter', $data);
	}	
	public function panier($data = '')
	{
		//$data = array();
		$data['nom_page'] = 'panier';
		$this->layout->view('panier', $data);
	}	
}

