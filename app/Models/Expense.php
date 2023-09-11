<?php

namespace App\Models;

use App\Models\ExpenseType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    //protected $fillable = ['desc','amount']

    //Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Relationship to ExpenseType
    public function expense_type()
    {
        return $this->belongsTo(ExpenseType::class, 'expense_type_id');
    }
}
