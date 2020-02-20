<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $searchTitle = $request->title;
         $searchTag = $request->tag;


         $query = Post::query();

         if(!empty($searchTitle)){
             $query->where('title', 'LIKE BINARY', '%'.$searchTitle.'%');
         }
         if(!empty($searchTag) && $searchTag!=0){
            $query->where('tag_id',$searchTag);
        }
         $posts = $query->orderByDesc('created_at')->paginate(20);

         //コメント数の多い上位3つのpost_idを取得します
         $topPosts = Comment::selectRaw('post_id,count(post_id) AS comment_count')
                    ->groupBy('post_id')
                    ->orderByDesc('comment_count')
                    ->take(3)
                    ->get();

         $tags = Tag::all();
        
        return view('post.index',compact('posts','topPosts','searchTitle','searchTag','tags'));
    
    }
    public function tag(Request $request){
        $posts = Post::orderByDesc('created_at')->where('tag_id',$request['tag'])->paginate(15);
        return view('post.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('post.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);
        \Debugbar::info($params);
    
        $post = new Post;
        $post->title = $request->title;
        $post->tag_id = $request->tag;
        $post->user_id = Auth::id();
        $post->body = $request->body;
        $post->save();
        return redirect('post/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
{
    $post = Post::findOrFail($post_id);
    
    return view('post.show', [
        'posts' => $post,
    ]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('user/'.$post->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('user/'.$post->user_id);
    }
}
