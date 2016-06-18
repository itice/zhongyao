<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%chufang_yao}}".
 *
 * @property string $id
 * @property string $chufang_id
 * @property string $yao
 * @property string $weight
 */
class ChufangYao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%chufang_yao}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chufang_id'], 'integer'],
            [['weight'], 'number'],
            [['yao'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chufang_id' => 'Chufang ID',
            'yao' => '药名',
            'weight' => '用量(克)',
        ];
    }
}
