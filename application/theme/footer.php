	</main>
	<footer id="footer">
		<div class="container">
			<nav id="footer-nav">
				<ul class="clearfix">
					<li><a href="<?php echo BASE_URL; ?>mentions.php">Mentions légales</a></li>
					<li><a href="<?php echo BASE_URL; ?>cgv.php">C.G.V.</a></li>
					<li><a href="<?php echo BASE_URL; ?>plan.php">Plan du site</a></li>
					<li><a href="<?php echo BASE_URL; ?>#">Imprimer la page</a></li>
					<li><a href="<?php echo BASE_URL; ?>newsletter.php">S'inscrire à la newsletter</a></li>
					<li><a href="<?php echo BASE_URL; ?>contact.php">Contact</a></li>
				</ul>
			</nav>
		</div>
	</footer>
	<script src="<?php echo BASE_URL; ?>assets/js/jquery.js"></script>
	<?php if(substr(strrchr($_SERVER['PHP_SELF'], "/"), 1) == "reservation_details.php"): ?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&language=fr"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/app.js"></script>
	<?php endif; ?>

	<?php if(substr(strrchr($_SERVER['PHP_SELF'], "/"), 1) == "contact.php"): ?>
	<script src="<?php echo BASE_URL; ?>assets/js/contactme.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>assets/js/jqBootstrapValidation.js"></script>
	<?php endif; ?>
	</body>
</html>