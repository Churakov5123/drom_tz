<?php

namespace App\Http\Controllers\First;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use TasksFirstHelper;

class FirstTaskController extends Controller
{
    /**
     *  Контроллер обрабатывающий первую задачу, возвращает колличество
     *  записей в файле count, используем  helper в котором описан функционал рекурсивного поска фаила  по маске задданного значения
     */

    public function index()
    {
        $dir = public_path() . '/first/';
        $mask = "count";
        $taskFirst = new TasksFirstHelper();
        $result = $taskFirst->glob_recursive($dir, $mask);

       return $result;

    }
}
