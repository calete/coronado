<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attach".
 *
 * @property int $id
 * @property int $usuario_id
 * @property resource $data
 *
 * @property Usuarios $usuario
 */
class Attach extends \yii\db\ActiveRecord
{
    public $file1;
    public $file2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attach';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'data', 'type'], 'required'],
            [['usuario_id'], 'integer'],
            [['data'], 'string'],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
            [['file1', 'file2'], 'file', 'skipOnEmpty'=>true, 'extensions' => ['jpg', 'png']],
            [['file1', 'file2'], 'required', 'except'=>['upload']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario_id' => 'Usuario ID',
            'data' => 'Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id']);
    }
}
