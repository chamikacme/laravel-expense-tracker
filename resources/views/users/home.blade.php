@extends('layout')

@section('content')
    @auth

        <?php
        $total = array_sum($expenseTypeTotal->toArray());
        ?>

        <div class="container">

            <div class="px-3">

                <div class="d-flex flex-row align-items-stretch px-1 pb-1 pt-0">
                    <div class="card bg-light shadow-sm p-4 text-center w-100">
                        <h1>Hello {{ Auth::user()->name }}! </h1>
                        <h4>Expenses Dashboard</h4>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-stretch">
                    <div class="col-6 p-1">
                        <div class="card bg-light shadow-sm h-100 text-center">
                            <div class="card-header">
                                <h3 class="my-2">Total Expenses by Type</h3>
                            </div>
                            <div class="card-body">
                                <div class="col d-flex justify-content-center">
                                    @if (count($expenseTypeTotal) > 0)
                                        <x-expenses-chart :expenseTypeTotal="$expenseTypeTotal" />
                                    @else
                                        <p class="m-3">No expenses availabe</p><br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <div class="d-flex flex-row align-items-stretch">
                            <div class="col-6 p-1">
                                <div class="card bg-light shadow-sm h-100 text-center">
                                    <div class="card-header">
                                        <h4 class="m-0">Total Expenses</h4>
                                    </div>
                                    <div class="card-body d-flex align-items-center justify-content-center py-0">
                                        <p class="fs-2 m-0 fw-semibold">Rs.{{ $total }}/-</p>
                                    </div>

                                    <div class="card-footer">
                                        <p class="m-0">for {{ date('j') }} days </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-6 p-1">
                                <div class="card bg-light shadow-sm h-100 text-center">
                                    <div class="card-header">
                                        <h4 class="m-0">Monthly Quota</h4>
                                    </div>
                                    <div class="card-body py-0">
                                        <p class="fs-2 m-0 fw-semibold">
                                            {{ $total > 0 ? floor(($total / 25000) * 100) : 0 }}% used</p>
                                    </div>

                                    <div class="card-footer">
                                        <p class="m-0">of Rs.25000/-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-stretch">
                            <div class="col-4 p-1">
                                <div class="card bg-light shadow-sm h-100 text-center">
                                    <div class="card-header">
                                        <h5 class="m-0">
                                            #1 {{ $expenseTypeTotal->first() ? $expenseTypeTotal->keys()->first() : '-' }}
                                        </h5>
                                    </div>
                                    <div class="card-body py-0">
                                        <p class="fs-4 m-0 fw-semibold">
                                            Rs.{{ $expenseTypeTotal->first() ? $expenseTypeTotal->first() : '0' }}/-</p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0">
                                            {{ $expenseTypeTotal->first() ? floor(($expenseTypeTotal->first() / $total) * 100) : '0' }}%
                                            of Total</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 p-1">
                                <div class="card bg-light shadow-sm h-100 text-center">
                                    <div class="card-header">
                                        <h5 class="m-0">
                                            #2
                                            {{ $expenseTypeTotal->first()? $expenseTypeTotal->keys()->skip(1)->first(): '-' }}
                                        </h5>
                                    </div>
                                    <div class="card-body py-0">
                                        <p class="fs-4 m-0 fw-semibold">
                                            Rs.{{ $expenseTypeTotal->first() ? $expenseTypeTotal->skip(1)->first() : '0' }}/-
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0">
                                            {{ $expenseTypeTotal->first() ? floor(($expenseTypeTotal->skip(1)->first() / $total) * 100) : '0' }}%
                                            of Total</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 p-1">
                                <div class="card bg-light shadow-sm h-100 text-center">
                                    <div class="card-header">
                                        <h5 class="m-0">
                                            #3
                                            {{ $expenseTypeTotal->first()? $expenseTypeTotal->keys()->skip(2)->first(): '-' }}
                                        </h5>
                                    </div>
                                    <div class="card-body py-0">
                                        <p class="fs-4 m-0 fw-semibold">
                                            Rs.{{ $expenseTypeTotal->first() ? $expenseTypeTotal->skip(2)->first() : '0' }}/-
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0">
                                            {{ $expenseTypeTotal->first() ? floor(($expenseTypeTotal->skip(2)->first() / $total) * 100) : '0' }}%
                                            of Total</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-1">
                            <div class="card bg-light shadow-sm h-100 text-center">
                                <div class="card-header">
                                    <h5 class="m-0">Other Expenses List</h5>
                                </div>
                                <div class="card-body text-start">

                                    <div class="d-flex flex-wrap">
                                        @if (count($expenseTypeTotal->skip(3)) > 0)
                                            @foreach ($expenseTypeTotal->skip(3) as $key => $value)
                                                <div class="d-flex flex-row col-6">
                                                    <p class="m-0 col-6">- {{ $key }}</p>
                                                    <p class="m-0 col-6">: Rs.{{ $value }}/-</p>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="m-3">No other expenses</p><br>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <p class="m-0">
                                        {{ $expenseTypeTotal->skip(3) && $total > 0 ? floor((array_sum($expenseTypeTotal->skip(3)->toArray()) / $total) * 100) : '0' }}%
                                        of Total</p>
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
