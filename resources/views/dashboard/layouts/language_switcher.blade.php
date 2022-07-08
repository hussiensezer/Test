{{--Start Langauge Switcher--}}
<li class="nav-item dropdown dropdown-large">
    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown" title="اللغات">
        <div class="position-relative">
            @if (App::getLocale() == 'ar')
                {{--                                {{ LaravelLocalization::getCurrentLocaleName() }}--}}
                <img src="{{ URL::asset('assets/images/flags/SA.png') }}" alt="">
            @elseif(App::getLocale() == 'en')
                {{--                                {{ LaravelLocalization::getCurrentLocaleName() }}--}}
                <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
            @endif
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        {{-- <a href="javascript:;" title="اللغات">
            <div class="msg-header">
                <p class="msg-header-title">اللغات</p>
            </div>
        </a> --}}
        <div class="header-notifications-list" style="height:auto;">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" title="{{ $properties['native'] }}">
                    <div class="d-flex align-items-center">
                        <div class="notify text-primary">
                            @if ($localeCode == 'ar')
                                <img src="{{ URL::asset('assets/images/flags/SA.png') }}" alt="">
                            @elseif($localeCode == 'en')
                                <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                            @endif
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="msg-name"> {{ $properties['native'] }}</h6>
                        </div>
                    </div>
                </a>
            @endforeach


        </div>
    </div>
</li>
{{--End Langauge Switcher--}}
