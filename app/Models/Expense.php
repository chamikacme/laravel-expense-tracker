<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    //protected $fillable = ['desc','amount']

    //Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
