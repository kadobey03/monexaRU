@extends('layouts.guest1')
@section('title', 'Забыли пароль?')
@section('content')
<div class="min-h-screen bg-gray-900 flex items-center justify-center p-4">
    <div class="w-full max-w-md space-y-8">
        <!-- Logo and Header -->
        <div class="text-center space-y-6">
            <div class="flex justify-center">
                <a href="/" class="inline-block">
                    <img src="{{ asset('storage/app/public/' . $settings->logo) }}"
                         alt="{{ $settings->site_name }}"
                         class="h-12 sm:h-16 w-auto">
                </a>
            </div>

            <!-- Header Section -->
            <div class="space-y-3">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <div class="p-2 bg-blue-500/20 rounded-lg">
                        <i data-lucide="mail" class="w-6 h-6 text-blue-400"></i>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-white">Забыли пароль?</h1>
                </div>
                <p class="text-gray-400 text-sm sm:text-base max-w-sm mx-auto leading-relaxed">
                    Не волнуйтесь! Введите свой адрес электронной почты, и мы отправим вам безопасную ссылку для сброса пароля вашего торгового аккаунта.
                </p>
            </div>
        </div>

        <!-- Forgot Password Form -->
        <div class="bg-gray-900 backdrop-blur-sm border border-gray-700 rounded-2xl p-6 sm:p-8 space-y-6">
            <!-- Error Message -->
            @error('email')
                <div class="p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                    <div class="flex items-center gap-3">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-red-400"></i>
                        <p class="text-red-300 text-sm font-bold">{{ $message }}</p>
                    </div>
                </div>
            @enderror

            <form action="{{ route('password.email') }}" method="post" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-bold text-gray-200">
                        Адрес электронной почты <span class="text-red-400">*</span>
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                            <i data-lucide="mail" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                        </div>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               required
                               class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-4 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold"
                               placeholder="ornek@email.com">
                    </div>
                    <p class="text-xs text-gray-400">
                        Введите адрес электронной почты, связанный с вашим торговым аккаунтом
                    </p>
                </div>

                <input type="hidden" name="subStep" value="1" />

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 focus:ring-2 focus:ring-blue-400/20">
                    <i data-lucide="send" class="w-5 h-5"></i>
                    <span>Отправить ссылку для сброса</span>
                </button>
            </form>

            <!-- Additional Options -->
            <div class="space-y-4 pt-4 border-t border-gray-700">
                <!-- Back to Login -->
                <div class="text-center">
                    <p class="text-gray-400 text-sm">
                        Помните пароль?
                        <a href="{{ route('login') }}"
                           class="font-bold text-blue-400 hover:text-blue-300 transition-colors underline underline-offset-2">
                            Вернуться к входу
                        </a>
                    </p>
                </div>

                <!-- Sign Up Link -->
                <div class="text-center">
                    <p class="text-gray-400 text-sm">
                        Нет аккаунта?
                        <a href="{{ route('register') }}"
                           class="font-bold text-green-400 hover:text-green-300 transition-colors underline underline-offset-2">
                            Создать торговый аккаунт
                        </a>
                    </p>
                </div>
            </div>

            <!-- Security Notice -->
            <div class="p-4 bg-amber-500/10 rounded-xl border border-amber-500/20">
                <div class="flex items-start gap-3">
                    <i data-lucide="shield-check" class="w-5 h-5 text-amber-400 mt-0.5 flex-shrink-0"></i>
                    <div>
                        <h4 class="text-sm font-bold text-amber-300 mb-1">Предупреждение безопасности</h4>
                        <p class="text-xs text-gray-300">
                            По соображениям безопасности ссылки для сброса пароля действительны в течение 60 минут.
                            Если вы не получили письмо, проверьте папку спам или свяжитесь с поддержкой.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust Indicators -->
        <div class="flex items-center justify-center gap-6 text-xs text-gray-500">
            <div class="flex items-center gap-1">
                <i data-lucide="shield" class="w-3 h-3"></i>
                <span>SSL Безопасность</span>
            </div>
            <div class="flex items-center gap-1">
                <i data-lucide="lock" class="w-3 h-3"></i>
                <span>256-битное шифрование</span>
            </div>
            <div class="flex items-center gap-1">
                <i data-lucide="award" class="w-3 h-3"></i>
                <span>Регулируемая платформа</span>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center">
            <p class="text-xs text-gray-500">
                © {{ date('Y') }} {{ $settings->site_name }}. Tüm hakları saklıdır. |
                Lisanslı ve düzenlenmiş ticaret platformu.
            </p>
        </div>
    </div>
</div>
@endsection
