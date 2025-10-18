@php
      // Generate simple math CAPTCHA
      $num1 = rand(1, 10);
      $num2 = rand(1, 10);
      $captcha_question = "$num1 + $num2";
      $captcha_answer = $num1 + $num2;
@endphp
@extends('layouts.guest1')
@section('title', 'Hesap Oluştur')
@section('content')

<!-- Fintech Trading Platform Registration -->
<div class="min-h-screen bg-gray-900 relative overflow-hidden py-8 sm:py-12">
    <div class="relative z-10 flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-2xl">
            <!-- Professional Trading Registration Card -->
            <div class="bg-gray-900 border border-gray-700 rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 shadow-2xl"
                 x-data="kayitFormu()" x-cloak>

                <!-- Header Section -->
                <div class="text-center mb-8">
                    <!-- Logo -->
                    <div class="flex items-center justify-center mb-6">
                        <img src="{{ asset('storage/app/public/'.$settings->logo)}}"
                             class="h-12 sm:h-16 w-auto"
                             alt="{{ $settings->site_name }}" />
                    </div>

                    <!-- Title -->
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-2">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">{{ $settings->site_name }}</span>'a Katılın
                    </h1>
                    <p class="text-gray-300 text-sm sm:text-base lg:text-lg mb-6">
                        Profesyonel ticaret yolculuğunuza başlayın
                    </p>

                    <!-- Trading Stats - Mobile Responsive -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 text-xs sm:text-sm">
                        <!--<div class="text-center p-3 bg-gray-800/50 rounded-xl border border-gray-700/50">-->
                        <!--    <div class="flex items-center justify-center gap-1 text-green-400 mb-1">-->
                        <!--        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>-->
                        <!--        <span class="font-semibold">99.9% Uptime</span>-->
                        <!--    </div>-->
                        <!--    <div class="text-gray-400">Reliable Platform</div>-->
                        <!--</div>-->
                        <!--<div class="text-center p-3 bg-gray-800/50 rounded-xl border border-gray-700/50">-->
                        <!--    <div class="flex items-center justify-center gap-1 text-blue-400 mb-1">-->
                        <!--        <i data-lucide="shield-check" class="w-3 h-3"></i>-->
                        <!--        <span class="font-semibold">Bank-Grade</span>-->
                        <!--    </div>-->
                        <!--    <div class="text-gray-400">Security</div>-->
                        <!--</div>-->
                        <div class="text-center p-3 bg-gray-800/50 rounded-xl border border-gray-700/50">
                            <div class="flex items-center justify-center gap-1 text-cyan-400 mb-1">
                                <i data-lucide="users" class="w-3 h-3"></i>
                                <span class="font-semibold">1M+ Yatırımcı</span>
                            </div>
                            <div class="text-gray-400">Topluluk</div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Progress Steps - Mobile Optimized -->
                <div class="mb-8">
                    <div class="flex items-center justify-between sm:justify-center sm:space-x-8">
                        <template x-for="(step, index) in steps" :key="index">
                            <div class="flex flex-col items-center">
                                <!-- Step Circle -->
                                <div class="relative mb-2">
                                    <div class="flex items-center justify-center w-8 h-8 sm:w-10 sm:h-10 rounded-full text-xs sm:text-sm font-bold transition-all duration-300"
                                         :class="currentStep > index ? 'bg-green-500 text-white' :
                                                currentStep === index ? 'bg-blue-500 text-white' :
                                                'bg-gray-700 text-gray-400'">
                                        <span x-show="currentStep <= index" x-text="index + 1"></span>
                                        <i x-show="currentStep > index" data-lucide="check" class="w-4 h-4 sm:w-5 sm:h-5"></i>
                                    </div>
                                    <!-- Active Step Pulse -->
                                    <div x-show="currentStep === index"
                                         class="absolute inset-0 w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-blue-500 animate-ping opacity-20"></div>
                                </div>

                                <!-- Step Label -->
                                <div class="text-center">
                                    <div class="text-xs sm:text-sm font-medium transition-colors duration-300"
                                         :class="currentStep >= index ? 'text-white' : 'text-gray-500'"
                                         x-text="step.title"></div>
                                    <div class="text-xs text-gray-500 hidden sm:block" x-text="step.description"></div>
                                </div>

                                <!-- Connector Line -->
                                <div x-show="index < steps.length - 1"
                                     class="hidden sm:block absolute top-4 left-1/2 w-16 h-0.5 transition-colors duration-300"
                                     :class="currentStep > index ? 'bg-green-500' : 'bg-gray-700'"
                                     style="transform: translateX(2rem);"></div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Error Summary Section -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                        <div class="flex items-start gap-3">
                            <div class="p-1 bg-red-500/20 rounded-lg mt-0.5">
                                <i data-lucide="alert-triangle" class="w-5 h-5 text-red-400"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-lg font-bold text-red-300 mb-2">Lütfen Bu Sorunları Düzeltin:</h4>
                                <ul class="space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-sm text-red-200 flex items-start gap-2">
                                            <i data-lucide="x-circle" class="w-4 h-4 text-red-400 mt-0.5 flex-shrink-0"></i>
                                            <span>{{ $error }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="mt-3 text-xs text-red-300/80">
                                    <i data-lucide="info" class="w-3 h-3 inline mr-1"></i>
                                    Lütfen aşağı kaydırarak vurgulanan alanları düzeltin, ardından tekrar deneyin.
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Registration Form -->
                <form action="{{ route('register') }}" method="POST" class="space-y-6" id="register" x-cloak>
                    @csrf

                    <!-- Step 1: Personal Information -->
                    <div x-show="currentStep === 0"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-x-4"
                         x-transition:enter-end="opacity-100 transform translate-x-0">

                        <!-- Step Header -->
                        <div class="mb-6 p-4 bg-blue-500/10 rounded-xl border border-blue-500/20">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-blue-500/20 rounded-lg">
                                    <i data-lucide="user-circle" class="w-5 h-5 text-blue-400"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg sm:text-xl font-bold text-white">Kişisel Bilgiler</h3>
                                    <p class="text-gray-400 text-sm">Ticaret profilinizi oluşturun</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Username Field -->
                            <div class="space-y-2">
                                <label for="username" class="block text-sm font-bold text-gray-200">
                                    Ticaret Kullanıcı Adı <span class="text-red-400">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i data-lucide="user" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                                    </div>
                                    <input type="text" name="username" id="username" required
                                           class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-4 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold"
                                           placeholder="Kullanıcı adı seçin">
                                </div>
                                @error('username')
                                    <p class="text-sm text-red-400 flex items-center gap-1">
                                        <i data-lucide="alert-circle" class="w-4 h-4"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Full Name Field -->
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-bold text-gray-200">
                                    Ad Soyad <span class="text-red-400">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i data-lucide="user-check" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                                    </div>
                                    <input type="text" name="name" id="name" required
                                           class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-4 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold"
                                           placeholder="Ad soyad giriniz">
                                </div>
                                @error('name')
                                    <p class="text-sm text-red-400 flex items-center gap-1">
                                        <i data-lucide="alert-circle" class="w-4 h-4"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-bold text-gray-200">
                                    E-posta Adresi <span class="text-red-400">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i data-lucide="mail" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                                    </div>
                                    <input type="email" name="email" id="email" required
                                           class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-4 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold"
                                           placeholder="eposta@ornek.com">
                                </div>
                                @error('email')
                                    <p class="text-sm text-red-400 flex items-center gap-1">
                                        <i data-lucide="alert-circle" class="w-4 h-4"></i>{{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Phone Field -->
                            <div class="space-y-2">
                                <label for="phone" class="block text-sm font-bold text-gray-200">
                                    Telefon Numarası <span class="text-red-400">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                        <i data-lucide="phone" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                                    </div>
                                    <input type="tel" name="phone" id="phone" required
                                           class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-4 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold"
                                           placeholder="+90 (555) 123-4567">
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Step 2: Location & Currency -->
                <div x-show="currentStep === 1"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-4"
                     x-transition:enter-end="opacity-100 transform translate-x-0">

                    <!-- Step Header -->
                    <div class="mb-6 p-4 bg-purple-500/10 rounded-xl border border-purple-500/20">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-purple-500/20 rounded-lg">
                                <i data-lucide="globe-2" class="w-5 h-5 text-purple-400"></i>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl font-bold text-white">Konum</h3>
                                <p class="text-gray-400 text-sm">Bölgesel ticaret tercihlerinizi ayarlayın</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 sm:gap-6">
                        <!-- Country Field -->
                        <div class="space-y-2">
                            <label for="country" class="block text-sm font-bold text-gray-200">
                                Ülke <span class="text-red-400">*</span>
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 z-10">
                                    <i data-lucide="flag" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                                </div>
                                <select name="country" id="country" required
                                        class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-8 py-4 text-white focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold appearance-none">
                                    <option selected disabled class="text-gray-400">Ülkenizi seçin</option>
                                    @include('auth.countries')
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                    <i data-lucide="chevron-down" class="h-4 w-4 text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Currency Field -->
                        {{-- <div class="space-y-2">
                            <label for="select_c" class="block text-sm font-bold text-gray-200">
                                Preferred Currency <span class="text-red-400">*</span>
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 z-10">
                                    <i data-lucide="banknote" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                                </div>
                                <input name="s_currency" value="{{ $settings->s_currency }}" id="s_c" type="hidden">
                                <select name="currency" id="select_c" onchange="changecurr()" required
                                        class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-8 py-4 text-white focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold appearance-none">
                                    <option selected disabled class="text-gray-400">Select trading currency</option>
                                    @foreach ($currencies as $key => $currency)
                                        <option id="{{ $key }}" value="<?php echo html_entity_decode($currency); ?>" class="text-white bg-gray-900">
                                            {{ $key . ' (' . html_entity_decode($currency) . ')' }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                    <i data-lucide="chevron-down" class="h-4 w-4 text-gray-400"></i>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <!-- Trading Preferences Info -->
                    <div class="mt-6 p-4 bg-blue-500/10 rounded-xl border border-blue-500/20">
                        <div class="flex items-start gap-3">
                            <i data-lucide="info" class="w-5 h-5 text-blue-400 mt-0.5 flex-shrink-0"></i>
                            <div class="text-sm">
                                <p class="text-blue-300 font-bold mb-1">Bölgesel Ticaret Bilgileri</p>
                                <p class="text-gray-300">Konumunuz, bölgeye özel özellikler, uyumluluk ve daha hızlı ticaret yürütme için optimum sunucu bağlantıları sağlamamıza yardımcı olur.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Security -->
                <div x-show="currentStep === 2"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-4"
                     x-transition:enter-end="opacity-100 transform translate-x-0">

                    <!-- Step Header -->
                    <div class="mb-6 p-4 bg-green-500/10 rounded-xl border border-green-500/20">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-green-500/20 rounded-lg">
                                <i data-lucide="shield-check" class="w-5 h-5 text-green-400"></i>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl font-bold text-white">Hesap Güvenliği</h3>
                                <p class="text-gray-400 text-sm">Ticaret hesabınızı güvenceye alın</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-bold text-gray-200">
                                Şifre <span class="text-red-400">*</span>
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                    <i data-lucide="lock" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                                </div>
                                <input type="password" name="password" id="password" required
                                       class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-4 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold"
                                       placeholder="Güçlü şifre oluşturun">
                            </div>
                            @error('password')
                                <p class="text-sm text-red-400 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-4 h-4"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-bold text-gray-200">
                                Şifreyi Onayla <span class="text-red-400">*</span>
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                    <i data-lucide="key" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                       class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-4 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold"
                                       placeholder="Şifrenizi onaylayın">
                            </div>
                        </div>
                    </div>

                    <!-- CAPTCHA Section -->
                    <div class="space-y-4 mt-6">
                        <div class="space-y-2">
                            <label for="captcha" class="block text-sm font-bold text-gray-200">
                                Basit Matematik Doğrulama <span class="text-red-400">*</span>
                            </label>

                            <!-- CAPTCHA Display -->
                            <div class="bg-gray-800 border border-gray-600 rounded-xl p-4 mb-3">
                                <div class="flex items-center justify-center">
                                    <div class="bg-gradient-to-r from-blue-900 to-purple-900 rounded-lg p-4 border border-gray-600">
                                        <div class="text-center">
                                            <p class="text-sm text-gray-300 mb-3 font-medium">Bu basit matematiğin cevabı nedir?</p>
                                            <div class="bg-gray-900 rounded-lg px-8 py-4 border border-gray-700">
                                                <span class="text-3xl font-bold text-green-400 tracking-wide select-none"
                                                      style="font-family: 'Arial', sans-serif;">
                                                    {{ $captcha_question }} = ?
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CAPTCHA Input -->
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                    <i data-lucide="calculator" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors"></i>
                                </div>
                                <input type="number" name="captcha" id="captcha" required
                                       class="block w-full rounded-xl border border-gray-600 bg-gray-900 pl-12 pr-4 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-bold text-center"
                                       placeholder="Cevabı giriniz (sadece rakamlar)"
                                       autocomplete="off"
                                       min="0"
                                       max="99">
                            </div>

                            @error('captcha')
                                <p class="text-sm text-red-400 flex items-center gap-1">
                                    <i data-lucide="alert-circle" class="w-4 h-4"></i>{{ $message }}
                                </p>
                            @enderror

                            <!-- Helper text -->
                            <p class="text-xs text-gray-400 flex items-center gap-1">
                                <i data-lucide="info" class="w-3 h-3"></i>
                                İnsan olduğunuzu doğrulamak için bu basit matematik problemini çözün. Rastgele kodlar yazmaktan çok daha kolay!
                            </p>
                        </div>
                    </div>

                    <!-- Hidden CAPTCHA confirmation -->
                    <input type="hidden" name="captcha_confirmation" value="{{ $captcha_answer }}">

                    @if (Session::has('ref_by'))
                        <input type="hidden" name="ref_by" value="{{ session('ref_by') }}" required>
                    @endif

                    <!-- Password Requirements -->
                    <div class="mt-6 p-4 bg-gray-800/50 rounded-xl border border-gray-700">
                        <p class="text-sm font-bold text-gray-200 mb-2">Şifre Gereksinimleri:</p>
                        <ul class="text-xs text-gray-300 space-y-1">
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-3 h-3 text-green-400"></i>
                                En az 8 karakter uzunluğunda
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-3 h-3 text-green-400"></i>
                                Büyük ve küçük harf içerir
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-3 h-3 text-green-400"></i>
                                En az bir rakam veya özel karakter içerir
                            </li>
                        </ul>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="mt-6 p-6 bg-blue-500/10 rounded-xl border border-blue-500/20">
                        <div class="flex items-start gap-4">
                            <div class="flex items-center h-5 mt-1">
                                <input type="checkbox" name="agree" id="agree" required
                                       class="h-4 w-4 rounded border-gray-600 bg-gray-900 text-blue-500 focus:ring-2 focus:ring-blue-400/20 transition-colors">
                            </div>
                            <div class="flex-1">
                                <label for="agree" class="text-sm font-bold text-gray-200 leading-relaxed">
                                    {{ $settings->site_name }}'ın
                                    <a href="rules" target="_blank" class="text-blue-400 hover:text-blue-300 font-bold underline underline-offset-2">
                                        Şartlar ve Koşullarını
                                    </a>
                                    kabul ediyorum ve
                                    <a href="#" target="_blank" class="text-blue-400 hover:text-blue-300 font-bold underline underline-offset-2">
                                        Gizlilik Politikasını
                                    </a>
                                    okuduğumu ve anladığımı beyan ediyorum
                                </label>
                                <p class="text-xs text-gray-400 mt-2">
                                    Hesap oluşturarak en az 18 yaşında olduğunuzu ve ticaret güncellemeleri ile piyasa analizleri almayı kabul ettiğinizi onaylarsınız.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Navigation Buttons -->
                <div class="flex flex-col sm:flex-row justify-between items-center mt-10 pt-8 border-t border-gray-700 gap-4" x-cloak>
                    <!-- Previous Button -->
                    <button type="button" @click="oncekiAdim()"
                            x-show="currentStep > 0"
                            class="inline-flex items-center gap-2 px-6 py-3 text-gray-400 hover:text-white transition-all duration-200 rounded-xl hover:bg-gray-800/50 group">
                        <i data-lucide="arrow-left" class="w-4 h-4 group-hover:-translate-x-1 transition-transform"></i>
                        <span class="font-bold">Önceki Adım</span>
                    </button>

                    <!-- Progress Indicator -->
                    <div class="flex items-center gap-2 text-sm text-gray-400">
                        <span x-text="`Step ${currentStep + 1} of ${steps.length}`" class="font-bold"></span>
                    </div>

                    <!-- Next Button -->
                    <button type="button" @click="sonrakiAdim()"
                            x-show="currentStep < steps.length - 1"
                            class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 group">
                        <span>Devam Et</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </button>

                    <!-- Create Account Button -->
                    <button type="submit" x-show="currentStep === steps.length - 1"
                            class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 group">
                        <i data-lucide="user-plus" class="w-5 h-5"></i>
                        <span>Ticaret Hesabı Oluştur</span>
                        <i data-lucide="sparkles" class="w-4 h-4 group-hover:rotate-12 transition-transform"></i>
                    </button>
                </div>

                <!-- Professional Footer -->
                <div class="mt-8 text-center space-y-4">
                    <div class="flex items-center justify-center gap-6 text-sm">
                        <p class="text-gray-400">
                            Zaten hesabınız var mı?
                            <a href="{{ route('login') }}"
                               class="font-bold text-blue-400 hover:text-blue-300 transition-colors underline underline-offset-2">
                                Buradan giriş yapın
                            </a>
                        </p>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="flex items-center justify-center gap-8 py-4 text-xs text-gray-500">
                        <div class="flex items-center gap-1">
                            <i data-lucide="shield" class="w-3 h-3"></i>
                            <span>SSL Güvenliği</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i data-lucide="lock" class="w-3 h-3"></i>
                            <span>256-bit Şifreleme</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i data-lucide="award" class="w-3 h-3"></i>
                            <span>Düzenlenmiş Platform</span>
                        </div>
                    </div>

                    <p class="text-xs text-gray-500">
                        © {{ date('Y') }} {{ $settings->site_name }}. Tüm hakları saklıdır. |
                        Lisanslı ve düzenlenmiş ticaret platformu.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>





    <style>
        .skiptranslate {
            display: none !important;
        }
        body {
            top: 0 !important;
        }
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div id="google_translate_element" style="display:none"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: "en"}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit"></script>

    <script>
        function kayitFormu() {
            return {
                currentStep: 0,
                steps: [
                    {
                        title: 'Kişisel Bilgiler',
                        description: 'Temel bilgiler',
                        completed: false
                    },
                    {
                        title: 'Konum',
                        description: 'Bölgesel ayarlar',
                        completed: false
                    },
                    {
                        title: 'Güvenlik',
                        description: 'Hesap koruması',
                        completed: false
                    }
                ],

                sonrakiAdim() {
                    if (this.validateCurrentStep()) {
                        this.steps[this.currentStep].completed = true;
                        if (this.currentStep < this.steps.length - 1) {
                            this.currentStep++;
                            this.scrollToTop();
                        }
                    }
                },

                oncekiAdim() {
                    if (this.currentStep > 0) {
                        this.currentStep--;
                        this.scrollToTop();
                    }
                },

                scrollToTop() {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                },

                validateCurrentStep() {
                    const step = this.currentStep;
                    let isValid = true;
                    let missingFields = [];

                    if (step === 0) {
                        // Validate personal information
                        const fields = [
                            { id: 'username', name: 'Kullanıcı Adı' },
                            { id: 'name', name: 'Ad Soyad' },
                            { id: 'email', name: 'E-posta' },
                            { id: 'phone', name: 'Telefon Numarası' }
                        ];

                        fields.forEach(field => {
                            const element = document.getElementById(field.id);
                            const value = element.value.trim();
                            if (!value) {
                                missingFields.push(field.name);
                                isValid = false;
                                // Add visual feedback
                                element.classList.add('border-red-500', 'bg-red-900/20');
                                element.classList.remove('border-gray-600');
                            } else {
                                // Remove error styling if field is now valid
                                element.classList.remove('border-red-500', 'bg-red-900/20');
                                element.classList.add('border-gray-600');
                            }
                        });

                        // Email validation
                        const emailElement = document.getElementById('email');
                        const email = emailElement.value.trim();
                        if (email && !email.includes('@')) {
                            missingFields.push('Geçerli E-posta Formatı');
                            isValid = false;
                            emailElement.classList.add('border-red-500', 'bg-red-900/20');
                            emailElement.classList.remove('border-gray-600');
                        }

                    } else if (step === 1) {
                        // Validate location
                        const countryElement = document.getElementById('country');
                        const country = countryElement.value;

                        if (!country) {
                            missingFields.push('Ülke Seçimi');
                            isValid = false;
                            countryElement.classList.add('border-red-500', 'bg-red-900/20');
                            countryElement.classList.remove('border-gray-600');
                        } else {
                            countryElement.classList.remove('border-red-500', 'bg-red-900/20');
                            countryElement.classList.add('border-gray-600');
                        }

                    } else if (step === 2) {
                        // Validate security
                        const passwordElement = document.getElementById('password');
                        const confirmPasswordElement = document.getElementById('password_confirmation');
                        const captchaElement = document.getElementById('captcha');
                        const agreeElement = document.getElementById('agree');

                        const password = passwordElement.value;
                        const confirmPassword = confirmPasswordElement.value;
                        const captcha = captchaElement.value.trim();
                        const agree = agreeElement.checked;

                        // Password validation
                        if (!password) {
                            missingFields.push('Şifre');
                            isValid = false;
                            passwordElement.classList.add('border-red-500', 'bg-red-900/20');
                        } else if (password.length < 8) {
                            missingFields.push('Şifre (minimum 8 karakter)');
                            isValid = false;
                            passwordElement.classList.add('border-red-500', 'bg-red-900/20');
                        } else {
                            passwordElement.classList.remove('border-red-500', 'bg-red-900/20');
                            passwordElement.classList.add('border-gray-600');
                        }

                        // Confirm password validation
                        if (!confirmPassword) {
                            missingFields.push('Şifre Onaylaması');
                            isValid = false;
                            confirmPasswordElement.classList.add('border-red-500', 'bg-red-900/20');
                        } else if (password !== confirmPassword) {
                            missingFields.push('Şifreler Eşleşmelidir');
                            isValid = false;
                            confirmPasswordElement.classList.add('border-red-500', 'bg-red-900/20');
                        } else {
                            confirmPasswordElement.classList.remove('border-red-500', 'bg-red-900/20');
                            confirmPasswordElement.classList.add('border-gray-600');
                        }

                        // CAPTCHA validation
                        if (!captcha) {
                            missingFields.push('Matematik Doğrulama Cevabı');
                            isValid = false;
                            captchaElement.classList.add('border-red-500', 'bg-red-900/20');
                        } else {
                            captchaElement.classList.remove('border-red-500', 'bg-red-900/20');
                            captchaElement.classList.add('border-gray-600');
                        }

                        // Terms agreement validation
                        if (!agree) {
                            missingFields.push('Şartlar ve Koşullar Kabulü');
                            isValid = false;
                        }
                    }

                    if (!isValid) {
                        const message = missingFields.length === 1
                            ? `Lütfen sağlayın: ${missingFields[0]}`
                            : `Lütfen bu alanları doldurun: ${missingFields.join(', ')}`;

                        // Show professional alert
                        this.showAlert('Gerekli Alanları Doldurun', message, 'warning');
                    }

                    return isValid;
                },

                showAlert(title, message, type = 'info') {
                    // Simple alert fallback if SweetAlert2 is not available
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            title: title,
                            text: message,
                            icon: type,
                            confirmButtonText: 'Anladım',
                            confirmButtonColor: '#3B82F6'
                        });
                    } else {
                        alert(`${title}: ${message}`);
                    }
                }
            }
        }

        // Enhanced initialization with better error handling
        document.addEventListener('alpine:init', () => {
            setTimeout(() => {
                if (typeof lucide !== 'undefined') {
                    lucide.createIcons();
                }
            }, 100);
        });

        document.addEventListener('alpine:updated', () => {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });

        // Form submission enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('register');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i data-lucide="loader-2" class="w-4 h-4 animate-spin mr-2"></i>Hesap Oluşturuluyor...';
                    }
                });
            }

            // Auto-scroll to errors if they exist
            const errorSummary = document.querySelector('.bg-red-500\\/10');
            if (errorSummary) {
                setTimeout(() => {
                    errorSummary.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                    // Add a subtle shake animation to draw attention
                    errorSummary.style.animation = 'shake 0.5s ease-in-out';
                }, 100);
            }
        });
    </script>

    <!-- Add shake animation CSS -->
    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
    </style>

</body>
</html>
@endsection

