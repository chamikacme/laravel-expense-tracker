@extends('layout')

@section('content')
    @auth


        <div class="container">

            <div class="px-3 py-2">
                <div class="row">
                    <div class="col p-1">
                        <div class="card bg-light shadow-sm p-4 text-center">

                            <h1>Hello {{ Auth::user()->name }}! </h1>
                            <h4>Expenses Dashboard</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 p-1">
                        <div class="card bg-light shadow-sm w-100 h-100 text-center">
                            <div class="card-header">
                                <h3 class="my-2">Total Expenses by Type</h3>
                            </div>
                            <div class="card-body">
                                <div class="col d-flex justify-content-center">
                                    <x-expenses-chart :expenseTypeTotal="$expenseTypeTotal" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6 p-1">
                                <div class="card bg-light shadow-sm w-100 h-100 text-center">
                                    <div class="card-header">
                                        <h4 class="m-0">Total Expenses</h4>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-center">
                                        <p class="fs-2 m-0">Rs.11500/-</p>
                                    </div>

                                    <div class="card-footer">
                                        <p class="m-0">for 13 days </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1">
                                <div class="card bg-light shadow-sm w-100 h-100 text-center">
                                    <div class="card-header">
                                        <h4 class="m-0">Monthly Quota</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="m-0"><span class="fs-2 m-0">35% used</span></p>
                                    </div>

                                    <div class="card-footer">
                                        <p class="m-0">of Rs.25000/-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 p-1">
                                <div class="card bg-light shadow-sm w-100 h-100 text-center">
                                    <div class="card-header">
                                        <h5 class="m-0">Education</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="m-0"><span class="fs-4 m-0">Rs.2500/-</span></p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0">45% of Total</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 p-1">
                                <div class="card bg-light shadow-sm w-100 h-100 text-center">
                                    <div class="card-header">
                                        <h5 class="m-0">Entertainment</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="m-0"><span class="fs-4 m-0">Rs.1600/-</span></p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0">28% of Total</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 p-1">
                                <div class="card bg-light shadow-sm w-100 h-100 text-center">
                                    <div class="card-header">
                                        <h5 class="m-0">Transport</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="m-0"><span class="fs-4 m-0">Rs.1510/-</span></p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0">25% of Total</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-1 h-auto">
                            <div class="col-12 m-0 p-0">
                                <div class="card bg-light shadow-sm p-0 w-100 h-100">
                                    <div class="card-header">
                                        <h5 class="m-0">Other Expenses List</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="m-0">
                                            <li>Other Expenses</li>
                                            <li>Other Expenses</li>
                                            <li>Other Expenses</li>
                                        </ul>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0">25% of Total</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @else
        <h1>Login</h1>
    @endauth
@endsection
