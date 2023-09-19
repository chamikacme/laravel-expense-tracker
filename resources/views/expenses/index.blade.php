@extends('layout')

@section('content')

    <div class="container px-5 mt-2">
        <div class="card bg-light px-3 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center my-2">
                    <h2>All Expenses</h2>
                    <a class="btn btn-primary" href="/expenses/create" role="button">Add New</a>
                </div>


                <table class="table align-middle table-striped table-hover shadow-md">
                    <thead class="table-dark">
                        <tr>
                            <th>Expense</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless (count($expenses) == 0)
                            @foreach ($expenses as $expense)
                                <x-expense-row :expense="$expense" />
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">
                                    <p class="laravel-text my-2">No expenses found</p>
                                </td>
                            </tr>
                        @endunless

                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
