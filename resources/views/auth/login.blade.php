@extends('layout.master')

@section('content')
    <div class="container">
      @if (session()->has('loginError'))
          <h3 class="text-danger mt-3">{{ session('loginError') }}</h3>
      @endif
        <form class="mt-5" action="/login" method="POST">
          @csrf
            <div class="mb-3">
              <label for="username" class="form-label">Email address</label>
              <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" aria-describedby="emailHelp">
              @if ($errors->has('username'))
                  <span class="text-danger">{{ $errors->first('username') }}</span>
              @endif
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
              @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection