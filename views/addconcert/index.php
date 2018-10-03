<?php
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
//use yii\helpers\Url;
//use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use app\models\Categories;
use app\models\Users;
use app\models\Tours;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Добавление концерта';
$this->params['breadcrumbs'][] = $this->title;

?>

	<?php $cat_model = new Categories(); ?>
	<?php $user_model = new Users(); ?>
	<?php $tour_model = new Tours(); ?>

	<?php Pjax::begin() ?>
		<?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>
		 <div class = "row">
		 	<div class="col-md-6">
		 		<?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите название концерта'])->label('Название концерта', ['class' => 'label']) ?>
		 	</div>
		 	
		 </div>
		 <div class = "row">
		 	<div class="col-md-6">
				<?=$form->field($model, 'provider')->label('Организатор концерта', ['class' => 'label'])
				    ->radioList([
				        '1' => 'Мы',
				        '2' => 'Конкуренты'
				    ]);
			    ?>
		 	</div>
		 </div>
		 <div class = "row">
		 	<div class="col-md-6">
			 	<?= $form->field($model, 'town')->textInput(['placeholder' => 'Введите город проведения концерта'])->label('Город', ['class' => 'label']) ?>
		 	</div>
		 </div>
		 <div class = "row">
		 	<div class="col-md-6">
			 	<?= $form->field($model, 'venue')->textInput(['placeholder' => 'Введите название площадки'])->label('Место проведения', ['class' => 'label']) ?>
		 	</div>
		 </div>
		 <div class = "row">
		 	<div class="col-md-6">
			 	<?= $form->field($model, 'category_id')->label('Жанр', ['class' => 'label'])->widget(\kartik\select2\Select2::classname(), [
                    'data' => $cat_model::getList(),
                    'options' => [
                        'placeholder' => 'Выберите жанр',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
			</div>&nbsp;&nbsp;
			<?php
			 Modal::begin([
			 'header' => '<h2>Добавление жанра</h2>',
			 'toggleButton' => [
			 'label' => 'Добавить жанр',
			 'tag' => 'button',
			 'class' => 'btn btn-primary minus20',
			 ]
			 ]);
			?>
			 <?php $form = ActiveForm::begin(['id' => 'add-category']); ?>
				 <?= $form->field($cat_model, 'name')->textInput(['autofocus' => true]) ?>
				 <?= Html::submitButton('Добавить', ['class' => 'btn btn-success', 'name' => 'add-category']) ?>
			 <?php ActiveForm::end(); ?>
			<?php Modal::end(); ?>

			<?php if(Yii::$app->session->hasFlash('success')): ?>
			<div class="col-md-6 col-md-offset-3">
				<div class="alert alert-success alert-dismissible" role="alert">
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">Закрыть&times;</span></button>
					 <?php echo Yii::$app->session->getFlash('success'); ?>
				</div>
			</div>
			<?php elseif(Yii::$app->session->hasFlash('error')): ?>
			<div class="col-md-6 col-md-offset-3">
				<div class="alert alert-error alert-dismissible" role="alert">
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">Закрыть&times;</span></button>
					 <?php echo Yii::$app->session->getFlash('error'); ?>
				</div>
			</div>
			<?php endif;?>
		 </div>
		 <div class = "row">
		 	<div class="col-md-6">
			 	<?= $form->field($model, 'admin_id')->label('Ответственный администратор', ['class' => 'label'])->widget(\kartik\select2\Select2::classname(), [
                    'data' => $user_model::getList(),
                    'options' => [
                        'placeholder' => 'Выберите администратора',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
			</div>
		 </div>
		 <div class = "row">
		 	<div class="col-md-6">
			 	<?= $form->field($model, 'tour_id')->label('Название тура', ['class' => 'label'])->widget(\kartik\select2\Select2::classname(), [
                    'data' => $tour_model::getList(),
                    'options' => [
                        'placeholder' => 'Выберите тур',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>

			</div>
		 </div>
		<div class = "row">
			<div class="col-md-6">
			 	<?= $form->field($model, 'sum')->textInput(['placeholder' => 'Введите сумму на которую продано билетов'])->label('Сумма проданных билетов', ['class' => 'label']) ?>
			</div>
		 </div>
		 <div class = "row">
		 	<div class="col-md-6">
			 	<?= $form->field($model, 'tickets')->textInput(['placeholder' => 'Введите количество проданных билетов', 'type' => 'number', 'min' => 1])->label('Количество проданных билетов', ['class' => 'label']) ?>
			</div>
		 </div>
		 <div class = "row">
		 	<div class="col-md-6">
		 		<?= $form->field($model, 'time')->label('Время проведения концерта', ['class' => 'label'])->widget(TimePicker::classname(), [
	                    'options' => ['placeholder' => 'Выберите время проведения концерта'],
	                    'pluginOptions' => [
	                        'showSeconds' => false,
	                        'minuteStep' => 5,
	                        'showMeridian' => false,
	                    ]
	                ]) 
	            ?>
		 	</div>
		 	
		 </div>
		 <div class = "row">
		 	<div class="col-md-6">
			 	<?= $form->field($model, 'date')->label('Дата проведения концерта', ['class' => 'label'])->widget(DatePicker::classname(), [
	                    'options' => ['placeholder' => 'Выберите дату'],
	                    'layout' => '{picker}{input}',
	                    'pluginOptions' => [
	                        'autoclose'=>true,
	                        'format' => 'dd.mm.yyyy',
	                        //'startView'=>'year',
	                    ]
	                ]) 
	            ?>
	        </div>
		 </div>
        	<?= Html::submitButton('Добавить', ['class' => 'btn btn-lg btn-primary']) ?>
		<?php ActiveForm::end(); ?>
	<?php Pjax::end() ?>    

		
		<div id="add-category" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
		      	<div class="modal-content">
				    <div class="modal-body">
				    <?php Pjax::begin() ?> 
					<?php $cat_form = ActiveForm::begin(['options' => ['class' => 'form-horizontal', 'data-pjax' => true]]) ?>
						<?= $cat_form->field($cat_model, 'name')->textInput(['placeholder' => 'Введите название жанра'])->label('Название жанра') ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
						<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
					</div>
				</div>
				<?php ActiveForm::end() ?>
				<?php Pjax::end() ?> 
			</div> 	
		</div>
	