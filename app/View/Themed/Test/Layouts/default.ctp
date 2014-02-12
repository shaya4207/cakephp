<html>
    <head>
        <title><?php echo $title_for_layout; ?></title>
        <?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('global');

		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
    </head>
    <body>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'); ?>
        <?php echo $this->Html->script('global'); ?>
    </body>
</html>