<?php

namespace d3yii2\d3pop3\models;

use \d3yii2\d3pop3\models\base\D3pop3SendReceiv as BaseD3pop3SendReceiv;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "d3pop3_send_receiv".
 */
class D3pop3SendReceiv extends BaseD3pop3SendReceiv
{
    /**
     * @return ActiveQuery
     */
    public static function find(): ActiveQuery
    {
        $query = parent::find();
        $query->andWhere(['company_id' => \Yii::$app->SysCmp->getActiveCompanyId()]);

        return $query;
    }

}
