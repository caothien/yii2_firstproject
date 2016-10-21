<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading">
            <!-- <h3 class="panel-title">Panel title</h3> -->
        </div>
        <div class="panel-body">
            <div class="staff-form">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= Html::img('images/'.$model->avatar, ['width' => '200px']);?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'age')->textInput() ?>

                <?= $form->field($model, 'gender')->radioList(['Nam'=>'Nam', 'Nu' =>'Nu'])->label('Gender'); ?>

                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'position')->dropDownList(['Sep' => 'Sep', 'Nhan vien' => 'Nhan vien'],['prompt'=>'Select Option']) ?>

                <?= $form->field($model, 'avatar')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*'],]) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
</div>


