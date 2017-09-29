<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $family_name
 * @property string $first_name
 * @property string $burthday
 * @property string $sex
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'burthday', 'sex'], 'required'],
            [['burthday'], 'safe'],
            [['family_name', 'first_name', 'sex'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'family_name' => 'Family Name',
            'first_name' => 'First Name',
            'burthday' => 'Burthday',
            'sex' => 'Sex',
        ];
    }
}
