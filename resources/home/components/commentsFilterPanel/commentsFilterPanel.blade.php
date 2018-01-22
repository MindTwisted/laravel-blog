<div class="commentsFilterPanel">
  
  @if(isset($filters['post']) ||
     (isset($filters['approved']) &&
      $filters['approved'] === 'NOT_APPROVED'))
    
    <div class="commentsFilterPanel__activeFilters">
      <div class="alert alert-primary">
        <h4>Active Filters</h4>
        <p class="commentsFilterPanel__filterItem">
          Results: {{ $totalComments }}
        </p>
        @isset($filters['post'])
          <p class="commentsFilterPanel__filterItem">
            Post: {{ $posts->find($filters['post'])
                                        ->title or 'No such post' }}
          </p>
        @endisset
        @isset($filters['approved'])
          @if($filters['approved'] === 'NOT_APPROVED')
            <p class="commentsFilterPanel__filterItem">
              Only not approved comments
            </p>
          @endif
        @endisset
        <a href="{{ route('comments.index') }}">
          Reset filters
        </a>
      </div>
    </div>
  
  @endif
  
  <div class="commentsFilterPanel__panel">
    <div class="card">
      <div class="card-header">
        Filter comments
      </div>
      <div class="card-body">
        <form action="{{ route('comments.index') }}"
              method="GET">
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
</div>