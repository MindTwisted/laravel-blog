@extends('site.layouts.master')

@section('content')
  <div class="indexPage">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-3">Lorem ipsum dolor sit amet.</h1>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias atque dolores ducimus
                error, esse eum illum ipsum nam nihil quis quisquam recusandae repellat sapiente vel voluptatibus!
                Dolore
                fugiat nesciunt quo?</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="indexPage__section">
        <div class="row">
          <div class="col-md-12">
            <div class="indexPage__heading">
              <h2>Latest from blog</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, laudantium?</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            @if(count($posts) > 0)
              <div class="indexPage__postsCarousel owl-carousel">
                @foreach($posts as $post)
                  <div class="indexPage__carouselItem">
                    <div class="card">
                      @isset($post->thumbnail_path)
                        <img src="{{ Storage::url($post->thumbnail_path) }}"
                             alt="Post thumbnail"
                             class="card-img-top">
                      @endisset
                      <div class="card-body">
                        <h4 class="card-title">
                          {{ $post->title }}
                        </h4>
                        <a href="#"
                           class="btn btn-success">Read post</a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="indexPage__viewMorePosts">
                <a href="#"
                   class="btn btn-primary">View more</a>
              </div>
            @else
              <h3 class="text-center">There is no posts</h3>
            @endif
          </div>
        </div>
      </div>
      <div class="indexPage__section">
        <div class="row">
          <div class="col-md-12">
            <div class="indexPage__heading">
              <h2>Contact us</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, laudantium?</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
            <form action="">
              <div class="form-group">
                <label for="nameInput">Name</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       id="nameInput"
                       placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="emailInput">Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       id="emailInput"
                       placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="messageArea">Message</label>
                <textarea name="message"
                          class="form-control"
                          id="messageArea"
                          rows="5"></textarea>
              </div>
              <div class="form-group">
                <button type="submit"
                        class="btn btn-primary">Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="indexPage__footer">
      All rights reserved &copy; 2017
    </div>
  </div>
@endsection