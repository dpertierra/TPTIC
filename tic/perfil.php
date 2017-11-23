<?php
	require_once("funcionesGraficas.php");
	require_once("functionDB.php");

	$users = selectUsuario($_GET['id']);
	$user = $users[0];

	$mjs = traerMensajes($_GET['id']);
	$comen = isset($_POST['txtComentario']) ? $_POST['txtComentario'] : '';
	if ($_POST) {
		$fecha=date("Y-m-d H:i:s");
		insertMensaje($comen,$_COOKIE['logged'],$user['idUsuarios'],$fecha);
		

	}
 ?>

<html lang="en">
  <head>
		<?php headerHTML("Perfil"); ?>
  </head>
  <body>
	<?php aperturaHTML(); ?>
	<div class="container">
		<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="http://placehold.it/300x300<?php /*echo $user['Foto']*/;?>" style="height:300px;width:300px;" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h1><b><?php echo $user['nombre'] . " " . $user['apellido']/* echo "Ian Rossi"*/;?></b></h1>
                        <h3><i><b>@<?php  echo $user['user'];/* echo "ianfrossi"*/?></b></i></h3>
												<h4><b>Correo:</b> <?php echo $user['mail']/* echo "ianfrossi@gmail.com"*/;?></h4>
												<h4><b>Sexo:</b> <?php if($user['sexo'] == 0){echo "Masculino";}else{echo "Femenino";}/* echo "Masculino"*/;?></h4>
												<h4><b>Fecha de nacimiento:</b> <?php echo $user['birthday']/* echo "31-03-2000"*/;?></h4>
												<h4><b>Descripción</h4>
												<h5><?php echo $user['Bio'];?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
		<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="well well-sm">
							<div class="well well-sm">
								<?php
								if (count($mjs) > 0){
									foreach ($mjs as $mj) {
										$userManda = selectUsuario($mj['idEnvia']);
										$elUserManda = $userManda[0];

										echo '<h4><a target="_blank" href="perfil?id='.$mj['idEnvia'].'">@'.$elUserManda['user'].'</a>'.' a las '.$mj['fechayhora'].'</h4>';
										echo $mj['mensaje'].'<br>';
									}
								}
								 ?>
							</div>
							<?php if (isset($_COOKIE['logged'])){?>
							<form action="" method="POST">
								<div class="well well-sm">
										<div class="row">
											<textarea rows="8" cols="65" maxlength="254" style="width:96%;resize:none;display: block;margin-left: auto;margin-right: auto;" name="txtComentario" id="descr"></textarea>
										</div>
										<button type="submit" style="background:#4286f4;color:white;margin-top:25px;" class="btn btn-default">Enviar comentario</button> <br>
								</div>
							</form><?php } else {?>
								<div class="well well-sm">
										<div class="row">
											<p style="text-align:center;"><b>¡Tenés que iniciar sesión para comentar!</b></p>
										</div>
								</div> <?php } ?>
            </div>
        </div>
    </div>
	</div>
	<?php footerHTML(); ?>
<?php cierreHTML(); ?>
  </body>
</html>
