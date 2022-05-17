<?php 

require_once 'Conexion.php';
require_once './pojos/persona.php';

	class Personas {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonPersonas(){
			if (!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;

			}
			return self::$instancia; //this->$instancia

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
				$consulta="INSERT INTO personas (nif,id_comunidad, usuario, contraseña, email, trabajador) VALUES (?,?,?,?,?,?)";
				$nif=$c->getNif();
				$idComunidad=$c->getIdComunidad();
				$usuario=$c->getUsuario();
				$contraseña=$c->getContraseña();
				$email=$c->getEmail();
				$trabajador=$c->getTrabajador();


				$query=$this->db->preparar($consulta);
				$query->bindParam(1,$nif);
				$query->bindParam(2,$idComunidad);
				$query->bindParam(3,$usuario);
				$query->bindParam(4,$contraseña);
				$query->bindParam(5,$email);
				$query->bindParam(6,$trabajador);

				$query->execute(); //ejecuta la consulta

				$insertado=true; //
				
				$p->setIdPersona(PDO::lastInsertId());

				


			} catch (Exception $e) {
				//echo "Se ha producido un error";
				$insertado=false;	
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
				$error=1;
			} catch (Exception $e) {
				$error=1;
				//echo "Se ha producio un error en getFamiliasProductosTodas";
			}
			//Vamos a construir un array de objetos
			$t=[];
			foreach ($tPersonas as $fila) {
				$fp=new Cliente($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6]);
				array_push($t, $fp); //mete $fp en $t
			}
			return $t; //devolvemos el array de objetos
		}
	}
			
    ?>