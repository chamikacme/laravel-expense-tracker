<div class="modal fade" id="expenseTypeModal" tabindex="-1" aria-labelledby="expenseTypeModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="expenseTypeModalLabel">
                    Add Expense Type
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 align-items-center" method="POST" action="/expenses/types">
                    @csrf

                    <div class="col-auto">
                        <label>Expense Type</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="expense-type" name="type">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Add</button>
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
