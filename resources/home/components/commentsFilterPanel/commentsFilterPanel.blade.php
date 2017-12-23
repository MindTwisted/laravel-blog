<div class="commentsFilterPanel">
  <div class="card">
    <div class="card-header">
      Filter comments
    </div>
    <div class="card-body">
      <form action="{{ route('comments.filter') }}">
        <div class="row commentsFilterPanel__formWrapper">
          <div class="col-md-4">
            <select class="form-control"
                    name="post">
              <option value="">Choose post ...</option>
              @foreach ($posts as $post)
                <option value="{{ $post->id }}">
                  {{ $post->title }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input"
                       type="checkbox"
                       name="approved"
                       value="NOT_APPROVED">
                Only unapproved comments
              </label>
            </div>
          </div>
          <div class="col-md-4">
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