<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link  rel="icon" type="image/svg+xml" href="{{ asset(config('appconstants.favicon')) }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('constants.app.title') }}</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

        {{-- <link rel="stylesheet" href="{{ asset('css/bulma.css') }}"> --}}

        <style>
            html {height: 100%;}
            body {background: #e6e6e6;min-height: 100%;}
        </style>
    </head>

    <body>
        <section class="section container is-max-desktop">

            <div class="column is-half is-offset-one-quarter">

                <nav class="level">
                    <!-- Left side -->
                    <div class="level-left">
                        <p class="has-text-weight-light my-0">
                            <a href="/forgot-password">{{__('ui.links.forgot.text')}}</a>
                        </p>
                    </div>
                  
                    <nav class="breadcrumb has-bullet-separator is-right level-right" aria-label="breadcrumbs">
                        <ul>
                            <li class="{{ app()->getLocale() == 'tr' ? 'is-active':''}}">
                            <a href="{{ route('lang.switch', 'tr') }}">TR</a>
                        </li>
                        <li class="{{ app()->getLocale() == 'en' ? 'is-active':''}}">
                            <a href="{{ route('lang.switch', 'en') }}">EN</a>
                        </li>
                        </ul>
                    </nav>

                </nav>
            </div>

            <div class="column is-half is-offset-one-quarter has-background-white">

                <div class="column is-offset-3 is-offset-4-mobile is-6 is-4-mobile my-6">
                    <figure class="image p-3">
                        <x-carbon-tree-view-alt class="is-large"/>
                    </figure>
                </div>

                {{$slot}}

            </div>

            <div class="column is-half is-offset-one-quarter">

                <div class="columns">

                    <div class="column is-half has-text-centered-mobile">
                        <a href="{{config('constants.company.link')}}">
                            <img src="{{asset('/images/baykus_orange.svg')}}" width="24px" alt="{{config('appconstants.kapkara.name')}}">
                        </a>
                    </div>

                    <div class="column is-offset-one-quarter has-text-right has-text-centered-mobile">
                        {{-- <a href="{{config('appconstants.company.link')}}">{{config('appconstants.kapkara.name')}}</a> --}}

                        <p class="has-text-right is-size-6 has-text-weight-light my-0">
                            <a href="/register">{{__('ui.links.register.text')}}</a>
                        </p>
                    </div>


                </div>

            </div>

        </section>
    </body>
</html>
