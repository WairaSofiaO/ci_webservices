<?php
class Usuario extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}
	function getUser()
	{
		$query=$this->db->get('usuario');
		//return $query->row(); //solo el primer registro
		return $query->result_array(); //Todos los registros
	}
	function getUserById($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('usuario');
		return $query->row();
	}

	function addUser($nombre,$apellido,$clave)
	{
		$arrayuser = [
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'clave'=>$clave
		];
		$this->db->insert('usuario',$arrayuser);
		return "Usuario agregado correctamente...";
	}
	function updateUser($id,$nombre,$apellido,$clave)
	{
		$arrayuser = [
			'nombre'=>$nombre,
			'apellido'=>$apellido,
			'clave'=>$clave
		];
		$this->db->where('id',$id);
		$this->db->update('usuario',$arrayuser);
		return "Usuario actualizado correctamente...";

	}
	function deleteUser($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('usuario');
		return "Usuario eliminado correctamente...";
	}

}
?>
