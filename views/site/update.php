<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lista */

$this->title = '' . $model->nome_lista;
$this->params['breadcrumbs'][] = ['label' => $model->nome_lista, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Alterar Lista';
?>
<div class="lista-update" style="width:550px">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
<?= Html::a('Cancelar', ['cancelarcoisas'], ['class' => 'btn btn-danger']) ?>