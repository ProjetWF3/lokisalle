<h1>Welcome to CodeIgniter!</h1>

<div id="body">
	<p>Page de <?php echo $nom_page; ?></p>
</div>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>