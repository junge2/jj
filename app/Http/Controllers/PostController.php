<?php
/**
 * Created by PhpStorm.
 * User: 军哥
 * Date: 2017/7/22
 * Time: 17:34
 */

namespace App\Http\Controllers;
use App\Post;



class PostController extends Controller
{
    public function index(){
        $name = 'junge';
        $z = true;
//        dd(\Request::all());

        $posts = Post::orderBy('created_at','desc')->paginate(3);
        $data = [
            'title' => 'bbb',
            'content' => '还不错'
        ];
        $test = Post::where('id',11)->delete();
//        dump($test);
        return view("post/index",compact('z','name','posts'));
    }

    public function show(Post $post){
        return view("post/show",compact('post'));
    }

    public function edit(Post $post){
        return view('post/edit',compact('post'));
    }

    public function update(Post $post){
        $this->validate(request(),[
           'title' => 'required|string|max:100|min:5',
            'content'=>'required|string|min:10'
        ]);
        $post->title = request('title');
        $post->content =request('content');
        $post->save();
//        dd(request()->all());
        return redirect("posts/{$post->id}");
    }

    public function create(){
        return view('post/create');
    }

    public function store(){
        $this->validate(request(),[
            'title' =>'required|string|max:100|min:5',
            'content'=>'required|string'
        ]);
        Post::create(request(['title','content']));
        return redirect('/posts');
    }

    public function delete(Post $post){
        $post->delete();
        return redirect('/posts');
    }
}