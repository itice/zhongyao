<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%yao}}".
 *
 * @property string $id
 * @property string $yao
 * @property string $price
 * @property string $stock
 * @property string $created_at
 * @property string $updated_at
 */
class Yao extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yao}}';
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
        	[['yao'], 'required'],
            [['price', 'stock'], 'number'],
            [['created_at', 'updated_at'], 'integer'],
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
            'yao' => '药名',
            'price' => '单价(元/克)',
            'stock' => '库存(克)',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
