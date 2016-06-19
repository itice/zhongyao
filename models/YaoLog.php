<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

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
class YaoLog extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yao_log';
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
    
    public function afterSave($insert, $changedAttributes)
    {
    	parent::afterSave($insert, $changedAttributes);
    	if($insert){
    		$model = Yao::findOne(['yao'=>$this->yao]);
    		$model->stock = $model->stock + $this->weight;
    		$model->save();
    	}
    	return TRUE;
    }
    
    public function afterFind()
    {
    	parent::afterFind();
    	$this->created_at = date('Y-m-d H:i:s', $this->created_at);
    	$this->updated_at = date('Y-m-d H:i:s', $this->updated_at);
    	return TRUE;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	[['yao', 'weight'], 'required'],
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
            'weight' => '药品变化量(克)',
            'chufang_id' => 'Chufang ID',
            'content' => '说明',
            'created_at' => '日期',
            'updated_at' => 'Updated At',
        ];
    }
}
