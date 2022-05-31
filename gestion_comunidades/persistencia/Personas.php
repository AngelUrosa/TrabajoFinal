<?php 

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
				$consulta="INSERT INTO personas (nif,id_comunidad, usuario, contraseña, email, trabajador) VALUES (?,?,?,?,?,?)";
				// $idPersona=$p->getPersona();
				$nif=$p->getNif();
				$idComunidad=$p->getIdComunidad();
				$usuario=$p->getUsuario();
				$contraseña=$p->getContraseña();
				$email=$p->getEmail();
				$trabajador=$p->getTrabajador();


				$query=$this->db->preparar($consulta);
				// $query->bindParam(1,$idPersona);
				$query->bindParam(1,$nif);
				$query->bindParam(2,$idComunidad);
				$query->bindParam(3,$usuario);
				$query->bindParam(4,$contraseña);
				$query->bindParam(5,$email);
				$query->bindParam(6,$trabajador);
				

				$query->execute(); //ejecuta la consulta

				$insertado=true; //
				
			} catch (Exception $e){
                $insertado = false;
            }

            return $insertado;

			} 

			public function editUnaPersona(Persona $p){
				
				try {
					$consulta="UPDATE personas SET nif=? ,id_comunidad=? , usuario=? ,contraseña=?, email=?, trabajador=? where id_persona=?";

				
					$nif=$p->getNif();
					$idComunidad=$p->getIdComunidad();
					$usuario=$p->getUsuario();
					$contraseña=$p->getContraseña();
					$email=$p->getEmail();
					$trabajador=$p->getTrabajador();
					$idPersona=$p->getIdPersona();
	
	
					$query=$this->db->preparar($consulta);
					$query->bindParam(1,$nif);
					$query->bindParam(2,$idComunidad);
					$query->bindParam(3,$usuario);
					$query->bindParam(4,$contraseña);
					$query->bindParam(5,$email);
					$query->bindParam(6,$trabajador);
					$query->bindParam(7,$idPersona);
	
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

		public function getPersonaPorUsuarioFA($usuario){
			$error=0;
			try {
				$consulta="SELECT id_persona, nif, id_comunidad, usuario, contraseña, email, trabajador FROM personas where usuario like ?";
			
				$query=$this->db->preparar($consulta);
				$query->bindParam(1,$usuario);
				$query->execute();
				$tPersonas=$query->fetchall();
	
			} catch(Exception $e){
				$error=1;
				return $error;
			}
			return $tPersonas;
		}

		public function borrarPersonaPorId($idPersona){
			try {
				$consulta="DELETE FROM personas where id_persona = ?";
			
				$query=$this->db->preparar($consulta);
				$query->bindParam(1, $idPersona);
				$query->execute();
				
				return $query->rowCount();
	
			} catch(Exception $e){
				$error=1;
				return $error;
			}
		}

		public function getPersonaPorNif($nif){
			try {
				$consulta="SELECT id_persona, id_comunidad, usuario, contraseña, email, trabajador FROM personas where nif=?";
			
				$query=$this->db->preparar($consulta);
				$query->bindParam(1,$nif);
				$query->execute();
				$tPersonas=$query->fetchall();
	
			} catch(Exception $e){
				$error=1;
				return $error;
			}
	
			$t=array();
			foreach ($tPersonas as $fila) {
		
				$fp=new Cliente($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
				array_push($t, $fp);
			}
		
			return $t;
		}

		public function getPersonaPorId($idPersona){
			
			$p = null;

			try {
				$consulta="SELECT id_persona,nif, id_comunidad, usuario, contraseña, email, trabajador FROM personas where id_persona=?";
			
				$query=$this->db->preparar($consulta);
				$query->bindParam(1,$idPersona);
				$query->execute();
				$tPersonas=$query->fetchall();

				if(isset($tPersonas[0])) {
					$p=new Persona($tPersonas[0][0],$tPersonas[0][1],$tPersonas[0][2],$tPersonas[0][3],$tPersonas[0][4],$tPersonas[0][5],$tPersonas[0][6]);
				}
				
			} catch(Exception $e){
				echo $e;

				$error=1;
				return $error;
			}
		
			return $p;
		}
	
	}
    ?>