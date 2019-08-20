<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Company;
use App\Mentor;
use App\SkillProvider;
use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
      public function UserLikes(Request $request)
      {
            $post_id = $request->post_id;
            $comment_id = $request->comment_id;

            if( Auth::guard('web')->check() )
            {
              $user_id = Auth::user()->id;
              $verified = User::find($user_id)->verified;
                if( $verified == 2)
                {
                  $result = $this->handleLike($post_id,$comment_id,$user_id,'web');
                  return $result;
                }
                else { return 2 ; }
            }
            else if( Auth::guard('company')->check() )
            {
              $company_id = Auth::guard('company')->user()->id;
              $verified = Company::find($company_id)->verified;
                if( $verified == 1)
                {
                  $result = $this->handleLike($post_id,$comment_id,$company_id,'company');
                  return $result;
                }
                else { return 2 ; }
            }
            else if( Auth::guard('mentor')->check() )
            {
                $mentor_id = Auth::guard('mentor')->user()->id;
                $verified = Mentor::find($mentor_id)->verified;
                  if( $verified == 1)
                  {
                    $result = $this->handleLike($post_id,$comment_id,$mentor_id,'mentor');
                    return $result;
                  }
                  else { return 2 ; }
            }
            else if( Auth::guard('skill_provider')->check() )
            { return 3; }
            else { return 4;}
      }

      private function handleLike($post_id,$comment_id,$user_id,$guard)
      {
          $existing_like = Like :: where('post_id','=',$post_id)
                          ->where('comment_id','=',$comment_id)
                          ->where('user_id','=',$user_id)
                          ->where('guard','=',$guard)->exists();
          if($existing_like == 0){
              $likes = new Like();
              $likes->post_id = $post_id;
              $likes->comment_id = $comment_id;
              $likes->user_id = $user_id;
              $likes->guard = $guard;
              $likes->save();
              return 1;
          }else{
            Like :: where('post_id','=',$post_id)
                            ->where('comment_id','=',$comment_id)
                            ->where('user_id','=',$user_id)
                            ->where('guard','=',$guard)->delete();
              return 5;
          }
      }
}
