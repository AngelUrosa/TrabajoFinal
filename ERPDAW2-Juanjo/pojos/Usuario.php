<?php 

class Usuario{

	private $id;
	private $idUsuario;
	private $idRol;
	private $login;
	private $password;
	private $activo;


	
	public function __construct($id, $idUsuario, $idRol, $login, $password, $activo)
	{
		$this->id = $id;
		$this->idUsuario = $idUsuario;
		$this->idRol = $idRol;
		$this->login = $login;
		$this->password = $password;
		$this->activo = $activo;
	}


    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    
    public function getIdRol()
    {
        return $this->idRol;
    }

    
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }

    
    public function getLogin()
    {
        return $this->login;
    }

    
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    
    public function getPassword()
    {
        return $this->password;
    }

    
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    
    public function getActivo()
    {
        return $this->activo;
    }

    
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }
}
 ?>
