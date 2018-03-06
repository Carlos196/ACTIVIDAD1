<?php  
include  ("conexion.php");
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$correo=$_POST['correo'];
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$telefono=$_POST['telefono'];
//consulta para insertar los datos
$insertar="INSERT INTO usuarios (Id,Nombres,Apellidos,Correo,Usuario,Contrasena,Telefono) VALUES ($id,'$nombre','$apellidos','$correo','$usuario','$contrasena','$telefono')";
//verificar usuario
 $verificar_usuario=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario='$usuario'") ;
 if (mysqli_num_rows($verificar_usuario)>0) {
 	echo "error: el usuario ya esta registrado en nuestra bas de datos";
 	exit;
 }
 
 //verificar correo
 $verificar_correo=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Correo='$correo'") ;
 if (mysqli_num_rows($verificar_correo)>0) {
 	echo "error: este correo ya esta registrado en nuestra bas de datos";
 	exit;
 }
 //verificar_identificación
 $verificar_identificación=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Id='$id'") ;
 if (mysqli_num_rows($verificar_identificación)>0) {
 	echo "error: ya hay un usuario con esta identificacion";
 	exit;
 }
 //ejecutar la consulta
 $resultado=mysqli_query($conexion,$insertar) ;

if ($resultado) {
	echo "los datos fueron ingresados exitosamente";
	
}else {
	echo "error al insertar los datos en la base de datos";
	

}
mysqli_close($conexion);
?>