<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subnet_groups".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 */
class SubnetGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subnet_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['desc'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc' => 'Desc',
        ];
    }
}
