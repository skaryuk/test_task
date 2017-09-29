<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property integer $id
 * @property string $address
 * @property string $comment
 */
class Addresses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address'], 'required'],
            [['address', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'comment' => 'Comment',
        ];
    }
}
