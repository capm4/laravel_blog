<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">@lang('messages.main')</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto" style="margin-right: 50px">
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">
                @lang('messages.home')
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}">
                @lang('messages.about')
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('contact')}}">
                @lang('messages.contact')
              </a>
            </li>
            @guest
              <li><a class="btn btn-default" href="{{ route('login') }}">@lang('messages.login')</a></li>
              <li><a class="btn btn-default" href="{{ route('register') }}">@lang('messages.register')</a></li>
            @else
          </ul>
            <div class="dropdown">
                {!! Html::image('/img/user/'.Auth::user()->storeName.'/'.Auth::user()->image,'',array('class'=>'rounded-circle','style'=>'width: 35px;')) !!}

                <a class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                     <span style="color: #1d75b3"> {{ Auth::user()->name }}</span>
                </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('profile',array('id'=>Auth::user()->id ))}}">
                  @lang('messages.profile')
                </a>

                @if(Gate::allows('isAdmin',Auth::user()))
                  <a class="dropdown-item" href="{{route('admin_all_posts')}}">
                    @lang('messages.posts')
                  </a>
                  <a class="dropdown-item" href="{{route('admin_categories')}}">
                    @lang('messages.categories')
                  </a>
                  <a class="dropdown-item" href="{{route('admin_all_users')}}" >
                    @lang('messages.users')
                  </a>
                @endif
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  @lang('messages.logout')
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          @endguest
          <div class="dropdown" style="padding-top: 10px; margin-left: 15px">
            <a  data-toggle="dropdown" role="button" aria-expanded="false">
                <span  class="lang-xs" lang="{{Config::get('app.locale')}}"></span>
            </a>
            <ul class="dropdown-menu" style="min-width: 6em; padding-left: 5px" role="menu">
              <li><a id="navEn" href="{{route('lang',array('locale'=>'en'))}}" class="language">
                  <span class="lang-sm lang-lbl" lang="en"></span>
                </a></li>
              <li>
                <a id="naUk" href="{{route('lang',array('locale'=>'uk'))}}" class="language">
                  <span  class="lang-sm lang-lbl" lang="uk"></span>
                </a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
@if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
@endif
@if(Auth::user())

@endif

