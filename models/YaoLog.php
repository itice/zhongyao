<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%yao_log}}".
 *
 * @property string $id
 * @property string $weight
 * @property string $chufang_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class YaoLog extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yao_log}}';
    }
    
    public function behaviors()
    {
    	return [
    			'timestamp' => [
    					'class'      => TimestampBehavior::className(),
    					'attributes' => [
    							ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
    							ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
    					],
    			],
    	];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['weight'], 'number'],
            [['chufang_id', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weight' => '药品变化量',
            'chufang_id' => 'Chufang ID',
            'content' => '说明',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
