@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h3 class="fw-bold mb-3">О Remedy Technologsy</h3>
                    <p class="text-muted">Профессиональные услуги разработки и поддержки PHP скриптов</p>
                </div>

                <x-danger-alert />
                <x-success-alert />

                <!-- Hero Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card shadow-lg border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="card-body text-center text-white py-5">
                                <div class="mb-4">
                                    <i class="fas fa-code fa-4x mb-3 opacity-75"></i>
                                </div>
                                <h1 class="display-4 fw-bold mb-3">Remedy Technologsy</h1>
                                <p class="lead mb-4">Экспертная разработка Laravel PHP скриптов и профессиональные услуги поддержки</p>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <p class="mb-4">Мы специализируемся на создании специальных Laravel PHP приложений, предоставлении профессиональных услуг установки и постоянной поддержки для бизнеса по всему миру.</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center gap-3 flex-wrap">
                                    <a href="https://t.me/+heFFLpE7w5RjZjQ0" target="_blank" class="btn btn-light btn-lg px-4">
                                        <i class="fab fa-telegram me-2"></i>Получить поддержку
                                    </a>
                                    <a href="https://codesremedy.com/" target="_blank" class="btn btn-outline-light btn-lg px-4">
                                        <i class="fas fa-globe me-2"></i>Посетить веб-сайт
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services Grid -->
                <div class="row g-4">
                    <!-- Custom Development -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 shadow-sm border-0 hover-shadow-lg transition-all">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle" style="width: 80px; height: 80px;">
                                        <i class="fas fa-code text-primary fa-2x"></i>
                                    </div>
                                </div>
                                <h5 class="card-title fw-bold text-dark">Специальная разработка</h5>
                                <p class="card-text text-muted small">Разработка Laravel PHP скриптов, адаптированных под нужды вашего бизнеса</p>
                                <div class="mt-auto">
                                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">Специальные решения</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Installation Service -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 shadow-sm border-0 hover-shadow-lg transition-all">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 rounded-circle" style="width: 80px; height: 80px;">
                                        <i class="fas fa-cogs text-success fa-2x"></i>
                                    </div>
                                </div>
                                <h5 class="card-title fw-bold text-dark">Установка и настройка</h5>
                                <p class="card-text text-muted small">Профессиональная установка скриптов и настройка сервера</p>
                                <div class="mt-auto">
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">Быстрая установка</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support & Updates -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 shadow-sm border-0 hover-shadow-lg transition-all">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center bg-warning bg-opacity-10 rounded-circle" style="width: 80px; height: 80px;">
                                        <i class="fas fa-life-ring text-warning fa-2x"></i>
                                    </div>
                                </div>
                                <h5 class="card-title fw-bold text-dark">Пожизненная поддержка</h5>
                                <p class="card-text text-muted small">Постоянная поддержка, обновления и улучшения безопасности</p>
                                <div class="mt-auto">
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2">Поддержка 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customization -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 shadow-sm border-0 hover-shadow-lg transition-all">
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center bg-info bg-opacity-10 rounded-circle" style="width: 80px; height: 80px;">
                                        <i class="fas fa-palette text-info fa-2x"></i>
                                    </div>
                                </div>
                                <h5 class="card-title fw-bold text-dark">Кастомизация веб-сайта</h5>
                                <p class="card-text text-muted small">Специальное брендинг и улучшения UI/UX дизайна</p>
                                <div class="mt-auto">
                                    <span class="badge bg-info bg-opacity-10 text-info px-3 py-2">Специальный дизайн</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Services -->
                <div class="row mt-5">
                    <!-- Custom Laravel Development -->
                    <div class="col-lg-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-primary text-white border-0">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-laptop-code me-2"></i>Разработка специальных Laravel PHP скриптов
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-3">Нужна уникальная функция или специально созданный Laravel PHP скрипт? Наши эксперты-разработчики могут модифицировать существующие скрипты или создать совершенно новые решения, соответствующие потребностям вашего бизнеса.</p>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <h6 class="fw-bold text-dark">Специализации:</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="fas fa-bitcoin text-warning me-2"></i>Платформы инвестиций в Bitcoin</li>
                                            <li class="mb-2"><i class="fas fa-university text-primary me-2"></i>Системы онлайн-банкинга</li>
                                            <li class="mb-2"><i class="fas fa-exchange-alt text-success me-2"></i>Платформы криптобирж</li>
                                            <li class="mb-2"><i class="fas fa-shipping-fast text-info me-2"></i>Программное обеспечение для отслеживания курьеров</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge bg-success">✅ Интеграция специальных функций</span>
                                    <span class="badge bg-success">✅ Полностью адаптивный и безопасный</span>
                                    <span class="badge bg-success">✅ Быстрая доставка</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Installation Service -->
                    <div class="col-lg-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-success text-white border-0">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-server me-2 text-white"></i>Услуга установки и настройки скриптов
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-3">Не имеете опыта в установке серверов или загрузке скриптов? Оставьте все на нашу команду! Мы предлагаем профессиональные услуги по установке скриптов.</p>

                                <div class="mb-3">
                                    <h6 class="fw-bold text-dark">Что включено:</h6>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Быстрая и безопасная установка</li>
                                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Конфигурация базы данных</li>
                                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Исправление ошибок и оптимизация</li>
                                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Установка SSL сертификата</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info border-0 mb-0">
                                    <i class="fas fa-info-circle me-2 text white"></i>
                                    <strong>Без проблем:</strong> Начните использовать свой скрипт без каких-либо технических головных болей!
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lifetime Support -->
                    <div class="col-lg-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-warning text-dark border-0">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-shield-alt me-2 text-white"></i>Пожизненная поддержка и обновления
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-3">Мы предоставляем пожизненную поддержку и периодические обновления для наших PHP скриптов, чтобы они оставались безопасными, быстрыми и совместимыми с новейшими технологиями.</p>

                                <div class="mb-3">
                                    <h6 class="fw-bold text-dark">Что входит в поддержку:</h6>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><i class="fas fa-tools text-primary me-2"></i>Техническая поддержка для мелких проблем</li>
                                                <li class="mb-2"><i class="fas fa-bug text-danger me-2"></i>Исправление ошибок и улучшение производительности</li>
                                                <li class="mb-2"><i class="fas fa-shield-alt text-success me-2"></i>Обновления безопасности и функций</li>
                                                <li class="mb-2"><i class="fas fa-comments text-info me-2"></i>Экспертное руководство и консультации</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-4 py-2 fs-6">Всегда актуальный и безопасный</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Website Customization -->
                    <div class="col-lg-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-info text-white border-0">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-paint-brush me-2"></i>Кастомизация и брендинг веб-сайта
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-3">Хотите придать своему веб-сайту профессиональный и уникальный вид? Мы предлагаем специальный брендинг и улучшения UI/UX в соответствии с идентичностью вашего бизнеса.</p>

                                <div class="mb-3">
                                    <h6 class="fw-bold text-dark">Дизайн услуги:</h6>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><i class="fas fa-palette text-primary me-2"></i>Специальный логотип и брендинг</li>
                                                <li class="mb-2"><i class="fas fa-mobile-alt text-success me-2"></i>Улучшения UI/UX</li>
                                                <li class="mb-2"><i class="fas fa-search text-warning me-2"></i>Мобильная и SEO оптимизация</li>
                                                <li class="mb-2"><i class="fas fa-eye text-info me-2"></i>Современный адаптивный дизайн</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-success border-0 mb-0">
                                    <i class="fas fa-target me-2"></i>
                                    <strong>Цель:</strong> Создайте веб-сайт, который действительно представляет ваш бренд!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card border-0 shadow-lg" style="background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);">
                            <div class="card-body text-center text-white py-5">
                                <h3 class="fw-bold mb-4">Готовы начать?</h3>
                                <p class="lead mb-4">Свяжитесь с нами сегодня для персонализированного предложения и консультации</p>

                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="p-3 bg-white rounded">
                                                    <i class="fab fa-telegram fa-2x mb-2 text-dark"></i>
                                                    <h6 class="fw-bold text-dark">Поддержка Telegram</h6>
                                                    <a href="https://t.me/+heFFLpE7w5RjZjQ0" target="_blank" class="btn btn-primary btn-sm">Присоединиться к каналу</a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 bg-white rounded">
                                                    <i class="fas fa-globe fa-2x mb-2 text-dark"></i>
                                                    <h6 class="fw-bold text-dark">Посетить веб-сайт</h6>
                                                    <a href="https://codesremedy.com/" target="_blank" class="btn btn-primary btn-sm">codesremedy.com</a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 bg-white rounded">
                                                    <i class="fas fa-phone fa-2x mb-2 text-dark"></i>
                                                    <h6 class="fw-bold text-dark">Поддержка по телефону</h6>
                                                    <a href="https://t.me/+heFFLpE7w5RjZjQ0" class="btn btn-primary btn-sm"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-shadow-lg:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
        }

        .transition-all {
            transition: all 0.3s ease-in-out;
        }

        .card-header {
            border-bottom: none !important;
        }

        .badge {
            font-size: 0.75rem;
        }

        .alert {
            border-radius: 0.5rem;
        }
    </style>
@endsection
