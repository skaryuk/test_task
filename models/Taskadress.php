<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taskadress".
 *
 * @property integer $id
 * @property string $userid
 * @property string $address
 * @property string $comment
 */
class Taskadress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taskadress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'address'], 'required'],
            [['userid', 'address', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'address' => 'Address',
            'comment' => 'Comment',
        ];
    }
}
