<nav class="navbar is-dark">

    <div class="navbar-brand">

        <a  href="/" class="navbar-item has-text-white has-background-danger-dark">
            <span class="icon has-text-dark">
                <x-carbon-tree-view-alt/>
            </span>
            <span class="ml-2">{{ config('appconstants.app.name') }}</span>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar_ana">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>

    </div>

    <div id="navbar_ana" class="navbar-menu">

        <div class="navbar-start" id="navstart">

            @if(Auth::check())

                {{-- <a href="/companies" class="navbar-item icon-text">
                    <span class="icon has-text-warning">
                        <x-carbon-letter-cc />
                    </span>
                    <span>Companies</span>
                </a> --}}



                <div class="navbar-item has-dropdown is-hoverable">

                    <a class="navbar-link">
                        <span class="icon has-text-warning">
                            <x-carbon-letter-pp />
                        </span>
                        <span class="ml-2">Projects</span>
                    </a>

                    <div class="navbar-dropdown">
                        <a href="/projects" class="navbar-item">Projects List</a>
                        <a href="/endproducts" class="navbar-item">Project > End Products</a>
                        <a href="/dgates" class="navbar-item">Project > Decision Gates</a>
                        <a href="/phases" class="navbar-item">Project > Project Phases</a>
                        <a href="/witness" class="navbar-item">Project > Witnesses</a>

                    </div>
                </div>

                <a href="/requirements" class="navbar-item icon-text">
                    <span class="icon has-text-warning">
                        <x-carbon-layers/>
                    </span>
                    <span>Requirements</span>
                </a>

                <a href="/mocs" class="navbar-item icon-text">
                    <span class="icon has-text-warning">
                        <x-carbon-rule />
                    </span>
                    <span>MoCs</span>
                </a>

                <a href="/pocs" class="navbar-item icon-text">
                    <span class="icon has-text-warning">
                        <x-carbon-policy />
                    </span>
                    <span>PoCs</span>
                </a>






                <div class="navbar-item has-dropdown is-hoverable">
                    <p class="navbar-link" href="/Admin">Export</p>
                    <div class="navbar-dropdown">

                        <a href="/all-requirements" class="navbar-item">All Requirements</a>
                        <a href="/pocs-vs-requirements" class="navbar-item">POCs vs Requirements</a>
                        <a href="/dgates-vs-pocs" class="navbar-item">Decision Gates vs POCs</a>
                        <a href="/compliance-matrix" class="navbar-item">Compliance Matrix</a>



                    </div>
                </div>


                {{-- <div class="navbar-item has-dropdown is-hoverable">

                    <a href="/projects" class="navbar-link">
                        <span class="icon has-text-warning">
                            <x-carbon-letter-aa />
                        </span>
                        <span class="ml-2">Adm</span>
                    </a>

                    <div class="navbar-dropdown">
                        <a href="/admin/users" class="navbar-item">Users</a>
                        <a href="/admin/roles" class="navbar-item">Roles</a>
                        <a href="/admin/permissions" class="navbar-item">Permissions</a>
                    </div>
                </div> --}}

            @endif

        </div>


        <div class="navbar-end">

            @if(Auth::check())

                <div class="navbar-item has-dropdown is-hoverable">

                    <p class="navbar-link">
                        <span class="mx-3 has-text-right">
                            {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                            {{-- <span class="block has-text-warning is-size-7">{{session('selected_bina')}}</span> --}}
                        </span>
                    </p>



                    <div class="navbar-dropdown">

                        <a href="/profile" class="navbar-item">Profile</a>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a :href="route('logout')" class="navbar-item"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('ui.links.logout.text') }}
                            </a>
                        </form>

                    </div>
                </div>
            @else

                <div class="navbar-item">
                    <a href="{{route('login')}}" class="icon-text">
                        <span class="icon has-text-info">
                            <x-carbon-login />
                        </span>
                        <span class="ml-1">{{ __('ui.links.login.text')}}</span>
                    </a>
                </div>

            @endif

        </div>

    </div>

</nav>


@if (session('current_project_id') && session('current_project_name'))

<section class="hero has-background-grey-lighter has-text-right">

    <p class="is-size-7 p-1">
      Current Project : {{ session('current_project_name') }}
    </p>
</section>

@endif

