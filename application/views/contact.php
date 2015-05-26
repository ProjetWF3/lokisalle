<div id="page-contact">
	<div id="contenu">
		<?php
			echo heading("Page $nom_page", 1);

			echo form_open('form/valid_form');

	  		echo form_label('Sujet', 'sujet');
	  		$sujet = array( 
				'name'=>'sujet',				 
				'id'=>'sujet',				 
				'placeholder'=>'Sujet',				 
				'value'=>set_value('sujet')				 
			);
	  		echo form_input($sujet);

	  		echo form_label('Message', 'message');
	  		$message = array( 
				'name'=>'message',				 
				'id'=>'message',				 
				'placeholder'=>'Message',				 
				'value'=>set_value('message')				 
			);
	  		echo form_input($message);


	  		echo form_close();
		?>
	</div>
</div>