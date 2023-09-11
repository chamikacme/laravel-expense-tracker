@extends('layout')

@section('content')
    <div class="container px-5">
        <div class="card bg-light px-3 shadow-sm">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center my-2">
                    <h2>Profile</h2>
                    <div>
                        <a href="#" class="btn btn-warning card-link mx-1" style="width: 75px;">
                            Edit
                        </a>
                        <button type="button" class="btn btn-danger card-link mx-1" style="width: 75px;">
                            Delete
                        </button>
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
                                Name
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Created at
                            </td>
                            <td>
                                {{ $user->created_at->toDateTimeString() }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Updated at
                            </td>
                            <td>
                                {{ $user->updated_at->toDateTimeString() }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
