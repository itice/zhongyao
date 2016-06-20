<?php

namespace app\models;

use Yii;
use yii\base\Object;

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
    
    
    public function afterSave($insert, $changedAttributes)
    {
    	parent::afterSave($insert, $changedAttributes);
    	if($insert){
    		$model = new YaoLog();
    		$model->yao = $this->yao;
    		$model->weight = -$this->weight;
    		$model->chufang_id = $this->chufang_id;
    		$model->content = $this->chufang->name . date('Y-m-d', $this->chufang->sign_at) . '处方用药';
    		$model->save();
    	}
    	return TRUE;
    }
    
    
    public function getChufang()
    {
    	return $this->hasOne(Chufang::className(), ['id'=>'chufang_id']);
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
