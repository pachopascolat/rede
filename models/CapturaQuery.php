<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Captura]].
 *
 * @see Captura
 */
class CapturaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Captura[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Captura|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
