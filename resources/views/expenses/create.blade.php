@extends('layout')

@section('content')
    <div class="container px-5">

        <div class="card bg-light px-3 shadow-sm">
            <div class="card-body">
                <div class="align-items-center my-2 pb-1">
                    <h2>Add New Expense</h2>
                </div>
                <form method="POST" action="/expenses">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Expense</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input class="form-control" type="text" id="amount" name="amount"
                            value="{{ old('amount') }}">
                        @error('amount')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description (Optional)</label>
                        <input class="form-control" type="text" id="description" name="description"
                            value="{{ old('description') }}">
                        @error('description')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Expense Type</label>
                        <select class="form-control form-select" type="text" id="type" name="type"
                            value="{{ old('type') }}" aria-placeholder="Expense Type">
                            <option value="Uncategorized">Choose an option</option>
                            <option value="Food">Food</option>
                            <option value="Transport">Transport</option>
                            <option value="Groceries">Groceries</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('type')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="d-grid mt-4">

                        <button type="submit" class="btn btn-primary">Add Expense</button>
                        <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-3">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
