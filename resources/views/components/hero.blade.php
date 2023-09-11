<div class="container px-5">

    <div class="card bg-light p-5 my-3 shadow-sm  text-center">
        @auth
            <h1>Hello {{ Auth::user()->name }}! </h1>
            <br>
            <p>Go to your expenses</p>
            <a class="btn btn-primary" href="/expenses">Expenses</a>
        @else
            <h1>Hello,</h1>
            <h2>Do wanna save money?</h2>
            <h3><a href="/register" class="text-laravel">Register</a> and keep track of your expenses!</h3>
            <p>Already have an account? <a href="/login" class="text-laravel">Login</a></p>

        @endauth

    </div>
</div>
