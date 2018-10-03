<?php

use app\models\Competitors;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Концерты конкурентов';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php $model = new Competitors(); ?>

<div class="row">
	<div class="concerts-container">
		<?php foreach($model::getList() as $item): ?>
		
		<a href = "" class="single-concert">
			<div class="new">Новое</div>
			<div class="forname padding5 oh"><?= $item['name'] ?> </div>
			<div class="fordate padding5 oh">
				<i><?= $item['town'] ?></i>&nbsp;&nbsp;
				<?= $item['date'] ?>	
				</div>
		</a>
		
	<?php endforeach; ?>
	</div>      
</div>