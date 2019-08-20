<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Company;
use App\Mentor;
use App\SkillProvider;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
      public function checkUser(Request $request)
      {
            $post_id = $request->post_id;

            if( Auth::guard('web')->check() )
            {
              $user_id = Auth::user()->id;
              $verified = User::find($user_id)->verified;
                if( $verified == 2)
                {
                  return 1;
                }
                else { return 2 ; }
            }
            else if( Auth::guard('company')->check() )
            {
              $company_id = Auth::guard('company')->user()->id;
              $verified = Company::find($company_id)->verified;
                if( $verified == 1)
                {
                  return 1;
                }
                else { return 2 ; }
            }
            else if( Auth::guard('mentor')->check() )
            {
                $mentor_id = Auth::guard('mentor')->user()->id;
                $verified = Mentor::find($mentor_id)->verified;
                  if( $verified == 1)
                  {
                    return 1;
                  }
                  else { return 2 ; }
            }
            else if( Auth::guard('skill_provider')->check() )
            { return 3; }
            else { return 4;}
      }

      public function store(Request $request, $post_id)
      {
          $field = 'comment_'.$post_id;

          if( Auth::guard('web')->check() )
          {
            $user_id = Auth::user()->id;
            $guard = 'web';
          }
          else if( Auth::guard('company')->check() )
          {
            $user_id = Auth::guard('company')->user()->id;
            $guard = 'company';
          }
          else if( Auth::guard('mentor')->check() )
          {
            $user_id = Auth::guard('mentor')->user()->id;
            $guard = 'mentor';
          }

          $validatedData = $request->validate(
                  [ $field => 'required'],
                  [ 'required' => 'Comment is empty']
                );

          $comment = new Comment;
          $comment->post_id = $post_id;
          $comment->parent_id = 0;
          $comment->comment = $request->input($field);
          $comment->user_id = $user_id;
          $comment->guard = $guard;
          $comment->save();
          flash(__('You have saved your comment successfully'))->success();
          return \Redirect::route('post-details',$post_id);
      }

      public function storeComments(Request $request, $comment_id)
      {
          $field = 'comment_'.$comment_id;
          $post_id = $request->input('post_id');

          if( Auth::guard('web')->check() )
          {
            $user_id = Auth::user()->id;
            $guard = 'web';
          }
          else if( Auth::guard('company')->check() )
          {
            $user_id = Auth::guard('company')->user()->id;
            $guard = 'company';
          }
          else if( Auth::guard('mentor')->check() )
          {
            $user_id = Auth::guard('mentor')->user()->id;
            $guard = 'mentor';
          }

          $validatedData = $request->validate(
                  [ $field => 'required'],
                  [ 'required' => 'Comment is empty']
                );

          $comment = new Comment;
          $comment->post_id = $post_id;
          $comment->parent_id = $comment_id;
          $comment->comment = $request->input($field);
          $comment->user_id = $user_id;
          $comment->guard = $guard;
          $comment->save();
          flash(__('You have saved your comment successfully'))->success();
          return \Redirect::route('post-details',$post_id);
      }

      public function editComment(Request $request)
      {
        $comment_id = $request->input('id');
        $text = $request->input('text');

        $comment = Comment::find($comment_id);
        $comment->comment = $text;
        $comment->save();

      }
}
