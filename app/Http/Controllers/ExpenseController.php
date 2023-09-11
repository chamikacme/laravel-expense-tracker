<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ExpenseController extends Controller
{

    //Show all expenses
    public function index()
    {
        return view('expenses.index', [
            'expenses' => auth()->user()->expenses
        ]);
    }

    //Show single expenses
    public function show(Expense $expense)
    {
        if ($expense->user_id !== auth()->user()->id) {
            return redirect('/expenses');
        }
        return view('expenses.show', [
            'expense' => $expense
        ]);
    }

    // Show add form
    public function create()
    {
        return view('expenses.create', [
            'expense_types' => auth()->user()->expenseTypes
        ]);
    }

    // Store expense data
    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $formData['description'] = $request->input('description');
        $formData['expense_type_id'] = $request->input('expense_type_id');
        $formData['created_at'] = now();
        $formData['updated_at'] = now();
        $formData['user_id'] = auth()->user()->id;

        Expense::create($formData);

        return redirect('/expenses');
    }

    // Show edit form
    public function edit(Expense $expense)
    {
        if ($expense->user_id !== auth()->user()->id) {
            return redirect('/expenses');
        }

        Redirect::setIntendedUrl(url()->previous());
        return view('expenses.edit', ['expense' => $expense, 'expense_types' => auth()->user()->expenseTypes]);
    }

    // Update expense data
    public function update(Request $request, Expense $expense)
    {
        $formData = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $formData['description'] = $request->input('description');
        $formData['expense_type_id'] = $request->input('expense_type_id');
        $formData['updated_at'] = now();

        $expense->update($formData);

        return redirect()->intended();
    }

    // Delete listing
    public function destroy(Expense $expense)
    {
        if ($expense->user_id !== auth()->user()->id) {
            return redirect('/expenses');
        }

        $expense->delete();
        return redirect('/expenses');
    }
}
