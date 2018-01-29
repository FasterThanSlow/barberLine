<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property double $price
 * @property string $dateCreating
 * @property string $serviceCategoriesId
 * @property string $hairdressersId
 *
 * @property Orders[] $orders
 * @property Reviews[] $reviews
 * @property Hairdressers $hairdressers
 * @property ServiceCategories $serviceCategories
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'price', 'dateCreating', 'serviceCategoriesId', 'hairdressersId'], 'required'],
            [['price'], 'number'],
            [['dateCreating'], 'safe'],
            [['serviceCategoriesId', 'hairdressersId'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
            [['hairdressersId'], 'exist', 'skipOnError' => true, 'targetClass' => Hairdressers::className(), 'targetAttribute' => ['hairdressersId' => 'id']],
            [['serviceCategoriesId'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceCategories::className(), 'targetAttribute' => ['serviceCategoriesId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'dateCreating' => 'Дата Создания',
            'serviceCategoriesId' => 'Категория услуг',
            'hairdressersId' => 'Парикмахер',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['servicesId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::className(), ['serviceId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHairdressers()
    {
        return $this->hasOne(Hairdressers::className(), ['id' => 'hairdressersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceCategories()
    {
        return $this->hasOne(ServiceCategories::className(), ['id' => 'serviceCategoriesId']);
    }
    
    public function getPhotos()
    {
        return $this->hasMany(Photos::className(), ['id' => 'photos_id'])->viaTable('services_has_photos', ['services_id' => 'id']);
    }
}
