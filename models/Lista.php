<?php

namespace app\models;

use Yii;
use app\models\utilizadores;

/**
 * This is the model class for table "lista".
 *
 * @property integer $id
 * @property string $nome_lista
 * @property string $texto_lista
 * @property integer $id_utilizador
 */
class Lista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lista';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_lista', 'texto_lista', 'id_utilizador'], 'required'],
            [['texto_lista'], 'string'],
            [['id_utilizador'], 'integer'],
            [['nome_lista'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_lista' => 'Nome da lista',
            'texto_lista' => 'Descrição',
            'id_utilizador' => 'ID Utilizador',
        ];
    }
    
    public function getUtilizador()
    {
        return $this->hasOne(utilizadores::className(), ['id' => 'id_utilizador']);
    }
}
