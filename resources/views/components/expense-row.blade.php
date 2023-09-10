@props(['expense'])

<tr>
    <td>{{ $expense['name'] }}</td>
    <td>{{ $expense['type'] }}</td>
    <td>{{ $expense['description'] }}</td>
    <td>Rs.{{ $expense['amount'] }}/-</td>
    <td>{{ $expense['created_at']->toDateString() }}</td>
    <td>
        <div class="row">
            <div class="col-auto">
                <a href="/expenses/{{ $expense['id'] }}" class="btn btn-outline-primary card-link m-1 btn-sm"
                    style="width: 75px;">
                    View
                </a>
            </div>
            <div class="col-auto">
                <a href="/expenses/{{ $expense['id'] }}/edit"class="btn btn-warning card-link m-1 btn-sm"
                    style="width: 75px;">
                    Edit
                </a>
            </div>
            <div class="col-auto">

                <button type="button" class="btn btn-danger card-link m-1 btn-sm" data-bs-toggle="modal"
                    data-bs-target="#deleteModal{{ $expense['id'] }}" style="width: 75px;">
                    Delete
                </button>

                <x-delete-modal :expense="$expense" />


            </div>
        </div>
    </td>
</tr>
