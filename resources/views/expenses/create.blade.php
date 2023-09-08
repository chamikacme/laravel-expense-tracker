<form method="POST" action="/expenses">
    @csrf

    <input type="text" id="desc" name="desc" placeholder="Expense" value="{{ old('desc') }}"><br>
    @error('desc')
        <p>
            {{ $message }}
        </p>
        <br>
    @enderror

    <input type="text" id="amount" name="amount" placeholder="Amount" value="{{ old('amount') }}"><br>
    @error('amount')
        <p>
            {{ $message }}
        </p>
        <br>
    @enderror

    <input type="submit" value="Add Expense">
</form>
