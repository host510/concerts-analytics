<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\themes\adminLTE\components\ThemeNav;

?>
<?php $this->beginContent('@app/themes/adminLTE/layouts/main.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

     <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
          <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user_accounts.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>
                      <?php
                          $info = [];

                          if(isset(Yii::$app->user->identity->name))
                              $info[] = ucfirst(\Yii::$app->user->identity->name);

                          echo implode(' ', $info);
                      ?>
                    </p>
                    
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php
            if(isset(Yii::$app->user->identity->id)) 
            {
                echo app\widgets\Menu::widget([
                  'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                  'items' => [
                      ['label'=>Yii::t('app','МЕНЮ'), 'options'=>['class'=>'header']],
                      ['label' => 'Главная', 'icon' => 'home','url' => ['/']],
                      ['label' => 'Аналитика', 'icon' => 'area-chart','url' => ['/analytics']],
                      ['label' => 'Концерты',
                        'icon' => 'cube',
                        'url' => '#',
                        'items' => [
                          ['label' => 'Добавить', 'icon' => 'book', 'url' => ['/addconcert'],],
                          ['label' => 'Наши концерты', 'icon' => 'filter', 'url' => ['/ours'],],
                          ['label' => 'Концерты конкурентов', 'icon' => 'filter', 'url' => ['/competitors'],],
                        ],
                      ]
                  ]
                ]);
            }
            else{
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu', 'options' => ['class' => 'header']],
                            ['label' => 'Signup', 'icon' => 'sign-in', 'url' => ['site/signup']],                            
                        ],
                    ]
                );
            }
            
            ?>

        </section>
  <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">

   <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1> <?php echo Html::encode($this->title); ?> </h1>
           <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $content; ?>
    </section><!-- /.content -->

</div><!-- /.right-side -->
<?php $this->endContent();