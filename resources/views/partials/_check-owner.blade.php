@if ($expense->user_id !== auth()->user()->id)
    {{ redirect('/expenses') }}
@endif
