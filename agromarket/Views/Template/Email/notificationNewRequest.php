<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Nueva solicitud de voluntariado</title>
	<style type="text/css">
		p {
			font-family: arial;
			letter-spacing: 1px;
			color: #7f7f7f;
			font-size: 15px;
		}

		a {
			color: #3b74d7;
			font-family: arial;
			text-decoration: none;
			/*text-align: center;*/
			display: block;
			font-size: 15px;
		}

		.x_sgwrap p {
			font-size: 20px;
			line-height: 32px;
			color: #244180;
			font-family: arial;
			text-align: center;
		}

		.x_title_gray {
			color: #0a4661;
			padding: 5px 0;
			font-size: 15px;
			border-top: 1px solid #CCC;
		}

		.x_title_blue {
			padding: 08px 0;
			line-height: 25px;
			text-transform: uppercase;
			border-bottom: 1px solid #CCC;
		}

		.x_title_blue h1 {
			color: #0a4661;
			font-size: 25px;
			font-family: 'arial';
		}

		.x_bluetext {
			color: #244180 !important;
		}

		.x_title_gray a {
			text-align: center;
			padding: 10px;
			margin: auto;
			color: #0a4661;
		}

		.x_text_white a {
			color: #FFF;
		}

		.x_button_link {
			width: 100%;
			max-width: 470px;
			height: 40px;
			display: block;
			color: #FFF;
			margin: 20px auto;
			line-height: 40px;
			text-transform: uppercase;
			font-family: Arial Black, Arial Bold, Gadget, sans-serif;
		}

		.x_link_blue {
			background-color: #307cf4;
		}

		.x_textwhite {
			background-color: rgb(50, 67, 128);
			color: #ffffff;
			padding: 10px;
			font-size: 15px;
			line-height: 20px;
		}
	</style>
</head>

<body>
	<table align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="text-align:center; background-image: url();">
		<tbody>
			<tr>
				<td>
					<div class="x_sgwrap x_title_blue">
						<h1><?= NOMBRE_EMPESA ?></h1>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<p>Un usuario se ha inscrito para formar parte del programa de voluntariado, por favor ingrese al sistema para procesar su solicitud.</p>
				
					<div style="border: 4px solid #000000; background-image: url('https://i.pinimg.com/736x/dc/c1/62/dcc1621b26f6f5182320404bc495b4d2.jpg');">
						    <div style="text-align: center; font-size: 30px;">
						 <strong>Información personal de posible voluntario</strong></p> 
						 <br>
						 </div>
					
					
						<!--<div style="border: 4px solid #000000; background-image: url("https://i.pinimg.com/736x/dc/c1/62/dcc1621b26f6f5182320404bc495b4d2.jpg"); background-size: 600px;background-repeat-y: no-repeat;">-->
					
					
					
					
						 <div style="text-align: justify;">
						     
						     <DIV style="border: 2px solid #000000;  width: 300px; margin: 0 auto;background: #376d89;">
						         
						            <div style="text-align: center; font-size: 15px;">
						 <strong>Datos personales</strong></p> 
						 <br>
						 </div>
						     
							Nombre:<?= $dataEmail['vol_nombre']; ?>
							<br>
							Genero:<?= $dataEmail['vol_genero']; ?>
							<br>
							Fecha de nacimiento:<?= $dataEmail['vol_fecha_nacimiento']; ?> (<?= $dataEmail['vol_edad']; ?> años)
							<br>
							</DIV>
							<br>
							
							 <DIV style="border: 2px solid #000000;  width: 300px; margin: 0 auto;background: #376d89;">
							
							          <div style="text-align: center; font-size: 15px;">
						 <strong>Contactos</strong></p> 
						 <br>
						 </div>
								Teléfono celular:<?= $dataEmail['vol_telefono']; ?> <br>
							Correo:<a href="mailto:<?= $dataEmail['vol_correo']; ?>"><?= $dataEmail['vol_correo']; ?></a> 
					
							<br>
							
								</DIV>
								<br>
							
							
								 <DIV style="border: 2px solid #000000;  width: 300px; margin: 0 auto;background: #376d89;">
								    		          <div style="text-align: center; font-size: 15px;">
						 <strong>Ubicación</strong></p> 
						 <br>
						 </div>
							
							<?= $dataEmail['vol_residencia']; ?>
							<br>
								</DIV>
							<br>
							<br>
							</div>

						</p>
						</div>
						<!-- <table cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="justify">
							<tbody>
								<thead>
									<tr>
										<th align="justify">
											<strong>Datos</strong>
										</th>
									</tr>
								</thead>
								<tr>
									<td colspan="3" align="justify">Nombre: <?= $dataEmail['vol_nombre']; ?></td>
									<td colspan="2" align="justify">Cedula: <?= $dataEmail['vol_cedula']; ?></td>
								</tr>
								<tr>
									<td colspan="3" align="justify">Genero: <?= $dataEmail['vol_genero']; ?></td>
									<td colspan="2" align="justify">Fecha de nacimiento: <?= $dataEmail['vol_fecha_nacimiento']; ?> (<?= $data['vol_edad']; ?> años)</td>
								</tr>
								<tr>
									<td colspan="3" align="justify">Correo: <a href="mailto:<?= $dataEmail['vol_correo']; ?>"><?= $dataEmail['vol_correo']; ?></a>.</td>
									<td colspan="2" align="justify">Teléfono celular: <a href="tel:<?= $dataEmail['vol_telefono']; ?>"><?= $dataEmail['vol_telefono']; ?></a>.</td>
								</tr>
								<tr>
									<td colspan="5" align="justify">Lugar de residencia: <?= $dataEmail['vol_residencia']; ?>.</td>
								</tr>
							</tbody>
						</table> -->
					</div>
				<div style="text-align: center;">
					<p class="x_text_white" >
						<a href="<?= $dataEmail['url_proccess']; ?>" target="_blank" class="x_button_link x_link_blue">Procesar Solicitud</a>
					</p>
			</div>
					<br>
					<p>Si no te funciona el botón puedes copiar y pegar la siguiente dirección en tu navegador:</p>
					<span><?= $dataEmail['url_proccess']; ?></span>
					<p class="x_title_gray"><a href="<?= WEB_EMPRESA; ?>" target="_blanck"><?= WEB_EMPRESA; ?></a></p>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>