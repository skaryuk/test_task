<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_address".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $address_id
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address_id'], 'required'],
            [['user_id', 'address_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'address_id' => 'Address ID',
        ];
    }
}
