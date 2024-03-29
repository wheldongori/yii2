<?php

namespace common\models\query;


/**
 * This is the ActiveQuery class for [[\common\models\Video]].
 *
 * @see \common\models\Video
 */
class VideoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Video[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Video|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function creator($userId)
    {
        # code...
        return $this->andWhere(['created_by' => $userId]);
    }

    public function latest()
    {
        # code...
        return $this->orderBy(['created_at' => SORT_DESC]);
    }

    public function published($status)
    {
        # code...
        return $this->andWhere(['status' => $status]);
    }
}
