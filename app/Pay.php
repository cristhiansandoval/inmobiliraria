<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $fillable = ['agent_id','name','fecha_pago','amount','impago'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
