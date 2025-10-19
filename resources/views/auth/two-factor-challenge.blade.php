@extends('layouts.guest1')
@section('title', 'Двухфакторная аутентификация - Безопасный вход')
@section('content')

<!-- Modern 2FA Authentication -->
<div class="min-h-screen bg-gray-900 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">

        <!-- 2FA Authentication Card -->
        <div class="bg-gray-900 rounded-2xl p-8 shadow-2xl border border-gray-700">

            <!-- Header Section -->
            <div class="text-center mb-8">
                <!-- Security Icon -->
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-blue-500/10 mb-4">
                    <i data-lucide="shield-check" class="h-8 w-8 text-blue-400"></i>
                </div>

                <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">
                    Двухфакторная аутентификация
                </h1>
                <p class="text-gray-400 text-sm md:text-base">
                    Защитите ваш торговый счет дополнительным уровнем защиты
                </p>
            </div>

            <!-- Security Notice -->
            <div class="mb-6 p-4 bg-blue-500/10 border border-blue-500/20 rounded-xl">
                <div class="flex items-start gap-3">
                    <i data-lucide="mail" class="w-5 h-5 text-blue-400 mt-0.5 flex-shrink-0"></i>
                    <div class="text-sm">
                        <p class="text-blue-300 font-bold mb-1">Код аутентификации отправлен</p>
                        <p class="text-gray-300">
                            На ваш зарегистрированный email отправлен 6-значный код подтверждения. Для продолжения проверьте входящие сообщения и введите код ниже.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Error Message -->
            @if (Session::has('message'))
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                    <div class="flex items-center gap-3">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-red-400 flex-shrink-0"></i>
                        <span class="text-red-300 text-sm font-medium">{{ Session::get('message') }}</span>
                    </div>
                </div>
            @endif

            <!-- 2FA Form -->
            <form method="POST" action="{{ route('twofalogin') }}" class="space-y-6">
                @csrf

                <!-- Code Input -->
                <div class="space-y-2">
                    <label for="twofa" class="block text-sm font-bold text-gray-200">
                        Код подтверждения
                    </label>
                    <div class="relative">
                        <input
                            type="password"
                            id="twofa"
                            name="twofa"
                            class="w-full px-4 py-3 bg-gray-900 border border-gray-600 rounded-xl text-white placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition-all duration-200 text-center text-lg tracking-wider font-mono"
                            placeholder="000000"
                            maxlength="6"
                            pattern="[0-9]{6}"
                            autocomplete="one-time-code"
                            required
                            autofocus
                        >
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i data-lucide="key" class="h-5 w-5 text-gray-400"></i>
                        </div>
                    </div>
                    @error('twofa')
                        <div class="flex items-center gap-2 text-red-400 text-sm">
                            <i data-lucide="alert-circle" class="w-4 h-4"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Security Tips -->
                <div class="bg-gray-800/50 rounded-lg p-4 border border-gray-700">
                    <h4 class="text-white font-bold text-sm mb-2 flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 text-blue-400"></i>
                        Советы по безопасности
                    </h4>
                    <ul class="text-gray-300 text-xs space-y-1">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            Не делитесь вашим 2FA кодом ни с кем
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            Для безопасности код истекает через 10 минут
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">•</span>
                            Если код не пришел, проверьте папку спам
                        </li>
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <!-- Verify Button -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3 px-6 rounded-xl transition-all duration-200 hover:shadow-lg hover:shadow-blue-500/25 focus:outline-none focus:ring-2 focus:ring-blue-500/50 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span class="flex items-center justify-center gap-2">
                            <i data-lucide="check-circle" class="w-5 h-5"></i>
                            Проверить и продолжить
                        </span>
                    </button>

                    <!-- Back to Login -->
                    <div class="text-center">
                        <a href="{{ route('adminlogout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-white transition-colors duration-200">
                            <i data-lucide="arrow-left" class="w-4 h-4"></i>
                            Вернуться к входу
                        </a>
                    </div>
                </div>
            </form>

            <!-- Hidden Logout Form -->
            <form id="logout-form" action="{{ route('adminlogout') }}" method="POST" class="hidden">
                @csrf
            </form>

            <!-- Additional Security Info -->
            <div class="mt-8 pt-6 border-t border-gray-700">
                <div class="text-center">
                    <p class="text-xs text-gray-500 mb-2">Защищено корпоративным уровнем безопасности</p>
                    <div class="flex items-center justify-center gap-4 text-gray-600">
                        <span class="flex items-center gap-1">
                            <i data-lucide="shield" class="w-3 h-3"></i>
                            <span class="text-xs">256-bit SSL</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <i data-lucide="lock" class="w-3 h-3"></i>
                            <span class="text-xs">2FA Защищено</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <i data-lucide="eye-off" class="w-3 h-3"></i>
                            <span class="text-xs">Без логирования</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Pattern -->
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/5 via-gray-900 to-purple-900/5"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/2 translate-x-1/2 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl"></div>
        </div>

        <!-- Resend Code (Future Enhancement) -->
        <div class="text-center mt-6">
            <p class="text-gray-500 text-sm">
                Не получили код?
                <button type="button" class="text-blue-400 hover:text-blue-300 font-medium ml-1 transition-colors duration-200">
                    Отправить код повторно
                </button>
            </p>
        </div>
    </div>
</div>

<!-- Add Lucide Icons Script -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();

        // Auto-focus on code input
        const codeInput = document.getElementById('twofa');
        if (codeInput) {
            codeInput.focus();
        }

        // Format input as user types (for visual feedback)
        codeInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove non-digits
            if (value.length > 6) value = value.substring(0, 6);
            e.target.value = value;
        });

        // Submit form when 6 digits are entered
        codeInput.addEventListener('input', function(e) {
            if (e.target.value.length === 6) {
                // Small delay for better UX
                setTimeout(() => {
                    e.target.form.submit();
                }, 500);
            }
        });
    });
</script>

@endsection
