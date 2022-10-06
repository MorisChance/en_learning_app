<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(4);
        $categories = Category::all();
        // $users = User::all();
        return view('posts.index', compact('posts', 'categories'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post($request->all());
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect()
            ->route('posts.show', $post)

            ->with('notice', '記事を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); 
        $categories = Category::all();
        return view('posts.show', compact('post', 'categories'));
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->fill($request->all());
        $post->save();
        // dd($post);においてデータがうけとれている
        // 以下のcodeは他人の記事を更新しようとするときのエラーの表示
        if ($request->user()->cannot('update', $post)) {
        return redirect()->route('posts.show', $post)
            ->withErrors('自分の記事以外は更新できません');
        }else{
        return redirect()->route('posts.show', $post);
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
        $post = Post::find($id);
        return redirect()->route('posts.index')
            ->with('notice', '記事を削除しました');
    }
}
