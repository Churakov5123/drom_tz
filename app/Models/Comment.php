<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $table = 'comments';
    //добавляем ключи полей таблицы - чтобы   работа функция fill()   // $result = $item->fill($data)->save();
    protected $fillable = [
        'name',
        'text'
    ];

}
