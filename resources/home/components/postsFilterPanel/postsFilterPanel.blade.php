<div class="postsFilterPanel">
  <div class="card">
    <div class="card-header">
      Filter posts
    </div>
    <div class="card-body">
      <form action="{{ route('posts.filter') }}">
        <div class="row postsFilterPanel__formWrapper">
          <div class="col-md-3">
            <input type="text"
                   class="form-control"
                   name="text"
                   placeholder="Enter filter query">
          </div>
          <div class="col-md-3">
            <select class="form-control"
                    name="category">
              <option value="">Choose category ...</option>
              <option value="NO_CATEGORY">Without category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                  {{ $category->title }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input"
                       type="checkbox"
                       name="order"
                       value="DESC">
                Latest posts first
              </label>
            </div>
          </div>
          <div class="col-md-3">
            <button type="submit"
                    class="btn btn-primary">
              Submit
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>