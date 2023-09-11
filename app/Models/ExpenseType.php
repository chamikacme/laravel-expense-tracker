<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    use HasFactory;

    //Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship to ExpenseTypes
    public function expenseTypes()
    {
        return $this->hasMany(ExpenseType::class, 'user_id');
    }
}
