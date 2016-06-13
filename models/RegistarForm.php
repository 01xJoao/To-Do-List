<?php

namespace app\models;

use Yii;
use yii\base\Model;
//use yii\helpers\Html;
//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Utilizadores */
/* @var $form yii\widgets\ActiveForm */

class RegistarForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utilizadores';
    }
    
    public function rules()
    {
        return [
            [['primeiro_nome', 'ultimo_nome', 'Departamento', 'email', 'username', 'password'], 'required'],
            [['Departamento'], 'integer'],
            [['primeiro_nome', 'ultimo_nome', 'email', 'username', 'password'], 'string', 'max' => 255],
        ];
    }
}
?>
