<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>CakeMovies</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php
		echo $this->Html->meta('icon');

//		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('styles');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body style="background-color: #f7f7f7;">
    <nav class="bg-success-subtle py-4">
        <div class="container-fluid">
            <a class="text-decoration-none text-success" href="<?= Router::url("/", true) ?>">
                <h1 class="text-center">CakeMovies</h1>
            </a>
        </div>
    </nav>

    <div class="py-5">
        <div class="container">
            <?php echo $this->Flash->render(); ?>
        </div>

        <?php echo $this->fetch('content'); ?>
    </div>

    <footer>

    </footer>
</body>
</html>
