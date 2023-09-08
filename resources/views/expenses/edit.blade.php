<form method="POST" action="/expenses/{{ $expense->id }}">
    @csrf
    @method('PUT')

    <input type="text" id="desc" name="desc" placeholder="Expense" value="{{ $expense['desc'] }}"><br>
    @error('desc')
        <p>
            {{ $message }}
        </p>
        <br>
    @enderror

    <input type="text" id="amount" name="amount" placeholder="Amount" value="{{ $expense['amount'] }}"><br>
    @error('amount')
        <p>
            {{ $message }}
        </p>
        <br>
    @enderror

    <input type="submit" value="Update">
</form>
