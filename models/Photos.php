<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photos".
 *
 * @property string $id
 * @property string $path
 *
 * @property Users[] $users
 * @property UsersHasPhotos[] $usersHasPhotos
 * @property Users[] $users0
 */
class Photos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['photosId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsersHasPhotos()
    {
        return $this->hasMany(UsersHasPhotos::className(), ['photosId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers0()
    {
        return $this->hasMany(Users::className(), ['id' => 'usersId'])->viaTable('users_has_photos', ['photosId' => 'id']);
    }
}
