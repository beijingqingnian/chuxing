<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $city_index
 * @property int $province_id
 * @property string $name
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_index', 'province_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_index' => 'City Index',
            'province_id' => 'Province ID',
            'name' => 'Name',
        ];
    }

    public static function getCityList(){
        return City::find()
            ->select(['id','name'])
            ->where('is_active = 1')
            ->asArray()->all();
    }
}
