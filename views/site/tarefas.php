<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Lista;

/* @var $this yii\web\View */
/* @var $model app\models\Tarefas */
/* @var $form ActiveForm */

$this->params['breadcrumbs'][] = ['label' => 'Lista', 'url' => ['view', 'id' => $model->id_lista]];
$this->params['breadcrumbs'][] = 'Nova Tarefa';
?>
<h2>Nova Tarefa</h2> <br>
<div class="site-tarefas" style="width:400px">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nome_tarefa') ?>
    <div id="divCheckbox" style="display: none;"> <?= $form->field($model, 'id_lista') ?></div>
    
        <div class="form-group">
            <?= Html::submitButton('Criar Tarefa', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Cancelar', ['view', 'id' => $model->id_lista],['class' => 'btn btn-danger']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-tarefas -->
