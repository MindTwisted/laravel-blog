<div class="imageBox imageBox--{{ $size }}">
  
  @component('site.components.skewedLine.skewedLine',
    ['vPosition' => 'top', 'hPosition' => 'right'])
  @endcomponent
  
  @isset($post->thumbnail_path)
    <div class="imageBox__cover"
         style="background-image: url('{{ Storage::url($post->thumbnail_path) }}')">
    </div>
  @endisset
</div>