<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<meta name="theme-color" content="#6A205F">
	<meta name="twitter:card" content="summary">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="shortcut icon" href="../../favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" href="style-index.css">

	<title>AdminSite</title>

	<!--Plotly-->
	<script src="https://cdn.plot.ly/plotly-2.24.1.min.js" charset="utf-8"></script>

	<!--Bootstrap con libreria descargada-->
	<!-- <link rel="stylesheet" type="text/css" href="../../php/graficas/librerias/bootstrap/css/bootstrap.css"> -->
	
	<!--JQuery-->
	<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


</head>

<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="page.php"> <img src="../../img/logo_mascota.png" class="logo" alt="logo"></a>
		<ul class="side-menu">
			<li><a href="page.php" class="active"><i class='bx bxs-dashboard icon'></i> Administrador</a></li>
			<li class="divider" data-text="Cuerpo">Main</li>
			<li><a href="page.php"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="user.php"><i class="fa fa-user"></i> Usuarios</a></li>
			<li><a href="mascotas.php"><i class="fa fa-dog"></i> Mascotas</a></li>
			<li><a href="user-adop.php"><i class="fa fa-paw"></i> Adoptantes</a></li>
			<li class="divider" data-text="Otros"></li>
			<li><a href="#data"><i class="fa fa-chart-bar"></i> Gráficos</a></li>
			<li><a href="#"><i class="fa fa-cog"></i> Configuración</a></li>
			<li><a href="#"><i class="fa fa-question-circle"></i> Ayuda</a></li>
		</ul>
		<ul class="salir">
			<li><a href="../../index.php"><i class="fa fa-sign-out-alt"></i> Salir</a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar'></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon'></i>
				</div>
			</form>
			<a href="#" class="nav-link">
				<i class='bx bxs-bell icon'></i>
				<span class="badge">5</span>
			</a>
			<a href="#" class="nav-link">
				<i class='bx bxs-message-square-dots icon'></i>
				<span class="badge">8</span>
			</a>
			<span class="divider"></span>
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
				<ul class="profile-link">
					<li><a href="../../ver-perfil.php"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
					<li><a href="../../editar-perfil.php"><i class='bx bxs-cog'></i> Settings</a></li>
					<li><a href="../../php/cerrarSesion.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->


		<?php
			require_once '../../php/obtenerUsuarios.php';
			require_once '../../php/obtenerMascotas.php';
			require_once '../../php/obtenerVisitas.php';
			require_once './datosGraficaAdopciones.php';

			$nUsuariosActivos = count($usuariosActivos);
			$nMascotasRegistradas = count($mascotasDisponibles);
			$nMascotasDisponibles = count($mascotasDisponibles);
			$nVisitasRegistras=count($visitasRegistradas);

			$nAdopcionesRegistradas=array_sum($cantidades1);
			$nAdopcionesRealizadas=array_sum($cantidades2);
			$nAdopciones=-1;
			if($nAdopcionesRegistradas>$nAdopcionesRealizadas){
				$nAdopciones=$nAdopcionesRegistradas;
			}
			else{
				$nAdopciones=$nAdopcionesRealizadas;
			}
		?>


		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
							<h2><?php echo $nUsuariosActivos; ?></h2>
							<p>Usuarios</p>
						</div>
						<i class='bx bx-trending-up icon'></i>
					</div>
					<span class="progress" data-value="40%"></span>
					<span class="label">40%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2><?php echo $nMascotasRegistradas; ?></h2>
							<p>Mascotas Registradas</p>
						</div>
						<i class='bx bx-trending-up icon'></i>
					</div>
					<span class="progress" data-value="60%"></span>
					<span class="label">60%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2><?php echo $nAdopciones; ?></h2>
							<p>Adopciones</p>
						</div>
						<i class='bx bx-trending-up icon'></i>
					</div>
					<span class="progress" data-value="30%"></span>
					<span class="label">30%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2><?php echo $nVisitasRegistras; ?></h2>
							<p>Visitas</p>
						</div>
						<i class='bx bx-trending-up icon'></i>
					</div>
					<span class="progress" data-value="80%"></span>
					<span class="label">80%</span>
				</div>
			</div>

			<!--Inicio Contenedor Data 1-->
			<div class="data" id="data">
				<!--Inicio Contenedor 1 de graficos-->
				<div class="content-data">
					<div class="head">
						<h3>Usuarios</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<!--Aqui debo agregar los graficos-->
					<div class="chart">
						<div>
							<div id="cargaUsuarios"></div>
						</div>
					</div>
				</div>
				<!--Fin Contenedor 1 de graficos-->

				<!--Contenedor 2 de graficos-->
				<div class="content-data">
					<div class="head">
						<h3>Mascotas</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>

					<!--Aqui debo agregar los graficos-->
					<div class="chart">
						<div>
							<div id="cargaMascotas"></div>
						</div>
					</div>
				</div>
				<!--Fin Contenedor 2 de graficos-->
			</div>
			<!--Fin Contenedor Data 1-->

			
			<!--Inicio-->
				
			<!--Fin-->
			
			
			<!--Inicio Contenedor Data 2-->
			<div class="data">
				<!--Inicio Contenedor 1 de graficos-->
				<div class="content-data">
					<div class="head">
						<h3>Adopciones</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<!--Aqui debo agregar los graficos-->
					<div class="chart">
						<div>
							<div id="cargaAdopciones"></div>
						</div>
					</div>
				</div>
				<!--Fin Contenedor 1 de graficos-->

				<!--Contenedor 2 de graficos-->
				<div class="content-data">
					<div class="head">
						<h3>Visitas</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<!--Aqui debo agregar los graficos-->
					<div class="chart">
						<div>
							<div id="cargaVisitas"></div>
						</div>
					</div>
				</div>
				<!--Fin Contenedor 2 de graficos-->
			</div>
			<!--Fin Contenedor Data 2-->

			<script src="graficas.js"></script>

		</main>
		<!-- MAIN -->

	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="../js/script.js"></script>
</body>

</html>