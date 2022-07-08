<?php


namespace App\Abstracts;


use Illuminate\Database\Eloquent\Model;

class UnicodeModel extends Model
{
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
