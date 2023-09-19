@extends('layout')

@section('content')

    <div class="container px-5 mt-2">
        <div class="card bg-light px-3 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center my-2">
                    <h2>Expense Types</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#expenseTypeModal">
                        Add New
                    </button>
                    <x-expense-type-modal />
                </div>

                <table class="table align-middle table-striped table-hover shadow-md">
                    <thead class="table-dark">
                        <tr>
                            <th>Expense Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless (count($expense_types) == 0)
                            @foreach ($expense_types as $expense_type)
                                @if ($expense_type['type'] !== 'Uncategorized')
                                    <x-expense-type-row :expense_type="$expense_type" />
                                @endif
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
