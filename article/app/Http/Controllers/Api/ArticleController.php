<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Validator as Validator;

class ArticleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::paginate(3);
        return $this->responseOk($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi Data
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10|max:20',
            'content' => 'required',
            'image' => 'nullable',
            'user_id' => 'required|integer|exists:users,id',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        if ( $validator->fails() ) {
            return $this->responseError('Failed Create Data', 422, $validator->errors());
        }

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id
        ]);

        $data = Article::where('id', '=', $article->id)->get();

        if ($data) {
            return $this->responseOk($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::where('category_id',$id)->get();
        return $this->responseOk($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi Data
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10|max:20',
            'content' => 'required',
            'image' => 'nullable',
            'user_id' => 'required|integer|exists:users,id',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        if ( $validator->fails() ) {
            return $this->responseError('Failed Create Data', 422, $validator->errors());
        }

        $article = Article::findOrFail($id);

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id
        ]);

        $data = Article::where('id', '=', $article->id)->get();

        if ($data) {
            return $this->responseOk($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $data = $article->delete();

        if ($data) {
            return $this->responseOk('Successfuly Deleted Data');
        } else {
            return $this->responseError('Failed Delete Data');
        }
    }
}
