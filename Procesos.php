<?php 
	
	class Procesos
	{
		Public function login($correo,$contrasena)


		{
			require_once("conexion.php");

				$consulta=mysqli_query($con,"SELECT * FROM usuarios");

				foreach ($consulta as $usuario)
				{
					$acceso=0;

					if ($usuario["Correo"]==$correo && $usuario["contrasena"]==$contrasena)
					{
						$acceso= 1;

					}
				}
				return $acceso;

		}

		public function CerrarSesion()
		{
			session_destroy();
			header("location: ../pages/");
		}
		public function Get_usuarios()

		{
				require_once("conexion.php");

				$consulta=mysqli_query($con,"SELECT * FROM usuarios");
				return mysqli_fetch_all($consulta, MYSQLI_ASSOC);
				
		}
		public function Registrar($nombre,$correo,$contrasena)
		{	
			
			
			$contadorDeErrores = 0;
			foreach ($this->Get_usuarios() as $usuario) {
				if ($usuario["Correo"]==$correo) {
					$contadorDeErrores=$contadorDeErrores + 1;
				}
			}

			if ($contadorDeErrores == 0 ) 
			{
			require_once("conexion.php");
   			$consulta=mysqli_query($con,"INSERT INTO usuarios (Nombre,Correo,contrasena)VALUES('$nombre','$correo','$contrasena')");
   			$pase = 1;
   			return $pase;

   			}
   			else 
   			{
   			$pase = 0;
   			return $pase;
   			}
			


		}

	}


 ?>