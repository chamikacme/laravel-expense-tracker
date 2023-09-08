<h1>Expenses</h1>
<a href="/expenses/create">Add New</a>
@unless (count($expenses) == 0)
    @foreach ($expenses as $expense)
        <h2><a href="/expenses/{{ $expense['id'] }}">
                {{ $expense['desc'] }}
            </a>
        </h2>
        <p>
            {{ $expense['amount'] }}
        </p>
        <hr>
    @endforeach
@else
    <p>No expenses found</p>
@endunless
