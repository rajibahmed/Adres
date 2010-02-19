<?php $html->docType('XTHML') ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php

		echo $html->meta('icon');

		echo $html->css('cake.generic');
		
		echo $html->css('jquery-ui-1.7.2.modified');
		
		echo $javascript->link(array(
			'jquery-1.4.1.min',
			'jquery-ui-1.7.2.custom.min'
		));

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $html->link(__('Adres', true), '#'); ?></h1>
		</div>
		<div id="content">

			<?php 
				// if($session->check('Message'))	
					$session->flash();
			?>
			
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
			<?php echo $html->link(
					$html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
					'http://www.cakephp.org/',
					array('target'=>'_blank'), null, false
				);
			?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>