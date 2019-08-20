<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      protected $table = 'posts';

      public function company()
      {
          return $this->belongsTo('App\Company', 'created_by', 'id');
      }

      public function comments()
      {
          return $this->hasMany('App\Comment', 'post_id', 'id');
      }

      public function likes()
      {
          return $this->hasMany('App\Like','post_id', 'id');
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
}
