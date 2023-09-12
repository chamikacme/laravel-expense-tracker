@extends('layout')

@section('content')
    <x-hero />
    <div class="container px-5">

        <div class="card bg-light px-3 shadow-sm text-center">

            <h2 class="m-3">Total Expenses</h2>
            <div class="w-50">
                <x-expenses-chart :expenseTypeTotal="$expenseTypeTotal" />
            </div>
            <div class="w-50">

            </div>
        </div>
    </div>
@endsection
