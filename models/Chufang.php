<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%chufang}}".
 *
 * @property string $id
 * @property string $name
 * @property string $mobile
 * @property string $address
 * @property string $content
 * @property string $sign_at
 * @property string $created_at
 * @property string $updated_at
 */
class Chufang extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%chufang}}';
    }
    
    public function behaviors()
    {
    	return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
    				ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
    				ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                ]
            ]
        ];
    }
    
    public function afterDelete()
    {
        parent::afterDelete();
        ChufangYao::deleteAll(['chufang_id'=>$this->id]);
        YaoLog::deleteAll(['chufang_id'=>$this->id]);
        return TRUE;
    }
    
    public function getChufangYao()
    {
        return $this->hasMany(ChufangYao::className(), ['chufang_id'=>'id']);
    }
    
    public function getChufangYaoText()
    {
        $html = '';
        foreach ($this->chufangYao as $yao)
            $html .= $yao->yao . $yao->weight . ' ';
        return $html;
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	[['name'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'num'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['mobile'], 'string', 'max' => 11],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'mobile' => '手机',
            'address' => '地址',
            'content' => '病情',
            'sign_at' => '登记日期',
        	'num' => '付数',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
