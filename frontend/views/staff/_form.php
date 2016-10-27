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

                <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Name (*)') ?>

                <?= $form->field($model, 'age')->textInput()->label('Age (*)') ?>

                <?= $form->field($model, 'gender')->radioList(['Male'=>'Male', 'Female' =>'Female'])->label('Gender (*)'); ?>

                <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Address (*)') ?>

                <?= $form->field($model, 'position')->dropDownList(['Director' => 'Director', 'Project Manager' => 'Project Manager', 'Team Leader' => 'Team Leader', 'Bridge System Engineer' => 'Bridge System Engineer', 'Accountant' => 'Accountant', 'Developer' => 'Developer', 'Internship' => 'Internship'], ['prompt' => 'Select position'])->label('Position (*)') ?>

                <?= $form->field($model, 'avatar')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*'],])->label('Avatar') ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
</div>


