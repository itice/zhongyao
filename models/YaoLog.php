<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yao_log".
 *
 * @property string $id
 * @property string $yao
 * @property string $weight
 * @property string $chufang_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class YaoLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yao_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['weight'], 'number'],
            [['chufang_id', 'created_at', 'updated_at'], 'integer'],
            [['yao', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'yao' => '药材',
            'weight' => '药品变化量',
            'chufang_id' => 'Chufang ID',
            'content' => '说明',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
