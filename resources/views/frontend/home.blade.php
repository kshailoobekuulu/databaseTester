@extends('frontend.layout')
@section('content')

    <h1 class="text-center text-lg-left">Welcome to DatabaseTester</h1>
    <div class="float-lg-right main-image m-auto m-lg-0" style="background-image: url({{ asset('img/hosting.png') }})"></div>
    <p>
        Here you can solve problems and improve your skills. Before you start to use
        this site you have to register. If you have some problems while registering
        you can ask your teacher for help. Here what you can do:
    </p>
    <p class="font-weight-bold">You can write queries using following database syntax </p>
    <ul>
        <li>MySql</li>
        <li>PostgreSQL</li>
        <li>MsSQL</li>
    </ul>
    <p class="font-weight-bold">
        You can see your solutions
    </p>
    <p>
        If you solve any problem and after a while you need a solution of a problem
        you can get it. Below the problem there is a button "show last correct solution" and it
        it will show you last correct solution.
    </p>
    <p>
        Or if you are solving a problem and want to continue it later?
        Then just submit that solution and the system will remember that solution (Doesn't matter if there is
        syntax errors). And When you want to continue just click "show last solution" button below the problem.
    </p>
    <div>
        <a href="{{ route('frontend.tasks.index') }}" class="btn btn-success">
            Give It A Shot
        </a>
    </div>
@endsection
