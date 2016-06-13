<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tarefas".
 *
 * @property integer $id
 * @property string $nome_tarefa
 * @property integer $id_lista
 * @property integer $completa
 */
class Tarefas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tarefas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_tarefa', 'id_lista'], 'required'],
            [['id_lista', 'completa'], 'integer'],
            [['nome_tarefa'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_tarefa' => 'Nome',
            'id_lista' => 'Id Lista',
            'completa' => 'Completa',
        ];
    }
}
