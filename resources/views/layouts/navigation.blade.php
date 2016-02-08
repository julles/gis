<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">{{ Helper::config('title') }}</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        @foreach($modelMenu->whereParentId(0)->orderBy('order')->get() as $parent)
          <li class="active"><a href="{{ url($parent->slug) }}/index">{{ $parent->title }}</a></li>
        @endforeach
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>