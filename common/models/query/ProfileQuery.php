<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\query\Profile]].
 *
 * @see \common\models\query\Profile
 */
class ProfileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        if(!\Yii::$app->user->can('Administrator')) {
            $this->andWhere('[[status]]=1');
        }
        return $this;
    }*/

    public function mine()
    {
            $this->andWhere('[[created_by]]='.\Yii::$app->user->id);
        return $this;
    }

    /**
     * @inheritdoc
     * @return \common\models\query\Profile[]|array
     */
    public function all($db = null, $bypass = false)
    {
        if($bypass) {
            return parent::all($db);
        }
        if(!\Yii::$app->user->can('Administrator')) {
            $this->mine();
        }
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\Profile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
