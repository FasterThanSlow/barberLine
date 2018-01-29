<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hairdressers".
 *
 * @property string $id
 * @property string $workingTime
 * @property string $possobilityOfDeparture
 * @property string $usersId
 *
 * @property Users $users
 * @property Services[] $services
 */
class Hairdressers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hairdressers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['workingTime', 'possobilityOfDeparture', 'usersId'], 'required'],
            [['usersId'], 'integer'],
            [['workingTime', 'possobilityOfDeparture'], 'string', 'max' => 255],
            [['usersId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['usersId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'workingTime' => 'Working Time',
            'possobilityOfDeparture' => 'Possobility Of Departure',
            'usersId' => 'Users ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::className(), ['hairdressersId' => 'id']);
    }
}
