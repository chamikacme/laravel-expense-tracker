@props(['expense_type'])

<tr>
    <td>{{ $expense_type['type'] }}</td>
    <td>
        <div class="row">

            <div class="col-auto">
                <button type="button" class="btn btn-warning card-link m-1 btn-sm" data-bs-toggle="modal"
                    data-bs-target="#expenseTypeModal{{ $expenseType['id'] }}" style="width: 75px;">
                    Edit
                </button>
                <x-edit-expense-type-modal :expense_type="$expense_type" />

            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-danger card-link m-1 btn-sm" data-bs-toggle="modal"
                    data-bs-target="#deleteTypeModal{{ $expenseType['id'] }}" style="width: 75px;">
                    Delete
                </button>
                <x-delete-type-modal :expense_type="$expense_type" />
            </div>
        </div>
    </td>
</tr>
