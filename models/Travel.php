<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "travel".
 *
 * @property int $id ID
 * @property int $pre_city_id 当前城市ID
 * @property string $pre_address 当前位置
 * @property int $to_city_id 目的城市ID
 * @property string $to_address 目的位置
 * @property int $surplus_seat 剩余座位
 * @property string $go_off_time 出发时间
 * @property string $mobile 手机号
 * @property string $add_time 创建时间
 * @property string $edit_time 修改时间
 * @property int $is_active 是否有效：1:有效 0:无效
 */
class Travel extends \yii\db\ActiveRecord
{
    public $pre_city;
    public $to_city;
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'travel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pre_city_id', 'pre_address', 'to_city_id', 'to_address', 'surplus_seat', 'go_off_time', 'mobile', 'add_time'], 'required'],
            [['pre_city_id', 'to_city_id'], 'integer'],
            [['go_off_time', 'add_time', 'edit_time'], 'safe'],
            [['pre_address', 'to_address'], 'string', 'max' => 200],
            [['surplus_seat'], 'string', 'max' => 2],
            [['mobile'], 'string', 'max' => 20],
            [['is_active'], 'string', 'max' => 3],
            ['verifyCode','captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pre_city_id' => 'Pre City ID',
            'pre_address' => 'Pre Address',
            'to_city_id' => 'To City ID',
            'to_address' => 'To Address',
            'surplus_seat' => 'Surplus Seat',
            'go_off_time' => 'Go Off Time',
            'mobile' => 'Mobile',
            'add_time' => 'Add Time',
            'edit_time' => 'Edit Time',
            'is_active' => 'Is Active',
        ];
    }
}
