<div class="modal fade" id="deleteProfileModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="deleteModalLabel">
                    Are you sure?
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deleting your account will remove all the expenses data and this action will be non-reversible. <br><br>
                Do you still want to delete your account?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="/profile" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger card-link mx-1" style="width: 75px;">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
