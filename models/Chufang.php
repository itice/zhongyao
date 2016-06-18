<?php

namespace app\models;

use Yii;

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
class Chufang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%chufang}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['sign_at', 'created_at', 'updated_at'], 'integer'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
