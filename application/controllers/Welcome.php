<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario'); 
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function getUser()
	{
		$data=$this->Usuario->getUser();
		header('Content-Type: application/json');
		echo json_encode($data);
		//Ejecución: http://localhost:8080/webservicesci/index.php/welcome/getuser
		//Agregar usuario en postman con Json
		// {
		// 	"nombre":"Pepe",
		// 	"apellido":"Perez",
		// 	"clave":"3232"
		// } 
	}
	public function getUserById($id) //Método GET
	//public function getUserById() //Método POST
	{
		//con método POST
		//$myId=$this->input->post('id');

		$data=$this->Usuario->getUserById($id);
		//$data=$this->Usuario->getUserById($myId);
		//poner cabecera para que sea identificado como JSON
		header('Content-Type: application/json');
		echo json_encode($data);
		//Ejecución: http://localhost:8080/webservicesci/index.php/welcome/getuserbyid/4
	}
	function addUser()
	{
		//Obtener el JSON recibido en la variable $ json.
		$json = file_get_contents('php://input');
 		// decodifica el JSON recibido y lo almacena en la variable $ obj.
		$obj = json_decode($json,true);
		
		// Rellene la clase de usuario de la matriz JSON $ obj y almacénela en $nombre.
		$nombre = $obj['nombre'];
		
		// Rellene la clase de usuario de la matriz JSON $ obj y almacénela en $apellido.
		$apellido = $obj['apellido'];
		
		// Rellene la clase de usuario de la matriz JSON $ obj y almacénela en $clave.
		$clave = $obj['clave'];

		$data=$this->Usuario->addUser($nombre,$apellido,$clave);
		echo json_encode($data);
 
	}
	function updateUser()
	{
		//Obtener el JSON recibido en la variable $ json.
		$json = file_get_contents('php://input');
 		// decodifica el JSON recibido y lo almacena en la variable $ obj.
		$obj = json_decode($json,true);
		
		// Rellene la clase de usuario de la matriz JSON $ obj y almacénela en $id

		$id = $obj['id'];

		// Rellene la clase de usuario de la matriz JSON $ obj y almacénela en $nombre
		$nombre = $obj['nombre'];
		
		// Rellene la clase de usuario de la matriz JSON $ obj y almacénela en $apellido
		$apellido = $obj['apellido'];
		
		// Rellene la clase de usuario de la matriz JSON $ obj y almacénela en $clave
		$clave = $obj['clave'];

		$data=$this->Usuario->updateUser($id,$nombre,$apellido,$clave);
		echo json_encode($data);
 
	}
	function deleteUser()
	{
		//Obtener el JSON recibido en la variable $ json.
		$json = file_get_contents('php://input');
 		// decodifica el JSON recibido y lo almacena en la variable $ obj.
		$obj = json_decode($json,true);
		
		// Rellene la clase de usuario de la matriz JSON $ obj y almacénela en $id

		$id = $obj['id'];

		$data=$this->Usuario->deleteUser($id);
		echo json_encode($data);

 
	}
}

