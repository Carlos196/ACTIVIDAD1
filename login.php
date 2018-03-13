<?php 
session_start();

	require_once("../config/Procesos.php");
	$adulis= new Procesos();
 	$error=0;
 	$mensajeError=0;
	if (isset($_SESSION["usuario_logueado"])) 
	
	{
        header("location: ../pages/");

        
    }

    if (isset($_POST["login"])) 

   {
   	$correo=$_POST["email"];
   	$contrasena=$_POST["password"];

    $proceso_login=$adulis->login($correo,$contrasena);

   

    if ($proceso_login==1) {
    	$_SESSION["usuario_logueado"]=$correo;
    	header("location: ../pages/");
    }
    else{
    	$error=1;
    	?>
    	<META HTTP-EQUIV=Refresh CONTENT="3; URL=../pages/">
    	<?php 

    }
    }

    if (isset($_POST["Registro"])) {
    	$nombre=$_POST["Nombre"];
    	$correo=$_POST["email"];
   		$contrasena=$_POST["password"];
   		$Registro=$adulis->Registrar($nombre,$correo,$contrasena);
   		
   	

   		if ($Registro==1) {
   		$_SESSION["usuario_logueado"]=$correo;
   		header("location: ../pages/");
   		}
   		else{
   			$mensajeError=1;
   			?>
    	<META HTTP-EQUIV=Refresh CONTENT="3; URL=../pages/login.php?Registrarme">
    	<?php 
   		}
   		

    }

 ?>

 <!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Biblia</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ENTRAR</h3>

                        <?php 
                        	if ($error==1) {
                        		?>
                        		<h5 style="color: red;">ERROR AL ENTRAR</h5>
                        		<?php 

                        	}
                        	if ($mensajeError==1) {
                        		?>
                        		<h5 style="color: red;">Este correo ya existe</h5>
                        		<?php 

                        	}

                         ?>
                    </div>
                    <div class="panel-body">

                    	<?php 

                    	if (!isset($_GET["Registrarme"])) {
                     	

                    	 ?>



                        <form method="POST" action="" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               <center> <a href="../pages/login.php?Registrarme">Registrarme</a></center><br>
                                <button class="btn btn-lg btn-success btn-block" type="submit" name="login">Entrar</button>
                               </fieldset>
                        </form>

                        <?php 


                        }
                        else{

                        	?>
                        	<form method="POST" action="" role="form">
                            <fieldset>

                            	<div class="form-group">
                                    <input class="form-control" placeholder="Nombre" name="Nombre" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               <center> <a href="../pages/login.php">Iniciar Sesión</a></center><br>
                                <button class="btn btn-lg btn-success btn-block" type="submit" name="Registro">Registrarme</button>
                               </fieldset>
                        </form>

                        	<?php 



                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
