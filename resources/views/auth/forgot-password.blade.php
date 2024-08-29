<x-home-layout>
    <div class="flex flex-col justify-center w-3/4 lg:w-2/5 mx-auto">
        <div class="mt-8 mb-4 text-sm text-gray-600">
            ご登録いただいたメールアドレスを入力してください。<br>
            パスワード再設定用のURLをメールにてお送りします。
        </div>
    
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('user.password.email') }}" class="flex flex-col">
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-center  mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-home-layout>
