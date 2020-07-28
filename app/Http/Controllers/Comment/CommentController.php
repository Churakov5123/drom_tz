<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentCreate;
use App\Http\Requests\CommentUpdate;
use App\Models\Comment;
use GuzzleHttp;


class CommentController extends Controller
{

    // можно по хорошему еще добавить авторизацию-чтобы не каждый пользователь мог открыто получать данные

    /**
     * GET - отдает список данных
     *
     * @return \Illuminate\Http\Response
     */
    public function commentIndex()
    {
        $items = Comment::all();
        return response()->json($items, 200);
    }

    /**
     * Методом POST -  создаем новую сущность
     * Валидация данных  происходит с использованием правил  заданных в App\Http\Requests\CommentCreate .
     * @return \Illuminate\Http\Response
     */
    public function commentCreate(CommentCreate $request)
    {
        $data = $request->input();
        $item = new Comment($data);
        $result = $item->save();
        return response()->json($result, 201);
    }


    /**
     * PUT обновляет уже существующую сущность
     * Валидация данных  происходит с использованием правил заданных в App\Http\Requests\CommentUpdate.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function commentUpdate(CommentUpdate $request, $id)
    {
        $data = $request->input();
        $item = Comment::find($id);
        if (is_null($item)) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $result = $item->update($data);
        return response()->json($result, 200);
    }

}
