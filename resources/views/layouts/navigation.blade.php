
<nav class="navbar default-layout col-lg-12 col-12 p-0  fixed-top d-flex align-items-top flex-row border-bottom">
   
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>

        <div>
            <a class="navbar-brand brand-logo text-danger" href="{{ route('pat_progress.index') }}">
                My Afya Card
            </a>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
              </button>
        </div>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-top">
  
        <ul class="navbar-nav ms-auto">

            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                <div>{{ Auth::user()->name }}</div>
                <div class="ms-1">
                    <i class="mdi mdi-chevron-down text-danger"></i>
                </div>
            </button>
                </x-slot>


            <x-slot name="content">
                <x-dropdown-link class="text-center border-bottom">
                    <p class="mt-2 font-weight-semibold">  <span class="mdi mdi-hospital text-primary"> </p>
                    <p class="mb-1 mt-1 font-weight-semibold">  {{ Auth::user()->name }}</p>
                    <p class="fw-light text-muted mb-0">  {{ Auth::user()->email }}</p>
                </x-dropdown-link>
                <x-dropdown-link :href="route('profile.edit')" class="border-bottom flex gap-3">
                    <span class="mdi mdi-account text-primary"></span> <span> Profile </span>
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                    class="flex gap-3"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{-- {{ __('Log Out') }} --}}
                        <span class="mdi mdi-logout text-danger"></span> <span> Log out </span>
                    </x-dropdown-link>
                </form>
            </x-slot>
            </x-dropdown>

        </ul>
     
       
    </div>
</nav>
