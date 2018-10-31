<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="static/css/bootstrap.min.css">
	<link href="static/fontawesome/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="static/css/style.css">
</head>

<body>
	<div id="wrapper">
		<div class="sidenav">
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a href="index.html">
								<i class="fas fa-home"></i> &nbsp;Home</a>
						</h4>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title ">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
								<i class="fas fa-chevron-right"></i> &nbsp;Cadastros</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="list-group">
								<a href="template/Funcionario.html" class="list-group-item">Funcionário</a>
								<a href="template/Modulo.html" class="list-group-item">Módulo</a>
								<a href="template/Inversor.html" class="list-group-item">Inversor</a>
								<a href="template/Irradiacao.php" class="list-group-item">Irradiação</a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a href="template/Cliente.html">
								<i class="fas fa-chevron-right"></i> &nbsp;Orçamento</a>
						</h4>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
								<i class="fas fa-chevron-right"></i> &nbsp;Ordens de Serviço</a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="list-group">
								<a href="template/AbrirOS.php" class="list-group-item">Abrir OS</a>
								<a href="template/MonitorarOS.php" class="list-group-item">Monitorar OS</a>
								<a href="template/BuscarOS.html" class="list-group-item">Pesquisar</a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
								<i class="fas fa-chevron-right"></i> &nbsp;Relatórios</a>
						</h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="list-group">
								<a href="template/RelatorioAcompanhamento.html" class="list-group-item">Acompanhamento</a>
								<a href="template/RelatorioVendas.html" class="list-group-item">Vendas</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="main">
			<h1 class="titulo">Sol Lar</h1>




		</div>

	</div>


</body>
<script src="static/js/jquery.min.js"></script>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/fontawesome/js/all.min.js"></script>

</html>