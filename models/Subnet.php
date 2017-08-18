<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subnets".
 *
 * @property integer $id
 * @property integer $subnet_group_id
 * @property string $name
 * @property string $desc
 * @property string $network_address
 * @property string $subnet_mask
 *
 * @property SubnetGroups $subnetGroup
 */
class Subnet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subnets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subnet_group_id', 'name', 'network_address', 'subnet_mask'], 'required'],
            [['subnet_group_id'], 'integer'],
            [['desc'], 'string'],
            [['name', 'network_address', 'subnet_mask'], 'string', 'max' => 255],
            [['subnet_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubnetGroup::className(), 'targetAttribute' => ['subnet_group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subnet_group_id' => 'Subnet Group ID',
            'name' => 'Name',
            'desc' => 'Desc',
            'network_address' => 'Network Address',
            'subnet_mask' => 'Subnet Mask',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubnetGroup()
    {
        return $this->hasOne(SubnetGroups::className(), ['id' => 'subnet_group_id']);
    }
}
