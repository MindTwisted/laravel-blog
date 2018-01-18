@extends('site.layouts.master')

@section('content')
  <div class="loginPage">
    
    @component('site.components.secondaryHeader.secondaryHeader',
      ['breadcrumbName' => 'login'])
      @slot('title')
        Login
      @endslot
    @endcomponent
    
    <div class="container-fluid">
      <div class="row justify-content-md-center">
        <div class="col-lg-6 col-md-8">
          <form method="POST"
                class="loginPage__form"
                action="{{ route('login') }}">
            {{ csrf_field() }}
            
            <div class="form-group">
              <input id="email"
                     type="email"
                     class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                     name="email"
                     value="{{ old('email') }}"
                     required
                     autofocus>
              
              <label for="email">E-Mail Address</label>
              
              @if ($errors->has('email'))
                <div class="invalid-feedback">
                  {{ $errors->first('email') }}
                </div>
              @endif
            
            </div>
            
            <div class="form-group">
              <input id="password"
                     type="password"
                     class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                     name="password"
                     required>
              
              <label for="password">Password</label>
              
              @if ($errors->has('password'))
                <div class="invalid-feedback">
                  {{ $errors->first('password') }}
                </div>
              @endif
            
            </div>
            
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input"
                       type="checkbox"
                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember Me</label>
            </div>
            
            <div class="form-group">
              <button type="submit"
                      class="btn btn-outline-danger">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
