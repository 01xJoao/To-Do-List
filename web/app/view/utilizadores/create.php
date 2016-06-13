<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\utilizadores */

$this->title = 'Create Utilizadores';
$this->params['breadcrumbs'][] = ['label' => 'Utilizadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizadores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
