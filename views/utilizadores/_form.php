<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Departamento;
use app\models\utilizadores;

/* @var $this yii\web\View */
/* @var $model app\models\Utilizadores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="utilizadores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'primeiro_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ultimo_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Departamento')->dropDownList(
            ArrayHelper::map(Departamento::find()->all(),'id','tipo_departamento'),
            ['prompt'=>'Escolher Departamento']
        ) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
