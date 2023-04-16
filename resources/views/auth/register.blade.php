@extends('layout.master')

@section('content')
    <div class="container">
      @if (session()->has('loginError'))
          <h3 class="text-danger mt-3">{{ session('loginError') }}</h3>
      @endif
        <form class="mt-5" action="" method="POST">
          @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}" aria-describedby="emailHelp">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" aria-describedby="emailHelp">
              @if ($errors->has('username'))
                  <span class="text-danger">{{ $errors->first('username') }}</span>
              @endif
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