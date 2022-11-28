@extends("dashboard::layouts.tabler")

@section("content")
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('assets/dashboard/dist/static/logo.svg') }}" height="36" alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">{{ __("dashboard::login.label.email") }}</label>
                            <input type="email" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                {{ __("dashboard::login.label.password") }}
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control"  placeholder="Your password"  autocomplete="off">
                                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                    </a>
                  </span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input"/>
                                <span class="form-check-label">{{ __('dashboard::login.label.remember-me') }}</span>
                            </label>
                        </div>
                        <div class="form-footer mt-3">
                            <button type="submit" class="btn btn-primary w-100">{{ __('dashboard::login.label.sign-in') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
