<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdeaTeam extends Model
{
    
    public function ideas()
    {
        return $this->belongsTo(Idea::class,'idea_id', 'id' );
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'id' );
    }
    
}
