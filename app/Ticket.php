<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
     //Table Name
        protected $table = 'tickets';
        // Primary key
        public $primaryKey = 'id';

        // Timestamp
        public $timestamps = true;

        // Model relationship a post has a relationship with a user and belong to the user
        public function user()
        {
             return  $this->belongsTo('App\User');
         }

        public function comments() 
        { 
            return $this->hasMany('App\Comment', 'post_id'); 
        }
}
