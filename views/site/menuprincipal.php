<h1>As tuas listas</h1><br>

<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\utilizadores;
use app\models\Lista;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ListaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'As tuas Listas';
$this->params['breadcrumbs'][] = '';

echo GridView::widget([
        'dataProvider' => $provider,
        'summary' => false,
        'emptyText' => 'Sem listas criadas, cria agora uma lista!',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome_lista',
            'texto_lista:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
?>
<br><p><a class="btn btn-primary" href="http://localhost:8080/index.php?r=site%2Flistas">Criar nova lista</a></p>
