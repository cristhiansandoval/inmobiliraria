<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $fillable = [
        'price', 'purpose',  'type',  'bedroom',  'city',   'agent_id',   'mail',  
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'agent_id');
    }

}
