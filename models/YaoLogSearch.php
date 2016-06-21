<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YaoLog;

/**
 * YaoLogSearch represents the model behind the search form about `app\models\YaoLog`.
 */
class YaoLogSearch extends YaoLog
{
    public $date_range;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'chufang_id', 'created_at', 'updated_at'], 'integer'],
            [['yao', 'date_range'], 'safe'],
            [['weight'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = YaoLog::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'yao' => $this->yao,
        ]);
        
        if($this->date_range){
            list($start,$end) = explode(' - ', $this->date_range);
            $start_at = strtotime($start . ' 00:00:00');
            $end_at = strtotime($end . ' 23:59:59');
            $query->andFilterWhere(['between', 'created_at', $start_at, $end_at]);
        }

        return $dataProvider;
    }
    
    public function attributeLabels()
    {
        $attrs = parent::attributeLabels();
        $attrs['date_range'] = '日期';
        return $attrs;
    }
}
