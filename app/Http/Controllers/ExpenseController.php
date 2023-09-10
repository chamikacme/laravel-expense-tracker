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
            'expenses' => Expense::all()
        ]);
    }

    //Show single expenses
    public function show(Expense $expense)
    {
        return view('expenses.show', [
            'expense' => $expense
        ]);
    }

    // Show add form
    public function create()
    {
        return view('expenses.create');
    }

    // Store expense data
    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $formData['description'] = $request->input('description');
        $formData['type'] = $request->input('type');
        $formData['created_at'] = now();
        $formData['updated_at'] = now();

        Expense::create($formData);

        return redirect('/');
    }

    // Show edit form
    public function edit(Expense $expense)
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('expenses.edit', ['expense' => $expense]);
    }

    // Update expense data
    public function update(Request $request, Expense $expense)
    {
        $formData = $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $formData['description'] = $request->input('description');

        $formData['type'] = $request->input('type');

        $formData['updated_at'] = now();

        $expense->update($formData);

        return redirect()->intended();
    }

    // Delete listing
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect('/');
    }
}
