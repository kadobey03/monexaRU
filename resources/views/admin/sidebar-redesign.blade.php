<!-- Modern Admin Sidebar -->
<div class="sidebar sidebar-redesign" x-data="{ activeSection: null }">
    <div class="sidebar-wrapper">
        <!-- Admin Profile Card -->
        <div class="admin-profile p-4 mb-3">
            <div class="d-flex align-items-center">
                <div class="avatar-container me-3">
                    <div class="avatar-circle bg-primary bg-gradient text-white">
                        {{ substr(Auth('admin')->User()->firstName, 0, 1) }}{{ substr(Auth('admin')->User()->lastName, 0, 1) }}
                    </div>
                    <span class="status-dot bg-success"></span>
                </div>
                <div class="admin-info">
                    <h5 class="mb-1 fw-bold">{{ Auth('admin')->User()->firstName }} {{ Auth('admin')->User()->lastName }}</h5>
                    <div class="admin-role">
                        <span class="badge bg-primary-soft text-primary">{{ Auth('admin')->User()->type }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Navigation -->
        <div class="sidebar-nav">
            <ul class="nav-list">
                <!-- Dashboard -->
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                        <div class="nav-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <span class="nav-text">Панель управления</span>
                    </a>
                </li>

                <!-- User Management Section -->
                <li class="nav-section" @click="activeSection = activeSection === 'users' ? null : 'users'">
                    <div class="nav-section-header">
                        <div class="nav-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="nav-text">Управление пользователями</span>
                        <div class="nav-arrow" :class="{ 'rotated': activeSection === 'users' }">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <ul class="nav-section-items" x-show="activeSection === 'users'" x-collapse>
                        <li class="nav-item {{ request()->routeIs('manageusers') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/manageusers') }}" class="nav-link">
                                <span class="nav-text">Все пользователи</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('loginactivity') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/loginactivity') }}" class="nav-link">
                                <span class="nav-text">Активность входов</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('user.plans') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/userplans') }}" class="nav-link">
                                <span class="nav-text">Планы пользователей</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard/user-verification') }}" class="nav-link">
                                <span class="nav-text">Верификация</span>
                                <span class="nav-badge bg-danger">3</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Financial Section -->
                <li class="nav-section" @click="activeSection = activeSection === 'financial' ? null : 'financial'">
                    <div class="nav-section-header">
                        <div class="nav-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <span class="nav-text">Финансы</span>
                        <div class="nav-arrow" :class="{ 'rotated': activeSection === 'financial' }">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <ul class="nav-section-items" x-show="activeSection === 'financial'" x-collapse>
                        <li class="nav-item {{ request()->routeIs('mdeposits') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/mdeposits') }}" class="nav-link">
                                <span class="nav-text">Депозиты</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('mwithdrawals') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/mwithdrawals') }}" class="nav-link">
                                <span class="nav-text">Выводы</span>
                                <span class="nav-badge bg-warning">8</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard/transactions') }}" class="nav-link">
                                <span class="nav-text">Транзакции</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard/payment-methods') }}" class="nav-link">
                                <span class="nav-text">Способы оплаты</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Trading Section -->
                <li class="nav-section" @click="activeSection = activeSection === 'trading' ? null : 'trading'">
                    <div class="nav-section-header">
                        <div class="nav-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <span class="nav-text">Торговля</span>
                        <div class="nav-arrow" :class="{ 'rotated': activeSection === 'trading' }">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <ul class="nav-section-items" x-show="activeSection === 'trading'" x-collapse>
                        <li class="nav-item {{ request()->routeIs('admin.bots.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.bots.index') }}" class="nav-link">
                                <span class="nav-text">Торговые боты</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.bots.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.bots.create') }}" class="nav-link">
                                <span class="nav-text">Добавить нового бота</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.bots.dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin.bots.dashboard') }}" class="nav-link">
                                <span class="nav-text">Аналитика ботов</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard/trading-history') }}" class="nav-link">
                                <span class="nav-text">История торговли</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Plans Section -->
                <li class="nav-section" @click="activeSection = activeSection === 'plans' ? null : 'plans'">
                    <div class="nav-section-header">
                        <div class="nav-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <span class="nav-text">Инвестиционные планы</span>
                        <div class="nav-arrow" :class="{ 'rotated': activeSection === 'plans' }">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <ul class="nav-section-items" x-show="activeSection === 'plans'" x-collapse>
                        <li class="nav-item {{ request()->routeIs('plans') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/plans') }}" class="nav-link">
                                <span class="nav-text">Управление планами</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard/newplan') }}" class="nav-link">
                                <span class="nav-text">Новый план</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Content Section -->
                <li class="nav-section" @click="activeSection = activeSection === 'content' ? null : 'content'">
                    <div class="nav-section-header">
                        <div class="nav-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <span class="nav-text">Контент</span>
                        <div class="nav-arrow" :class="{ 'rotated': activeSection === 'content' }">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <ul class="nav-section-items" x-show="activeSection === 'content'" x-collapse>
                        <li class="nav-item {{ request()->routeIs('frontpage') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/frontpage') }}" class="nav-link">
                                <span class="nav-text">Интерфейс</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('faqmanager') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/faqmanager') }}" class="nav-link">
                                <span class="nav-text">Менеджер FAQ</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('testimonials') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/testimonials') }}" class="nav-link">
                                <span class="nav-text">Отзывы</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Communications -->
                <li class="nav-section" @click="activeSection = activeSection === 'communications' ? null : 'communications'">
                    <div class="nav-section-header">
                        <div class="nav-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <span class="nav-text">Коммуникации</span>
                        <div class="nav-arrow" :class="{ 'rotated': activeSection === 'communications' }">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <ul class="nav-section-items" x-show="activeSection === 'communications'" x-collapse>
                        <li class="nav-item {{ request()->routeIs('admin.notifications') ? 'active' : '' }}">
                            <a href="{{ route('admin.notifications') }}" class="nav-link">
                                <span class="nav-text">Уведомления</span>
                                <span class="nav-badge bg-primary">12</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.send.message.form') ? 'active' : '' }}">
                            <a href="{{ route('admin.send.message.form') }}" class="nav-link">
                                <span class="nav-text">Отправить сообщение</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard/mailbox') }}" class="nav-link">
                                <span class="nav-text">Почтовый ящик</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Settings -->
                <li class="nav-section" @click="activeSection = activeSection === 'settings' ? null : 'settings'">
                    <div class="nav-section-header">
                        <div class="nav-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <span class="nav-text">Настройки</span>
                        <div class="nav-arrow" :class="{ 'rotated': activeSection === 'settings' }">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <ul class="nav-section-items" x-show="activeSection === 'settings'" x-collapse>
                        <li class="nav-item {{ request()->routeIs('appsettingshow') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/appsettingshow') }}" class="nav-link">
                                <span class="nav-text">Общие настройки</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('paymentgtway') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/paymentgateway') }}" class="nav-link">
                                <span class="nav-text">Платежные шлюзы</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('managecryptoasset') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/managecryptoasset') }}" class="nav-link">
                                <span class="nav-text">Криптовалютные активы</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('adminprofile') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard/profile') }}" class="nav-link">
                                <span class="nav-text">Профиль</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Logs & Reporting -->
                <li class="nav-section" @click="activeSection = activeSection === 'logs' ? null : 'logs'">
                    <div class="nav-section-header">
                        <div class="nav-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <span class="nav-text">Логи и отчеты</span>
                        <div class="nav-arrow" :class="{ 'rotated': activeSection === 'logs' }">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <ul class="nav-section-items" x-show="activeSection === 'logs'" x-collapse>
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard/activity-log') }}" class="nav-link">
                                <span class="nav-text">Лог активности</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard/system-log') }}" class="nav-link">
                                <span class="nav-text">Системный лог</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/dashboard/reports') }}" class="nav-link">
                                <span class="nav-text">Отчеты</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-divider"></li>
                <li class="nav-item">
                    <a href="{{ route('adminlogout') }}" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="nav-icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span class="nav-text">Выйти</span>
                    </a>
                    <form id="logout-form" action="{{ route('adminlogout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<style>
/* Modern Sidebar Styling */
.sidebar-redesign {
    background-color: #ffffff;
    width: 260px;
    height: 100%;
    position: fixed;
    left: 0;
    top: 0;
    overflow-y: auto;
    z-index: 100;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    scrollbar-width: thin;
    scrollbar-color: rgba(0,0,0,0.2) transparent;
}

/* Dark Mode Support */
.dark .sidebar-redesign {
    background-color: #1a1a27;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}

/* Admin Profile Styling */
.admin-profile {
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.dark .admin-profile {
    border-bottom: 1px solid rgba(255,255,255,0.05);
}

.avatar-circle {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1.1rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.avatar-container {
    position: relative;
}

.status-dot {
    position: absolute;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #ffffff;
    bottom: 0;
    right: 0;
}

.dark .status-dot {
    border-color: #1a1a27;
}

.admin-info h5 {
    color: #111827;
    font-size: 0.95rem;
}

.dark .admin-info h5 {
    color: #f3f4f6;
}

.admin-role {
    font-size: 0.8rem;
}

.bg-primary-soft {
    background-color: rgba(79, 70, 229, 0.1);
}

/* Sidebar Navigation Styling */
.sidebar-nav {
    padding: 1.5rem 0;
}

.nav-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-item {
    margin: 2px 0;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 0.7rem 1.5rem;
    color: #6b7280;
    text-decoration: none;
    font-size: 0.875rem;
    border-radius: 0.375rem;
    margin: 0 0.75rem;
    transition: all 0.2s ease;
}

.dark .nav-link {
    color: #9ca3af;
}

.nav-link:hover {
    color: #4f46e5;
    background-color: rgba(79, 70, 229, 0.05);
}

.dark .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.05);
}

.nav-item.active .nav-link {
    color: #4f46e5;
    background-color: rgba(79, 70, 229, 0.1);
    font-weight: 500;
}

.dark .nav-item.active .nav-link {
    color: #818cf8;
    background-color: rgba(129, 140, 248, 0.1);
}

.nav-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    margin-right: 0.75rem;
    font-size: 0.875rem;
}

.nav-text {
    flex: 1;
}

.nav-badge {
    font-size: 0.65rem;
    padding: 0.15rem 0.4rem;
    border-radius: 10px;
}

/* Section Headers */
.nav-section {
    margin-bottom: 0.5rem;
}

.nav-section-header {
    display: flex;
    align-items: center;
    padding: 0.7rem 1.5rem;
    color: #374151;
    cursor: pointer;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.2s ease;
    margin: 0 0.75rem;
    border-radius: 0.375rem;
}

.dark .nav-section-header {
    color: #d1d5db;
}

.nav-section-header:hover {
    color: #4f46e5;
    background-color: rgba(79, 70, 229, 0.05);
}

.dark .nav-section-header:hover {
    background-color: rgba(255, 255, 255, 0.05);
}

.nav-arrow {
    margin-left: 0.5rem;
    font-size: 0.75rem;
    transition: transform 0.3s ease;
}

.nav-arrow.rotated {
    transform: rotate(90deg);
}

/* Section Items */
.nav-section-items {
    padding-left: 2.5rem;
}

/* Divider */
.nav-divider {
    height: 1px;
    margin: 1rem 1.5rem;
    background-color: rgba(0,0,0,0.05);
}

.dark .nav-divider {
    background-color: rgba(255,255,255,0.05);
}

/* Scrollbar Styling */
.sidebar-redesign::-webkit-scrollbar {
    width: 5px;
}

.sidebar-redesign::-webkit-scrollbar-track {
    background: transparent;
}

.sidebar-redesign::-webkit-scrollbar-thumb {
    background-color: rgba(0,0,0,0.2);
    border-radius: 3px;
}

.dark .sidebar-redesign::-webkit-scrollbar-thumb {
    background-color: rgba(255,255,255,0.1);
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .sidebar-redesign {
        transform: translateX(-100%);
        box-shadow: none;
    }

    .sidebar-redesign.active {
        transform: translateX(0);
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
}

/* Alpine.js Transitions */
[x-cloak] { display: none !important; }
</style>
