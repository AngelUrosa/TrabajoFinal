<?php 

require_once '..\conexion.php';
require_once '../pojos/persona.php';

	class Personas {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonPersonas(){
			if(!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;
			}
			return self::$instancia;
		}

		public function getSesion($usuario,$contraseña,$perfil){
			$error=0;

			$u=null;

	
			try {
				  		$consulta="SELECT * FROM personas WHERE usuario=? AND contraseña=?";             
				
	 	 				$query=$this->db->preparar($consulta);            
		 				$query->bindParam(1,$usuario);          
					 	$query->bindParam(2,$contraseña);    
		 				$query->execute();    

						 //Carga en un vector
						$tPersona=$query->fetchall(); 
						
						if (isset($tPersona[0])) {

							if (($perfil == 1 && $tPersona[0]['trabajador'] == true )|| $perfil == 2 ){
								//Solicito acceso administrador
							 {

								$u=new Persona($tPersona[0]['id_persona'],$tPersona[0]['id_comunidad'],$tPersona[0]['nif']
								,$tPersona[0]['usuario'],
								$tPersona[0]['contraseña'],$tPersona[0]['email'],$tPersona[0]['trabajador']);
							}

							
						}	
	
					}
					} catch(Exception $e){           
		    
						$error=1;         
		    			return $error;        
					}     
			
					return $u;   

   	 }

		public function addUnaPersona(Persona $p){
			//Esta función da de alta una familia nueva en la tabla familias_productos
			try {
				$consulta="INSERT INTO personas (id_persona,nif,id_comunidad, usuario, contraseña, email, trabajador) VALUES (null,?,?,?,?,?,?)";
				$idPersona=$p->getPersona();
				$nif=$p->getNif();
				$idComunidad=$p->getIdComunidad();
				$usuario=$p->getUsuario();
				$contraseña=$p->getContraseña();
				$email=$p->getEmail();
				$trabajador=$p->getTrabajador();


				$query=$this->db->preparar($consulta);
				$query->bindParam(1,$idPersona);
				$query->bindParam(2,$nif);
				$query->bindParam(3,$idComunidad);
				$query->bindParam(4,$usuario);
				$query->bindParam(5,$contraseña);
				$query->bindParam(6,$email);
				$query->bindParam(7,$trabajador);

				$query->execute(); //ejecuta la consulta

				$insertado=true; //
				
			} catch (Exception $e){
                $insertado = false;
            }

            return $insertado;

			} 
		

		public function getPersona(){
		
			$error=0;
			try {
				$consulta="SELECT id_persona, nif, id_comunidad, usuario, contraseña, email, trabajador FROM personas";

				$query=$this->db->preparar($consulta);
				$query->execute();

				$tPersonas=$query->fetchall(); //array bidimensional
				$error=0;
			} catch (Exception $e) {
				$error=1;
				//echo "Se ha producio un error en getFamiliasProductosTodas";
			}
			//Vamos a construir un array de objetos
			$t=array();
			foreach ($tPersonas as $fila) {
				$fp=new Persona($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6]);
				array_push($t, $fp); //mete $fp en $t
			}
			return $t; //devolvemos el array de objetos
		}
	
	}
    ?>