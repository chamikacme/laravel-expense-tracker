<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    // Show home page
    public function home()
    {
        if (auth()->user() !== null) {
            $expenseTypeTotal = ExpenseType::selectRaw('expense_types.type, sum(expenses.amount) as total')
                ->leftJoin('expenses', 'expenses.expense_type_id', '=', 'expense_types.id')
                ->where('expense_types.user_id', auth()->user()->id)
                ->groupBy('expense_types.type')
                ->pluck('total', 'expense_types.type');

            $expenseTypeTotal->transform(function ($item, $key) {
                if ($item == null) {
                    $item = 0;
                }
                return $item;
            });

            return view('users.home', compact('expenseTypeTotal'));
        }
        $expenseTypeTotal = null;
        return view('users.home', compact('expenseTypeTotal'));
    }

    // Show register form
    public function create()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('users.create');
    }

    // Create new user
    public function store(Request $request)
    {
        // Validate the user
        $formData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        // Hash the password
        $formData['password'] = bcrypt($formData['password']);

        // Create and save the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        $formData['created_at'] = now();
        $formData['updated_at'] = now();

        $user = User::create($formData);

        // Sign the user in
        auth()->login($user);

        $expense_types = [
            'Uncategorized',
            'Transport',
            'Food',
            'Housing',
            'Clothing',
            'Healthcare',
            'Groceries',
            'Education',
            'Entertainment',
            'Personal'
        ];

        foreach ($expense_types as $expense_type) {
            $type = new ExpenseType();
            $type->type = $expense_type;
            $type->user_id = $user->id;
            $type->save();
        }

        // Redirect to home page
        return redirect()->intended();
    }

    //Logout user
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Show login form
    public function login()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('users.login');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($formData)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    // Show Profile
    public function show()
    {
        $user = auth()->user();
        return view('users.show', compact('user'));
    }

    // Show Edit Profile
    public function edit()
    {
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }

    // Update Profile
    public function update(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ]);

        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->updated_at = now();

        $user->update();

        return redirect('/profile');
    }

    //Delete account
    public function destroy()
    {
        $user = User::find(auth()->user()->id);
        $user->delete();
        return redirect('/');
    }
}
