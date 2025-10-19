
@extends('layouts.dasht')
@section('title', $title)
@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 p-6" x-data="{ 
    showSuccess: false, 
    showError: false,
    isSubmitting: false,
    message: '',
    showContactModal: false 
}">
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-6">
                <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-blue-500/10 to-indigo-500/10 flex items-center justify-center backdrop-blur-sm">
                    <i data-lucide="headphones" class="w-8 h-8 text-blue-600 dark:text-blue-400"></i>
                </div>
                <div>
                    <h1 class="text-4xl font-light text-gray-800 dark:text-white mb-2">
                        Центр поддержки
                    </h1>
                    <p class="text-gray-500 dark:text-gray-400 font-light text-lg">
                        Мы здесь для любых ваших вопросов или проблем
                    </p>
                </div>
            </div>
        </div>

        <!-- Alert Components -->
        <div x-show="showSuccess" x-transition class="mb-6">
            <x-success-alert/>
        </div>
        <div x-show="showError" x-transition class="mb-6">
            <x-danger-alert/>
        </div>

        <!-- Support Options Grid -->
        <div class="grid md:grid-cols-1 gap-6 mb-8">
            <!-- Email Support Card -->
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500/10 to-blue-600/10 flex items-center justify-center">
                        <i data-lucide="mail" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Поддержка по электронной почте</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Получите помощь через электронную почту</p>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm">Прямая связь по электронной почте для подробных вопросов и запросов поддержки.</p>
                <a href="mailto:{{$settings->contact_email}}" 
                   class="inline-flex items-center space-x-2 text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium transition-colors">
                    <span>{{$settings->contact_email}}</span>
                    <i data-lucide="external-link" class="w-4 h-4"></i>
                </a>
            </div>

           

         

        <!-- Contact Form Section -->
        <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 border border-gray-200 dark:border-gray-700 shadow-sm">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-light text-gray-800 dark:text-white mb-4">Отправьте нам сообщение</h2>
                <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">
                    У вас есть конкретный вопрос или нужна помощь? Заполните форму ниже, и наша команда поддержки свяжется с вами как можно скорее.
                </p>
            </div>

            <div class="max-w-2xl mx-auto">
                <form method="post" action="{{route('enquiry')}}" 
                      @submit="isSubmitting = true" 
                      x-data="{ messageLength: 0 }">
                    @csrf
                    <input type="hidden" name="name" value="{{Auth::user()->name}}" />
                    <input type="hidden" name="email" value="{{Auth::user()->email}}">

                    <!-- User Info Display -->
                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ваше имя</label>
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{substr(Auth::user()->name, 0, 1)}}</span>
                                </div>
                                <span class="text-gray-800 dark:text-white font-medium">{{Auth::user()->name}}</span>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ваш адрес электронной почты</label>
                            <div class="flex items-center space-x-3">
                                <i data-lucide="mail" class="w-5 h-5 text-gray-500"></i>
                                <span class="text-gray-800 dark:text-white">{{Auth::user()->email}}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Message Field -->
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                            Сообщение <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="message" 
                            id="message"
                            x-model="message"
                            @input="messageLength = $el.value.length"
                            class="w-full px-4 py-4 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl text-gray-700 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" 
                            rows="6" 
                            placeholder="Пожалуйста, подробно опишите ваш вопрос или проблему..."
                            required
                            maxlength="1000"></textarea>
                        <div class="flex justify-between items-center mt-2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Пожалуйста, предоставьте как можно больше деталей, чтобы мы могли лучше вам помочь.
                            </p>
                            <span class="text-sm text-gray-400" x-text="messageLength + '/1000'"></span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button 
                            type="submit" 
                            :disabled="isSubmitting || message.trim().length < 10"
                            :class="isSubmitting ? 'opacity-50 cursor-not-allowed' : 'hover:scale-105'"
                            class="inline-flex items-center space-x-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform disabled:opacity-50 disabled:cursor-not-allowed">
                            <span x-show="!isSubmitting">Отправить сообщение</span>
                            <span x-show="isSubmitting" class="flex items-center space-x-2">
                                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Отправляется...</span>
                            </span>
                            <i data-lucide="send" class="w-5 h-5" x-show="!isSubmitting"></i>
                        </button>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-4">
                            Обычно мы отвечаем в течение 24 часов в рабочие дни.
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contact Modal -->
        <div x-show="showContactModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
             @click.self="showContactModal = false">
            <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 max-w-md w-full border border-gray-200 dark:border-gray-700"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="message-circle" class="w-8 h-8 text-green-600 dark:text-green-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Поддержка в чате</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-6">
                        Наша функция живого чата скоро будет доступна! А пока, пожалуйста, используйте контактную форму или отправьте нам электронное письмо напрямую.
                    </p>
                    <button @click="showContactModal = false" 
                            class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white rounded-xl hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>

@endsection
