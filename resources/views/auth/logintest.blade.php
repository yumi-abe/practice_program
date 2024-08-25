{{-- <x-guesttest> --}}
    <x-test-layout>
        <div class="text-center my-10">
            <h2 class="text-2xl">Reserve</h2>
            <p class="my-4">
                ご予約にはアカウント作成が必要です。<br>
                作成がまだの方はご登録お願いします。
            </p>
            <x-primary-button>
                <a class="text-base" href="{{ route('user.register') }}">新規登録</a>
            </x-primary-button>
            {{-- <p class="my-4">
                作成済みの方はログインページへお進みください。
            </p>
            <x-primary-button>
                <a class="text-base" href="{{ route('user.login') }}">ログイン</a>
            </x-primary-button> --}}
            
        </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="w-3/4 lg:w-2/5  mx-auto my-10">
        <form method="POST" action="{{ route('user.login') }}" class="flex flex-col" >
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full " type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-brown-500 shadow-sm focus:ring-brown-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
    
            <div class="flex justify-end items-center  mt-4">
                @if (Route::has('user.password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('user.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
    
                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
{{-- </x-guesttest> --}}
</x-test-layout>

