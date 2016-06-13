<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\models\Lista;
use app\models\Tarefas;

/* @var $this yii\web\View */
/* @var $model app\models\Lista */

$this->title = $model->nome_lista;
$this->params['breadcrumbs'][] = $this->title;
?>        

<div class="lista-view">
    <h1><?= Html::encode($this->title) ?></h1><br><br>
</div>
<?
    echo yii\widgets\ListView::widget([
        'dataProvider' => $provider,
        'summary' => false,
        'emptyText' => 'Não tem tarefas nesta lista, crie uma agora.',
        'class' => 'yii\grid\ActionColumn',
        'itemView' => function($model){
            return '<div class="list-group" style="width:450px; margin-top: -20px">
                        <a href="http://localhost:8080/index.php?r=site/apagartarefa&id='.$model->id.'&idd='.$model->id_lista.'" class="list-group-item btn-danger">'.$model->nome_tarefa.'</a>
                    </div>';
            }
    ]);
?>

<div>
    <a class="btn btn-lg btn-success" href="http://localhost:8080/index.php?r=site%2Ftarefas&id= <?php echo $model->id ?> "> Criar Tarefa</a>
    <p><br></p>
    <?= Html::a('Voltar para o menu', ['cancelarcoisas'], ['class' => 'btn btn-info']) ?>
</div>