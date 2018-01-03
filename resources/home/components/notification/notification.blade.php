<div class="notification">
  <div class="alert alert-{{ $className }}">
    <ul>
      @if (is_array($messages))
        @foreach ($messages as $message)
          @foreach ($message as $innerMessage)
            <li>{{ $innerMessage }}</li>
          @endforeach
        @endforeach
      @else
        <span>{{ $messages }}</span>
      @endif
    </ul>
  </div>
</div>

{{--TODO: Understand why colors doesn't changed--}}