<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Subnet */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subnets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subnet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'subnet_group_id',
            'name',
            'desc:ntext',
            'network_address',
            'subnet_mask',
        ],
    ]) ?>

</div>
