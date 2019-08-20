<?php

namespace App\Http\Controllers;
use Auth;
use App\Company;
use App\Like;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       //
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $posts = Post::orderBy('created_at', 'desc')->paginate(10);
          return view('new-template.solutions')->with('posts',$posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         if( Auth::guard('company')->check() )
          {
                $company_id = Auth::guard('company')->user()->id;
                $verified = Company::find($company_id)->verified;
                if( $verified == 1)
                {
                    $validatedData = $request->validate([
                        'title'=> 'required',
                        'post' => 'required',
                    ]);

                    $post = new Post;
                    $post->title = $request->input('title');
                    $post->statement = $request->input('post');
                    $post->created_by = Auth::guard('company')->user()->id;
                    $post->save();

                    flash(__('You have saved your post successfully'))->success();
                    return \Redirect::route('solutions');
                }
                else
                {
                  flash(__('Your Profile is not verified!'))->error();
                  return \Redirect::route('solutions');
                }
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
        $post = Post::find($id);
        $comments = Comment::where('post_id','=',$post->id)
                            ->where('parent_id','=',0)
                            ->orderBy('created_at', 'desc')->get();
        return view('new-template.problem_details')
                                    ->with('comments',$comments)
                                    ->with('post',$post);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
