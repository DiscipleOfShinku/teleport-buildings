<?php

namespace app\models;

use yii\db\ActiveRecord;

class Building extends ActiveRecord
{
    public function rules()
    {
        return [
            [['street', 'number', 'floors', 'space', 'build_date'], 'required'],
            [['street', 'number'], 'string', 'max' => 255],
            ['floors', 'integer', 'min' => 1],
            ['space', 'double', 'min' => 0],
            ['build_date', 'date', 'format' => 'yyyy-MM-dd'],
        ];
    }
}
