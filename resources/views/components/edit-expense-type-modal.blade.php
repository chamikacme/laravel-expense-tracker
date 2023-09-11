<div class="modal fade" id="expenseTypeModal{{ $expenseType['id'] }}" tabindex="-1" aria-labelledby="expenseTypeModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="expenseTypeModalLabel">
                    Edit Expense Type
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 align-items-center" method="POST"
                    action="/expenses/types/{{ $expenseType['id'] }}/edit">
                    @csrf
                    @method('PUT')

                    <div class="col-auto">
                        <label>Expense Type</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="expense-type" name="type"
                            value="{{ $expenseType['type'] }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    @error('type')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </form>


            </div>
        </div>
    </div>
</div>
