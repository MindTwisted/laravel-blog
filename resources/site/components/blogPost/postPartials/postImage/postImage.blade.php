<div class="imageBox imageBox--{{ $size }}">
  
  @component('site.components.skewedLine.skewedLine',
    ['vPosition' => 'top', 'hPosition' => 'right'])
  @endcomponent
  
  @if($size === 'small')
    @isset($post->thumbnail_path)
      <div class="imageBox__cover"
           style="background-image: url('{{ Storage::url($post->thumbnail_path) }}')">
      </div>
    @endisset
  @else
    @isset($post->image_path)
      <div class="imageBox__cover"
           style="background-image: url('{{ Storage::url($post->image_path) }}')">
      </div>
    @endisset
  @endif
</div>