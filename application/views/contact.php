<div id="page-contact">
	<?php
		echo heading("Page $nom_page", 1);
		echo form_open('page/contact');
	?>
	<p>
		<label for'username'>username</label>
		<?= form_input(array('name'=>'email','value'=>'','class'=>'username textbox','style'=>'width:150px;')); ?>
	</p>
	<p>
		<label for'password'>password</label>
		<?= form_password(array('name'=>'password','value'=>'','class'=>'password textbox')); ?>
	</p>
	<p>
		<?= form_submit('submit','Login','id="submit"'); ?>
	</p>
	<?= form_close("\n"); ?>
</div>