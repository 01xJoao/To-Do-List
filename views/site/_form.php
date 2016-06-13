<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_lista')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'texto_lista')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
