<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VwDiversidadConLances]].
 *
 * @see VwDiversidadConLances
 */
class VwDiversidadConLancesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return VwDiversidadConLances[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return VwDiversidadConLances|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
