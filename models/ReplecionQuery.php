<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Replecion]].
 *
 * @see Replecion
 */
class ReplecionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Replecion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Replecion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
