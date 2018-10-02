<!-- 		<div id="add-category" class="modal fade" tabindex="-1" role="dialog">
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
		</div> -->