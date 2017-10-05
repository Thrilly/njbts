<?php include ("0-config/config.php") ?>
<?php 
if (isset($_GET['send'])){
	mailing();
}
?>
<!DOCTYPE html>
<html lang="en">
  <?php Head("Nicolas JOACHIM"); ?>

<body>
  	<div>

	  <!-- Modal content -->
	  <div class="modal-content">
	    <div class="modal-header">
	      <h3>SITE EN MAINTENANCE</h3>
	    </div>
	    <div class="modal-body">
		    <div class="row">
		    <br> 	
		    <h2 class="text-center"><i class="fa fa-cog" aria-hidden="true"></i> Oops, Le site Port-Folio est encore en maintenance...</h2>
		    <br><hr><br>
		    <?php 
		    if (isset($_GET['send'])){
		    ?>
		    	<p class="text-center text-success"><i class="fa fa-check text-success" aria-hidden="true"></i> <b>Votre Message à été envoyé !<b></p>
		    <?php 
		    }else{
		    ?>
		    	<p class="text-center">Pour me contacter, veuillez remplir le formulaire ci-dessous :</p>
		    <?php
		    } 
		    ?>
		    <br>
			    <form action="?send=1" method="POST">
			      	<div class="col-md-6">
			      		<div class="row text-center">
			      			<!-- <label>Nom</label><br> -->
			      			<input class="form-control contact" type="text" name="nom" placeholder="Nom *" required>
			      		</div>
			      		<div class="row text-center">
			      			<!-- <label>Nom</label><br> -->
			      			<input class="form-control contact" type="email" name="email" placeholder="Email *" required>
			      		</div>
			      	</div>
			      	<div class="col-md-6">
			      		<div class="row text-center">
			      			<!-- <label>Prénom</label><br> -->
			      			<input class="form-control contact" type="text" name="pnom" placeholder="Prénom *" required>
			      		</div>
			      		<div class="row text-center">
			      			<!-- <label>Nom</label><br> -->
			      			<input class="form-control contact" type="text" max="10" name="tel" placeholder="Téléphone">
			      		</div>
			      	</div>
	    	</div>
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="row text-center">
				      	<div class="col-md-offset-1 col-md-10">
				      		<input class="form-control" type="text" name="subject" placeholder="Votre Sujet ici *" required></textarea>
				      	</div>
			    	</div>
		    	</div>
		    	<div class="col-md-12">
		    		<div class="row text-center">
				      	<div class="col-md-offset-1 col-md-10">
				      		<textarea class="form-control" type="text" name="msg" placeholder="Votre message ici *" required></textarea>
				      	</div>
			    	</div>
		    	</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
				    	<div class="col-md-offset-5 col-md-2">
				    		<button type="submit" class="btn btn-primary text-center">Envoyer</button>
				    	</div>
					</div>
				</div>
		    	</form>
			</div>
			<div class="row">
				<div class="col-md-12">
				<br><hr><br>
				<p class="text-center">Pour voir ou télécharger les rapports de stages, cliquez ci-dessous</p>
				<br><br>
					<div class="row text-center">
				    	<div class="col-md-6">
				    		<a href="doc/Stage-1.pdf"><i class="fa fa-file-pdf-o fa-4x" aria-hidden="true"></i><br>Stage de 1ère année</a>
				    	</div>
				    	<div class="col-md-6">
				    		<a href="doc/Stage-2.pdf"><i class="fa fa-file-pdf-o fa-4x" aria-hidden="true"></i><br>Stage de 2ème année</a>
				    	</div>
					</div>
					<br><br>
		    	</div>
			</div>
	    </div>
	    <div class="modal-footer">
	      	<p>njbts &copy;</p>
	    </div>
  	</div>
</div>
  </body>
</html>
