<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Departamento;

/* @var $this yii\web\View */
/* @var $model app\models\Departamento */
/* @var $form ActiveForm */
?>
<h1 align="Center">Administração</h1>

<div class="progress" style="">
  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
</div>

<div class="site-admin" style="width:40%" >
<h3>Departamentos</h3><br>
  <?php  
    echo yii\widgets\ListView::widget([
    'dataProvider' => $provider,
    'summary' => false,
    'class' => 'yii\grid\ActionColumn',
    'itemView' => function($model){

        return '<div class="list-group" style="margin-top: -16px;">
                <a href="#" class="list-group-item active">
                    <h5 class="list-group-item-heading">'.$model->tipo_departamento.'</h5>
                </a>
                </div>';
    }
    
    ]); ?>
    
<h3>Criar novo Departamento</h3>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'tipo_departamento') ?>
        <div class="form-group">
            <?= Html::submitButton('Criar', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    <br>
    <div class="progress">
      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
      </div>
    </div>

</div>

<div class="utilizadores-index">

    <h3>Utilizadores</h3><br>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'emptyText' => 'Sem listas criadas, cria agora uma lista!',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'primeiro_nome',
            'ultimo_nome',
            'email:email',
        ],
    ]); ?>
</div>