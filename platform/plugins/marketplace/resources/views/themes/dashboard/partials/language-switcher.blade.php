@php
    $supportedLocales = Language::getSupportedLocales();
    if (!isset($options) || empty($options)) {
        $options = [
            'before' => '',
            'lang_flag' => true,
            'lang_name' => true,
            'class' => '',
            'after' => '',
        ];
    }
@endphp

@if ($supportedLocales && count($supportedLocales) > 1)
    @php
        $languageDisplay = setting('language_display', 'all');
        $showRelated = setting('language_show_default_item_if_current_version_not_existed', true);
    @endphp
    @if (setting('language_switcher_display', 'dropdown') == 'dropdown')
        <li class="nav-item me-3">
            {!! Arr::get($options, 'before') !!}
            <div class="ps-dropdown language">
            <span>
                @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag'))
                    {!! language_flag(Language::getCurrentLocaleFlag(), Language::getCurrentLocaleName()) !!}
                @endif
                @if (Arr::get($options, 'lang_name', true) && ($languageDisplay == 'all' || $languageDisplay == 'name'))
                    {{ Language::getCurrentLocaleName() }}
                @endif
                <span class="caret"></span>
            </span>
                <ul class="ps-dropdown-menu {{ Arr::get($options, 'class') }}">
                    @foreach ($supportedLocales as $localeCode => $properties)
                        @if ($localeCode != Language::getCurrentLocale())
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ $showRelated ? Language::getLocalizedURL($localeCode) : url($localeCode) }}">
                                    @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag')){!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}@endif
                                    @if (Arr::get($options, 'lang_name', true) && ($languageDisplay == 'all' || $languageDisplay == 'name'))<span>{{ $properties['lang_name'] }}</span>@endif
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            {!! Arr::get($options, 'after') !!}
        </li>
    @else
        @foreach ($supportedLocales as $localeCode => $properties)
            @if ($localeCode != Language::getCurrentLocale())
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ $showRelated ? Language::getLocalizedURL($localeCode) : url($localeCode) }}">
                        @if (Arr::get($options, 'lang_flag', true) && ($languageDisplay == 'all' || $languageDisplay == 'flag')){!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}@endif
                        @if (Arr::get($options, 'lang_name', true) && ($languageDisplay == 'all' || $languageDisplay == 'name'))<span>{{ $properties['lang_name'] }}</span>@endif
                    </a>
                </li>
            @endif
        @endforeach
    @endif
@endif
