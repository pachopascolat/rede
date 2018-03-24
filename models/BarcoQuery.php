<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Barco]].
 *
 * @see Barco
 */
class BarcoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Barco[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Barco|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
