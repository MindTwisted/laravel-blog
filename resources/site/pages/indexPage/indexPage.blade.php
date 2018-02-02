@extends('site.layouts.master')

@section('title')
  Home
@endsection

@section('content')
  <div class="indexPage">
    @component('site.components.mainNavbar.mainNavbar')
    @endcomponent
    
    @component('site.components.landingPartials.landingHeader.landingHeader')
    @endcomponent
    
    @component('site.components.landingPartials.sectionAbout.sectionAbout')
    @endcomponent
    
    @component('site.components.landingPartials.sectionParallax.sectionParallax')
    @endcomponent
    
    @component('site.components.landingPartials.teaserAchievements.teaserAchievements')
    @endcomponent
    
    @component('site.components.landingPartials.sectionBlog.sectionBlog', compact('posts'))
    @endcomponent
    
    @component('site.components.landingPartials.teaserBrands.teaserBrands')
    @endcomponent
    
    @component('site.components.landingPartials.sectionReviews.sectionReviews')
    @endcomponent
    
    @component('site.components.landingPartials.sectionContacts.sectionContacts')
    @endcomponent
    
    @component('site.components.landingPartials.sectionMap.sectionMap')
    @endcomponent
    
    @component('site.components.mainFooter.mainFooter')
    @endcomponent
  </div>
@endsection

@section('scripts')
  {{--Load google map--}}
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu1s0G5DALQ1_ssXgddOX7T69PxY5_4v4"></script>
@endsection
