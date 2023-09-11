<div class="modal fade" id="deleteTypeModal{{ $expenseType['id'] }}" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="deleteModalLabel">
                    Are you sure?
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deleting this will remove all the expenses related to this category also. <br>
                Do you want to delete expense type "{{ $expenseType->type }}"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="/expenses/types/{{ $expenseType->id }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </div>
        </div>
    </div>
</div>
