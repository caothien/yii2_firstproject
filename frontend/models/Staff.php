<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property integer $id
 * @property string $name
 * @property integer $age
 * @property string $gender
 * @property string $address
 * @property string $position
 * @property string $avatar
 * @property integer $created_at
 * @property integer $updated_at
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'age', 'gender', 'address', 'position'], 'required'],
            [['age', 'created_at', 'updated_at'], 'integer'],
            [['name', 'gender', 'address', 'position'], 'string', 'max' => 255],
            [['avatar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxSize'=> 1024*1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'gender' => 'Gender',
            'address' => 'Address',
            'position' => 'Position',
            'avatar' => 'Avatar',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
        TimestampBehavior::className(),
        ];
    }

}
