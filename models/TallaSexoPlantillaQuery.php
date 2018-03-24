<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TallaSexoPlantilla]].
 *
 * @see TallaSexoPlantilla
 */
class TallaSexoPlantillaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TallaSexoPlantilla[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TallaSexoPlantilla|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
