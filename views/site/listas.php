<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lista;
use app\models\utilizadores;


/* @var $this yii\web\View */
/* @var $model app\models\Lista */
/* @var $form ActiveForm */

$this->title = 'Nova Lista';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1 align="Center">Nova Lista</h1>

<div class="site-listas">

        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>
        <p><br></p>
        <?= $form->field($model, 'nome_lista') ?>
        <?= $form->field($model, 'texto_lista') ?>
    
        <div align="center">
            <?= Html::submitButton('Guardar Lista', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Cancelar', ['cancelarcoisas'], ['class' => 'btn btn-danger']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-listas -->
