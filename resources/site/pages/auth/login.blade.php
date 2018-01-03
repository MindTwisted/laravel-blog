@extends('site.layouts.master')

@section('content')
  <div class="loginPage">
    <div class="container-fluid">
      <div class="row justify-content-md-center">
        <div class="col-lg-6 col-md-8">
          <div class="card loginPage__formWrapper">
            <div class="card-header">Login</div>
            
            <div class="card-body">
              <form class="form-horizontal"
                    method="POST"
                    action="{{ route('login') }}">
                {{ csrf_field() }}
                
                <div class="form-group">
                  <label for="email">E-Mail Address</label>
                  
                  <input id="email"
                         type="email"
                         class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                         name="email"
                         value="{{ old('email') }}"
                         required
                         autofocus>
                  
                  @if ($errors->has('email'))
                    <div class="invalid-feedback">
                      {{ $errors->first('email') }}
                    </div>
                  @endif
                
                </div>
                
                <div class="form-group">
                  <label for="password"
                         class="col-md-4 control-label">Password</label>
                  
                  
                  <input id="password"
                         type="password"
                         class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                         name="password"
                         required>
                  
                  @if ($errors->has('password'))
                    <div class="invalid-feedback">
                      {{ $errors->first('password') }}
                    </div>
                  @endif
                
                </div>
                
                <div class="form-group">
                  
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input"
                             type="checkbox"
                             name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                  </div>
                
                </div>
                
                <div class="form-group">
                  <button type="submit"
                          class="btn btn-primary">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
