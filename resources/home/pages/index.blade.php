@extends ('home.layouts.master')

@section('content')
  <div class="homePage">
    <div class="container-fluid">
      <div class="homePage__title">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
      </div>
      <div class="homePage__content">
        <ul>
          <li><a href="{{ route('posts.index') }}">Posts</a></li>
          <li><a href="{{ route('categories.index') }}">Categories</a></li>
          <li><a href="{{ route('tags.index') }}">Tags</a></li>
          <li><a href="{{ route('comments.index') }}">Comments</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
