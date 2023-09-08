<h2>
    {{ $expense['desc'] }}
</h2>
<p>
    Rs.{{ $expense['amount'] }}.00
</p>

<a href="/expenses/{{ $expense['id'] }}/edit">Edit</a>

<form method="POST" action="/expenses/{{ $expense->id }}">
    @csrf
    @method('DELETE')

    <button>Delete</button>
</form>
