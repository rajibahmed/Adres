<html>
	<head>
		<?php echo $html->charset(); ?>
		<title>
			<?php __('Adres the Adress Book',true); ?>
			<?php #echo $title_for_layout; ?>
		</title>
		
		<?php echo $html->meta('icon') ?>
			
		<?php	echo $html->css('blueprint/screen','stylesheet',array('media'=>'screen, projection')) ?>
	
		<?php	echo $html->css('blueprint/print','stylesheet',array('media'=>'print')) ?>
		
		<!--[if lte IE 7]>
		<?php	echo $html->css(array('blueprint/ie')) ?>		
		<![endif]-->
		<?php echo $html->css(array(
				'adres.default',
				'jquery-ui-1.7.2.modified'
			)) ?>
			
		<?php	echo $javascript->link(array(
				'jquery-1.4.2.min',
				'jquery-ui-1.8.custom.min',
				'jquery.blockUI.js',
				'jquery.ba-bbq.min',
				'jquery.cookie',
				'jquery.jstree',
				'jquery.validate.pack',
				'adres.core'
			));
			
			
			#echo $scripts_for_layout;
		?>
	</head>
	<body>
		<div class="container">