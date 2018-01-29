<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $fname
 * @property string $birthDate
 * @property string $coordinatesId
 * @property string $photosId
 *
 * @property Hairdressers[] $hairdressers
 * @property Orders[] $orders
 * @property Reviews[] $reviews
 * @property Coordinates $coordinates
 * @property Photos $photos
 * @property UsersHasPhotos[] $usersHasPhotos
 * @property Photos[] $photos0
 */
class Users extends \yii\db\ActiveRecord
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
            [['email', 'password', 'coordinatesId', 'photosId'], 'required'],
            [['birthDate'], 'safe'],
            [['coordinatesId', 'photosId'], 'integer'],
            [['email', 'password', 'name', 'surname', 'fname'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['coordinatesId'], 'exist', 'skipOnError' => true, 'targetClass' => Coordinates::className(), 'targetAttribute' => ['coordinatesId' => 'id']],
            [['photosId'], 'exist', 'skipOnError' => true, 'targetClass' => Photos::className(), 'targetAttribute' => ['photosId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'name' => 'Name',
            'surname' => 'Surname',
            'fname' => 'Fname',
            'birthDate' => 'Birth Date',
            'coordinatesId' => 'Coordinates ID',
            'photosId' => 'Photos ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHairdressers()
    {
        return $this->hasMany(Hairdressers::className(), ['usersId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['usersId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['usersId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoordinates()
    {
        return $this->hasOne(Coordinates::className(), ['id' => 'coordinatesId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasOne(Photos::className(), ['id' => 'photosId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersHasPhotos()
    {
        return $this->hasMany(UsersHasPhotos::className(), ['usersId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos0()
    {
        return $this->hasMany(Photos::className(), ['id' => 'photosId'])->viaTable('users_has_photos', ['usersId' => 'id']);
    }
}
