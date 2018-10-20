<?php
$titulocms = 'Fucking CMS';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $titulocms ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('dashboard.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <div class="container-fluid">
        <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Gestor</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Pesquisar">
            <ul class="navbar-nav px-3">
              <li class="nav-item text-nowrap">
                <a class="nav-link" href="../acesso/login.php">Sair</a>
            </li>
            </ul>
        </nav>
        <!-- side bar -->
        
        <!-- side bar -->
        <div class="row">
            <?= $this->fetch('content') ?>
        </div>
    </div>
<footer>
</footer>
<?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('popper.min.js') ?>
</body>
</html>


