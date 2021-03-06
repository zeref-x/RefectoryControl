<!doctype html>
<html lang="pt-br">
  <head>
	<title>Erro</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
  #cont{
	  margin: 10%;
  }
  </style>
  <body id="cont">
		<div class="container" >
		<h1>Ocorreu um pequeno erro!</h1>
  			<div class="text-center">
			  <img src="images/erro.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
			</div>
		<h3 onclick="$('#stacktrace').show('slow');" class="well" style="cursor: pointer;"><?php $this->eprint($this->message); ?></h3>

		<p>You may want to try returning to the the previous page and verifying that
		all fields have been filled out correctly.</p>

		<p>If you continue to experience this error please contact support.</p>

		<div id="stacktrace" class="well hide">
			<p style="font-weight: bold;">Stack Trace:</p>
			<?php if ($this->stacktrace) { ?>
				<p style="white-space: nowrap; overflow: auto; padding-bottom: 15px; font-family: courier new, courier; font-size: 8pt;"><pre><?php $this->eprint($this->stacktrace); ?></pre></p>
			<?php } ?>
		</div>

			<span>
				<button type="button" class="btn btn-warning">
					<h1>
						<a href="loginform" class="text-dark">Voltar</a>
					</h1>
				</button>
			</span>

		</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>