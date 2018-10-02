<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\themes\adminLTE\assets\AdminlteAsset;
/* @var $this \yii\web\View */
/* @var $content string */
AdminlteAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="skin-blue sidebar-mini">

<?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>A</b>LT</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>Концерты</b></span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <div class="navbar-custom-menu">
                 
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?=Yii::$app->user->identity->name ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?= 'http://' . $_SERVER['SERVER_NAME'] ?>/images/nouser.png" class="img-circle" alt="User Image"/>
                            <p> <?=Yii::$app->user->identity->name ?> </p>
                        </li>
                        <li class="user-footer">
                            
                            <div class="pull-right">
                                <?= Html::a(
                                    'Выход',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
                
            </ul>
                  
              </div>
            </nav>

        </header>

        <?= $content ?>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <?php echo Yii::powered(); ?>
            </div>
            Copyright &copy; <?php echo date('Y'); ?> by My Company. All Rights Reserved.
        </footer>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
