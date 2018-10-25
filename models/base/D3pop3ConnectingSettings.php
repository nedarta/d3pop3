<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace d3yii2\d3pop3\models\base;

use Yii;

/**
 * This is the base-model class for table "d3pop3_connecting_settings".
 *
 * @property integer $id
 * @property integer $sys_company_id
 * @property integer $person_id
 * @property string $model
 * @property string $model_search_field
 * @property string $search_by_email_field
 * @property string $type
 * @property string $email
 * @property string $settings
 * @property string $notes
 *
 * @property \d3yii2\d3pop3\models\D3cCompany $sysCompany
 * @property \d3yii2\d3pop3\models\D3pPerson $person
 * @property \d3yii2\d3pop3\models\D3pop3SendReceiv[] $d3pop3SendReceivs
 * @property string $aliasModel
 */
abstract class D3pop3ConnectingSettings extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const TYPE_POP3 = 'pop3';
    const TYPE_GMAIL = 'gmail';
    const TYPE_IMAP = 'imap';
    public $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd3pop3_connecting_settings';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sys_company_id','email'], 'required'],
            [['sys_company_id', 'person_id'], 'integer'],
            [['model', 'type', 'settings', 'notes'], 'string'],
            [['model_search_field', 'search_by_email_field'], 'string', 'max' => 255],
            [['sys_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => \d3yii2\d3pop3\models\D3cCompany::className(), 'targetAttribute' => ['sys_company_id' => 'id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => \d3yii2\d3pop3\models\D3pPerson::className(), 'targetAttribute' => ['person_id' => 'id']],
            ['type', 'in', 'range' => [
                    self::TYPE_POP3,
                    self::TYPE_GMAIL,
                    self::TYPE_IMAP,
                ]
            ],
            ['email','email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('d3pop3', 'ID'),
            'sys_company_id' => Yii::t('d3pop3', 'Sys Company ID'),
            'person_id' => Yii::t('d3pop3', 'Person'),
            'model' => Yii::t('d3pop3', 'Model'),
            'model_search_field' => Yii::t('d3pop3', 'Model search field'),
            'search_by_email_field' => Yii::t('d3pop3', 'Search by email field'),
            'type' => Yii::t('d3pop3', 'Type'),
            'email' => Yii::t('d3pop3', 'Email'),
            'settings' => Yii::t('d3pop3', 'Settings'),
            'notes' => Yii::t('d3pop3', 'Notes'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'person_id' => Yii::t('d3pop3', 'Person'),
            'model' => Yii::t('d3pop3', 'Model'),
            'model_search_field' => Yii::t('d3pop3', 'Model search field'),
            'search_by_email_field' => Yii::t('d3pop3', 'Search by email field'),
            'type' => Yii::t('d3pop3', 'Type'),
            'settings' => Yii::t('d3pop3', 'Settings'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysCompany()
    {
        return $this->hasOne(\d3yii2\d3pop3\models\D3cCompany::className(), ['id' => 'sys_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(\d3yii2\d3pop3\models\D3pPerson::className(), ['id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getD3pop3SendReceivs()
    {
        return $this->hasMany(\d3yii2\d3pop3\models\D3pop3SendReceiv::className(), ['setting_id' => 'id']);
    }




    /**
     * get column type enum value label
     * @param string $value
     * @return string
     */
    public static function getTypeValueLabel($value){
        $labels = self::optsType();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column type ENUM value labels
     * @return array
     */
    public static function optsType()
    {
        return [
            self::TYPE_POP3 => Yii::t('d3pop3', self::TYPE_POP3),
            self::TYPE_GMAIL => Yii::t('d3pop3', self::TYPE_GMAIL),
            self::TYPE_IMAP => Yii::t('d3php3', self::TYPE_IMAP),
        ];
    }

}
