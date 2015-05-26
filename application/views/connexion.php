<div id="connexion">
	<div class="carre"></div>
    <?php echo heading('connexion', 1); ?>
    	<div id="membre">
    		<p>deja membre</p>
    			<div id="formulaire">
    				<form method="post" action="">
    					<div>
                            <label for="pseudo" id="pseudo">pseudo:</label>
                            <div>
                                <input type="text" name="pseudo" />
                            </div>
                        </div>
                        <div>
                            <label for="Mot de passe" id="Mot de passe">Mot de passe:</label>
                            <div>
                                <input type="password" name="password" />
                                <a href="">Mot de passe oublier</a>
                            </div>
                        </div>
                        <div>
                            <label for="se souvenir de moi" id="se souvenir de moi">se souvenir de moi:</label>
                            <div>
                                <input type="checkbox" name="choix" />
                            </div>
                        </div>
    				</form>
    			</div>
    	</div>
    		<div id="pasMembre">
    			<p>Pas encore membre ?</p>
    			<a href="inscription.php">inscrivez-vous</a>
    		</div>
	






</div>