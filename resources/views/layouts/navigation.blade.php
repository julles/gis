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
        
        <?php
        $childs = $modelMenu->whereParentId($parent->id);
        ?>

          <li class="{{ $childs->count() > 0 ? 'dropdown' : '' }}">
            @if($childs->count() > 0)
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $parent->title }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                @foreach($childs->get() as $child)
                  <li><a href="{{ url($child->slug) }}/index">{{ $child->title }}</a></li>
                @endforeach
              </ul>
            @else
              <a href="{{ url($parent->slug) }}/index">{{ $parent->title }}</a>
            @endif
          </li>
      
        @endforeach
        <li><a href="{{ url('auth/logout') }}">Logout</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

