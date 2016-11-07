<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaffSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
<div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <!-- <h3 class="panel-title">Panel title</h3> -->
        </div>
        <div class="panel-body">
            <div class="staff-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                    ]); ?>

                    <!-- <?= $form->field($model, 'id') ?> -->

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'age') ?>

                    <?php //echo form->field($model, 'gender') ?>

                    <?php //echo form->field($model, 'address') ?>

                    <?php // echo $form->field($model, 'position') ?>

                    <?php // echo $form->field($model, 'avatar') ?>

                    <?php // echo $form->field($model, 'created_at') ?>

                    <?php // echo $form->field($model, 'updated_at') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>
        </div>
    </div>
</div>

