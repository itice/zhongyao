<?php
namespace app\models;

class ChufangForm extends Chufang
{
    public $sign_at_str;
    public $yaos;
    public $weights;
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if($this->sign_at_str) $this->sign_at = strtotime($this->sign_at_str);
        return TRUE;
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        ChufangYao::deleteAll(['chufang_id'=>$this->id]);
        foreach ($this->yaos as $k => $v){
            if(!empty($this->yaos[$k])){
                $model = new ChufangYao();
                $model->chufang_id = $this->id;
                $model->yao = $this->yaos[$k];
                $model->weight = $this->weights[$k];
                $model->save(FALSE);
            }
        }
        return TRUE;
    }
    
    public function afterFind()
    {
        parent::afterFind();
        $this->sign_at_str = date('Y-m-d', $this->sign_at);
        return TRUE;
    }
    
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['yaos','weights'], 'required'];
        $rules[] = ['sign_at_str', 'string'];
        return $rules;
    }
    
    public function attributeLabels()
    {
        $attrs = parent::attributeLabels();
        $attrs['sign_at_str'] = '登记日期';
        return $attrs;
    }
}