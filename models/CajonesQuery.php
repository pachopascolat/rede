<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Cajones]].
 *
 * @see Cajones
 */
class CajonesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Cajones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Cajones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
