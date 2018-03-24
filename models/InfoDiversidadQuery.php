<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[InfoDiversidad]].
 *
 * @see InfoDiversidad
 */
class InfoDiversidadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return InfoDiversidad[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InfoDiversidad|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
