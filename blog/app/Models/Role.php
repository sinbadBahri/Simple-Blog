<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    public function users()
    {
        return $this->belongsToMany(
            related:User::class, table:'role_user_relations'
        );
    }

    public function payment()
    {
        return $this->hasOne(related:Payment::class);
    }
}
