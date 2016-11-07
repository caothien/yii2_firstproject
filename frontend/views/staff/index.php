<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Staff', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'Avatar',
                'label'=>'Avatar',
                'format'=>'html',
                'value' => function ($data) {
                $url = \Yii::getAlias('images/'). $data['avatar'];
                return Html::img($url, ['alt'=>'Avatar','width'=>'200','height'=>'200']);
                }
            ],
            'name',
            'age',
            'gender',
            'address',
            'position',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:d-m-Y']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
