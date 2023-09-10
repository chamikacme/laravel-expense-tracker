<div class="modal fade" id="deleteModal{{ $expense['id'] }}" tabindex="-1" aria-labelledby="deleteModalLabel"
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
                Do you want to delete "{{ $expense->name }}" expense of Rs.{{ $expense->amount }}/-?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="/expenses/{{ $expense->id }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </div>
        </div>
    </div>
</div>
