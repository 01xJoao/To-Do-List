<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ListaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lista', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome_lista',
            'texto_lista:ntext',
            'id_utilizador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
