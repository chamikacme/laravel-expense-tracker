@extends('layout')

@section('content')
    <div class="container px-5  mt-2">

        <div class="card bg-light px-3 shadow-sm">
            <div class="card-body">
                <div class="align-items-center my-2 pb-1">
                    <h2>Edit Expense</h2>
                </div>
                <form method="POST" action="/expenses/{{ $expense->id }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Expense</label>
                        <input class="form-control" type="text" id="name" name="name"
                            value="{{ $expense['name'] }}">
                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input class="form-control" type="text" id="amount" name="amount"
                            value="{{ $expense['amount'] }}">
                        @error('amount')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description (Optional)</label>
                        <input class="form-control" type="text" id="description" name="description"
                            value="{{ $expense['description'] }}">
                        @error('description')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Expense Type</label>
                        <select class="form-control form-select" type="text" id="type" name="expense_type_id"
                            value="{{ old('type') }}" aria-placeholder="Expense Type">
                            @unless (count($expense_types) === 0)
                                @foreach ($expense_types as $expense_type)
                                    <option value={{ $expense_type->id }}
                                        {{ $expense['expense_type_id'] == $expense_type->id ? 'selected' : '' }}>
                                        {{ $expense_type->type }}</option>
                                @endforeach
                            @else
                                <option value="Uncategorized">No Categories</option>
                            @endunless
                        </select>
                        @error('type')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="d-grid mt-4">

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-3">Cancel</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
