<?php session_start(); ?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#"><img class="w-25 img-fluid" src="img/avatar/avatar_default.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto text-center">
        <li class="nav-item active">
        	<a class="nav-link" href="index.php">Accueil</a>
        </li>
        <?php if (!empty($_SESSION) && isset($_SESSION['user']['role'])) {
				if ($_SESSION['user']['role'] == 'admin') { ?>
		<li class="nav-item">
	       	<a class="nav-link btn bg-danger text-white mr-3" href="admin/">Admin</a>
	    </li>
		<?php
				} 
			} else { ?>
        <li class="nav-item">
			<form action="inc/login.php" method="POST">
			<div class="dropdown mr-1">
			<button type="button" class="btn btn-warning dropdown-toggle p-2" id="dropdownMenuOffset" data-toggle="dropdown" aria-expanded="false" data-offset="10,20">
			  Connexion
			</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
				  	<li>
				      	<a class="dropdown-item" href="#">
				      		<div class="input-group mb-3">
				  				<span class="input-group-text" id="basic-addon1">@</span>
				  				<input type="text" name="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
							</div>
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="#">
							<div class="input-group mb-3">
				  				<span  class="input-group-text" id="basic-addon1">&#128274;</span>
				  				<input type="password" name="password" class="form-control" placeholder="Mot de passe" aria-label="Username" aria-describedby="basic-addon1">
							</div>
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="#">
							<button type="submit" class="btn btn-dark">Connexion</button>
						</a>
					</li>
				</ul>
			</div>
			</form>
        </li>
        <li class="nav-item">
	       	<a class="nav-link btn bg-success text-white mr-3" href="admin/inscription.php">Inscription</a>
	    </li>
        <?php	} ?>
      </ul>
    </div>
  </div>
</nav>

	