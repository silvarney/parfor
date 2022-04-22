<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class RestoreModel
{
    public static function restore(Model $model, $column, $value)
    {
        $setModel = $model::withTrashed()
                            ->where($column, $value)
                            ->first();

        if ($setModel) {
            $setModel->restore();
            return true;
        } else {
            return false;
        }

    }
}
