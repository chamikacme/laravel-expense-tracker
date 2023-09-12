<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    //Show expense types of authenticated user
    public function index()
    {

        return view('expense-types.index', [
            'expense_types' => auth()->user()->expenseTypes
        ]);
    }



    //Store expense type
    public function store(Request $request)
    {
        //check whether if this type already exists under this user
        $request->validate([
            'type' => 'required|unique:expense_types,type,NULL,id,user_id,' . auth()->user()->id
        ]);

        $expense_type = new ExpenseType();
        $expense_type->type = $request->input('type');
        $expense_type->user_id = auth()->user()->id;

        $expense_type->created_at = now();
        $expense_type->updated_at = now();

        $expense_type->save();

        return redirect('expenses/types');
    }


    //Update expense type
    public function update(Request $request, ExpenseType $expenseType)
    {
        $request->validate([
            'type' => 'required|unique:expense_types,type,' . $expenseType->id . ',id,user_id,' . auth()->user()->id
        ]);

        $expenseType->type = $request->type;
        $expenseType->updated_at = now();

        $expenseType->update();

        return redirect('expenses/types');
    }

    //Delete expense type
    public function destroy(ExpenseType $expenseType)
    {
        if ($expenseType->user_id !== auth()->user()->id) {
            return redirect('/expenses/types');
        }

        $expenseType->delete();
        return redirect('/expenses/types');
    }
}
