<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function like()
    {
        return $this->hasOne('App\Like','comment_id');
    }

    public function getName($id,$guard)
    {
       if( $guard == "web")
       {
          $name = User::find($id)->name;
       }
       else if( $guard == "company")
       {
          $name = Company::find($id)->name;
       }
       else if( $guard == "mentor")
       {
          $name = Mentor::find($id)->first_name;
       }
       return $name;
    }

    public function getImage($id,$guard)
    {
       if( $guard == "web")
       {
          $image = User::find($id)->image;
          $folder = 'user_images/'.$image;
       }
       else if( $guard == "company")
       {
          $image = Company::find($id)->logo;
          $folder = 'company_logos/'.$image;
       }
       else if( $guard == "mentor")
       {
          $image = Mentor::find($id)->image;
          $folder = 'mentor_images/'.$image;
       }
       return $folder;
    }

    public function checkIfLiked($post_id,$comment_id)
    {
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
        else{
          $user_id = '';
          $guard = '';
        }

      $existing_like = Like :: where('post_id','=',$post_id)
                      ->where('comment_id','=',$comment_id)
                      ->where('user_id','=',$user_id)
                      ->where('guard','=',$guard)->exists();
        return $existing_like;
    }

    public function getUser($id,$guard)
    {
        if( Auth::guard('web')->check() && (Auth::guard('web')->user()->id) == $id && $guard == 'web')
        {
              return 1;
        }
        else if( Auth::guard('company')->check() && (Auth::guard('company')->user()->id) == $id && $guard == 'company')
        {
              return 1;
        }
        else if( Auth::guard('mentor')->check() && (Auth::guard('mentor')->user()->id) == $id && $guard == 'mentor')
        {
              return 1;
        }
        else{
              return 0;
        }
    }
}
