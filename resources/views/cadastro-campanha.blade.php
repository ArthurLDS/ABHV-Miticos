<!DOCTYPE html>
<html>
<head>
	<title>Colabora.ai</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand nav-title" href="#">
	  	<i class="fas fa-heart"></i>
	  	Colabora.ai
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Criar campanha</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Colaborar
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#">Nossa missão</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Faça sua pesquisa aqui" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
	    </form>
	  </div>
	</nav>


	<section class="container-fluid">
		<header class="col-md-12  header-page">
			<h3>
				<i class="fa fa-calendar"></i>
				Cadastre aqui sua Campanha
			</h3>
			<p>Fale um pouco sobre seu evento</p>
			<hr/>
			<br/>
		</header>
		<article class="col-md-12" style="margin-bottom: 20px">
			<article class="row">
				<form name="formEvento" style="display: contents">
					<article class="col-md-6">
						<h4>
						  <i class="fas fa-info-circle"></i>
						  Informações gerais
						</h4>
						<br/>
							<div class="form-group">
								<input type="text" name="responsavel" required class="col-md-12 form-control " placeholder="Responsável pelo evento" />
							</div>
							<div class="form-group">
								<select class="col-md-12 form-control" name="tipoEvento" required id="exampleFormControlSelect1">
							      <option disabled selected value>Selecione uma opção </option>
							      <option value="1">Arrecadação de alimentos</option>
							      <option value="2">Doação de agasalhos</option>
							      <option value="3">Arrecadação de insumos básicos em geral</option>
							      <option value="4">Outros</option>
							    </select>
							</div>
							<div class="form-group">
								<input type="date" name="dataEvento" required class="col-md-12 form-control" placeholder="Data do evento"/>
							</div>
							<div class="form-group">
								<input type="text" name="endereco" required class="col-md-12 form-control" placeholder="Endereço do evento"/>
							</div>
							<div class="form-group">
								<input type="text" name="cidade" required class="col-md-12 form-control" placeholder="Cidade"/>
							</div>
							<div class="form-group">
								<textarea id="message" rows="6" required class="col-md-12 form-control" name="objetivoEvento" placeholder="Qual o objetivo do seu evento?"></textarea>
							</div>
					</article>
					<article class="col-md-6">
						 <article class="row">
							 <article class="col-md-12">
							 <h4><i class="fas fa-map-marker-alt"></i> Visualização do local de seu evento</h4>
							 <br/>
							 <div id="map"></div>
							 </article>	
						 </article>
					</article>	
					<footer class="col-md-12">
						<button class="btn btn-success" type="submit" onClick="criarEvento()">
						 	<i class="far fa-paper-plane"></i>
						 	Enviar para análise
						</button>
						<button type="reset" class="btn btn-danger">
						 	<i class="fa fa-times"></i>
						 	Sair
						</button>
					</footer>
				</form>
			</article>
		</article>

	</section>

	 <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -29.6509722, lng: -50.775784400000006},
          zoom: 14
        });
      }
    </script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6KW3myZYqjl-bYCZ6FIkLVW43f9Oq9wU&callback=initMap"
    async defer></script>
   	<script type="text/javascript" src="js/cadastroCampanhas.js"></script>
</body>
</html>