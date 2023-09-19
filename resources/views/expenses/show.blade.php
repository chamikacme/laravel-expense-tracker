@extends('layout')

@section('content')
    <div class="container px-5 mt-2">
        <div class="card bg-light px-3 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center my-2">
                    <h2>{{ $expense['name'] }}</h2>
                    <div>
                        <a href="/expenses/{{ $expense['id'] }}/edit" class="btn btn-warning card-link mx-1"
                            style="width: 75px;">
                            Edit
                        </a>
                        <button type="button" class="btn btn-danger card-link mx-1" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $expense['id'] }}" style="width: 75px;">
                            Delete
                        </button>
                        <x-delete-modal :expense="$expense" />

                    </div>
                </div>


                <table class="table align-middle table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Attribute</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Amount
                            </td>
                            <td>
                                Rs.{{ $expense['amount'] }}/-
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Type
                            </td>
                            <td>
                                {{ $expense['expense_type']['type'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Description
                            </td>
                            <td>
                                {{ $expense['description'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Created at
                            </td>
                            <td>
                                {{ $expense['created_at'] }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Updated at
                            </td>
                            <td>
                                {{ $expense['updated_at'] }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
