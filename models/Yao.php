<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use app\helpers\Pinyin;
use yii\helpers\Json;

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
    
    public static function autocomplete()
    {
        $cache = Yii::$app->cache;
        $key = 'yao_autocomplete';
        $data = $cache->get($key);
    
        if($data !== FALSE)
            return Json::encode($data);
    
            $models = Yao::find()->all();
            foreach ($models as $model){
                $pinyin = Pinyin::getShortPinyin($model->yao);
                $v['name'] = $model->yao;
                $v['value'] = $model->yao;
                $v['label'] = implode(',', [$model->yao, $pinyin]);
                $data[] = $v;
            }
    
            $cache->set($key, $data, 5);
    
            return Json::encode($data);
    }
    
    /**
     * 即时的库存
     * @return number
     */
    public function getTrueStock()
    {
        $in = YaoLog::find()->where(['yao'=>$this->yao])->andWhere(['>','weight',0])->sum('weight');
        $out = YaoLog::find()->where(['yao'=>$this->yao])->andWhere(['<','weight',0])->sum('weight');
        return $in + $out;
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
            'price' => '单价(元/千克)',
            'stock' => '库存(克)',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
