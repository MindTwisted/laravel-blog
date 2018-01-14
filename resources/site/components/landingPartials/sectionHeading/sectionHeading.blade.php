<div class="sectionHeading
{{ $centered or false ? ' sectionHeading--centered' : '' }}
{{ $light or false ? ' sectionHeading--light' : '' }}">
  
  <h2 class="sectionHeading__title">{{ $title }}</h2>
  
  <div class="sectionHeading__line"></div>
  
  @isset($description)
    <p class="sectionHeading__description">
      {{ $description }}
    </p>
  @endisset

</div>