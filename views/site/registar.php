<h2>Criar Conta de Utilizador</h2>
<br>
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Departamento;
use app\models\utilizadores;

/* @var $this yii\web\View */
/* @var $model app\models\RegistarForm */
/* @var $form ActiveForm */
?>
<div class="utilizadores-registar" style="width:400px">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'primeiro_nome') ?>
        <?= $form->field($model, 'ultimo_nome') ?>
    
        <?= $form->field($model, 'Departamento')->dropDownList(
            ArrayHelper::map(Departamento::find()->all(),'id','tipo_departamento'),
            ['prompt'=>'Escolher Departamento']
        ) ?>
    
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Registar', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
