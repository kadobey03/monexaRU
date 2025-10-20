<!-- Stored in resources/views/child.blade.php -->

<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="{{ Auth('admin')->User()->dashboard_style }}">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span style="font-size: 0.9rem;">
                            {{ Auth('admin')->User()->firstName }} {{ Auth('admin')->User()->lastName }}
                            <span class="user-level" style="font-size: 0.8rem;"> Администратор</span>
                            {{-- <span class="caret"></span> --}}
                        </span>
                    </a>
                </div>
            </div>

            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ url('/admin/dashboard') }}" style="font-size: 0.9rem; padding: 0.75rem 1rem;">
                        <i class="fas fa-home"></i>
                        <p>Панель управления</p>
                    </a>
                </li>

                @if (Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin')
                  <li
                        class="nav-item {{ request()->routeIs('manageusers') ? 'active' : '' }} {{ request()->routeIs('loginactivity') ? 'active' : '' }} {{ request()->routeIs('user.plans') ? 'active' : '' }} {{ request()->routeIs('viewuser') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/manageusers') }}" style="font-size: 0.85rem; padding: 0.7rem 1rem;">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <p>Управление пользователями</p>
                        </a>
                    </li>

                  <li
                        class="nav-item {{ request()->routeIs('mdeposits') ? 'active' : '' }} {{ request()->routeIs('viewdepositimage') ? 'active' : '' }} {{ request()->routeIs('mdeposits') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/mdeposits') }}" style="font-size: 0.85rem; padding: 0.7rem 1rem;">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <p>Управление инвестициями</p>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('mwithdrawals') ? 'active' : '' }}   {{ request()->routeIs('processwithdraw') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/mwithdrawals') }}" style="font-size: 0.85rem; padding: 0.7rem 1rem;">
                            <i class="fa fa-arrow-alt-circle-up" aria-hidden="true"></i>
                            <p>Управление выводами</p>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('admin.trades.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.trades.index') }}" style="font-size: 0.85rem; padding: 0.7rem 1rem;">
                            <i class="fas fa-chart-line" aria-hidden="true"></i>
                            <p>Управление сделками</p>
                        </a>
                    </li>

                  <li
                        class="nav-item {{ request()->routeIs('admin.bots.*') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#bots">
                            <i class="fas fa-robot"></i>
                            <p>Бот-трейдинг</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="bots">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('admin.bots.index') }}">
                                        <span class="sub-item">Все торговые боты</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.bots.create') }}">
                                        <span class="sub-item">Добавить нового бота</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.bots.dashboard') }}">
                                        <span class="sub-item">Аналитика ботов</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <li
                    class="nav-item {{ request()->routeIs('plans') ? 'active' : '' }} {{ request()->routeIs('newplan') ? 'active' : '' }} {{ request()->routeIs('editplan') ? 'active' : '' }} {{ request()->routeIs('investments') ? 'active' : '' }} {{ request()->routeIs('admin.plans.*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#pln">
                        <i class="fas fa-cubes "></i>
                        <p>Инвестиции</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pln">
                        <ul class="nav nav-collapse">
                            {{-- <li>
                                <a href="{{ route('admin.plans.index') }}">
                                    <span class="sub-item">New Investment Plans <span class="badge badge-success">New</span></span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ url('/admin/dashboard/plans') }}">
                                    <span class="sub-item">Старые планы</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('admin.plans.categories') }}">
                                    <span class="sub-item">Plan Categories</span>
                                </a>
                            </li>  --}}
                            <li>
                                <a href="{{ url('/admin/dashboard/active-investments') }}">
                                    <span class="sub-item">Активные инвестиции</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Demo Trading Section -->
                <li class="nav-item {{ request()->routeIs('admin.demo.*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#demo">
                        <i class="fas fa-graduation-cap"></i>
                        <p>Демо торговля</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="demo">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.demo.users') }}">
                                    <span class="sub-item">Управление демо пользователями</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.demo.trades') }}">
                                    <span class="sub-item">Демо сделки</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li
                        class="nav-item {{ request()->routeIs('copytradings') ? 'active' : '' }} {{ request()->routeIs('newcopytrading') ? 'active' : '' }} {{ request()->routeIs('editcopytrading') ? 'active' : '' }} {{ request()->routeIs('activecopytrading') ? 'active' : '' }} ">
                        <a data-toggle="collapse" href="#cpy">
                            <i class="fa fa-copyright "></i>
                            <p>Копи-трейдинг</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="cpy">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ url('/admin/dashboard/copytrading') }}">
                                        <span class="sub-item">Планы копи-трейдинга</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/dashboard/active-copytrading') }}">
                                        <span class="sub-item">Активные копи-сделки</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                @endif
                @if (Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin')
                    {{-- <li
                        class="nav-item  {{ request()->routeIs('activeinvestments') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#trades">
                            <i class="fas fa-cubes "></i>
                            <p> Clients Trades</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="trades">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ url('/admin/dashboard/plans') }}">
                                        <span class="sub-item">Investment Plans</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/dashboard/investments') }}">
                                        <span class="sub-item">Active Trades</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}


                    <li class="nav-item {{ request()->routeIs('emailservices') ? 'active' : '' }}">
                        <a href="{{ route('emailservices') }}">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p>Почтовые сервисы</p>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('kyc') ? 'active' : '' }} {{ request()->routeIs('viewkyc') ? 'active' : '' }}">
                        <a href="{{ route('kyc') }}">
                            <i class="fa fa-user-check" aria-hidden="true"></i>
                            <p>Заявки KYC</p>
                        </a>
                    </li>


                    <li
                        class="nav-item {{ request()->routeIs('mwalletconnect') ? 'active' : '' }} {{ request()->routeIs('madmin') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#wal">
                        <i class="fa fa-sync-alt" aria-hidden="true"></i>
                            <p>Фразы</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="wal">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ url('/admin/dashboard/mwalletconnect') }}">
                                        <span class="sub-item">Ключи фраз клиентов</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/dashboard/mwalletsettings') }}">
                                        <span class="sub-item">Настройки фраз</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

<li
                        class="nav-item {{ request()->routeIs('loans') ? 'active' : '' }} ">
                        <a data-toggle="collapse" href="#lon">
                            <i class="fas fa-cubes "></i>
                            <p>Заявки на кредит</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="lon">
                            <ul class="nav nav-collapse">
                                {{-- <li>
                                    <a href="{{ url('/admin/dashboard/plans') }}">
                                        <span class="sub-item">Investment Plans</span>
                                    </a>
                                </li> --}}
                                <li>
                                    <a href="{{ url('/admin/dashboard/active-loans') }}">
                                        <span class="sub-item">Активные кредиты</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li
                    class="nav-item {{ request()->routeIs('signals') ? 'active' : '' }} {{ request()->routeIs('signal.settings') ? 'active' : '' }} {{ request()->routeIs('signal.subs') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#signals">
                        <i class="fa fa-signal"></i>
                        <p>Поставщик сигналов</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="signals">
                        <ul class="nav nav-collapse">

                            <li>
                                <a href="{{ url('/admin/dashboard/signals') }}">
                                    <span class="sub-item">Сигналы</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/dashboard/activesignals') }}">
                                    <span class="sub-item">Активные сигналы</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('signals') }}">
                                    <span class="sub-item">Trade Signals</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('signal.subs') }}">
                                    <span class="sub-item">Subscribers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('signal.settings') }}">
                                    <span class="sub-item">Settings</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                    {{-- <li
                        class="nav-item {{ request()->routeIs('msubtrade') ? 'active' : '' }} {{ request()->routeIs('tsettings') ? 'active' : '' }} {{ request()->routeIs('tacnts') ? 'active' : '' }} {{ request()->routeIs('subview') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#mgacnt">
                            <i class="fa fa-sync-alt"></i>
                            <p>Manage Accounts</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="mgacnt">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('msubtrade') }}">
                                        <span class="sub-item">Trading-Accounts</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('subview') }}">
                                        <span class="sub-item">Fee Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}


                @endif
                <li
                    class="nav-item {{ request()->routeIs('task') ? 'active' : '' }} {{ request()->routeIs('mtask') ? 'active' : '' }} {{ request()->routeIs('viewtask') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#task">
                        <i class="fas fa-align-center"></i>
                        <p>Задача</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="task">
                        <ul class="nav nav-collapse">
                            @if (Auth('admin')->User()->type == 'Super Admin')
                                <li>
                                    <a href="{{ url('/admin/dashboard/task') }}">
                                        <span class="sub-item">Создать задачу</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/dashboard/mtask') }}">
                                        <span class="sub-item">Управление задачами</span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth('admin')->User()->type != 'Super Admin')
                                <li>
                                    <a href="{{ url('/admin/dashboard/viewtask') }}">
                                        <span class="sub-item">Просмотреть мои задачи</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
                @if (Auth('admin')->User()->type == 'Super Admin' || Auth('admin')->User()->type == 'Admin')
                    <li class="nav-item {{ request()->routeIs('leads') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/leads') }}">
                            <i class="fas fa-user-slash " aria-hidden="true"></i>
                            <p>Потенциальные клиенты</p>
                        </a>
                    </li>
                @endif

                @if (Auth('admin')->User()->type == 'Rentention Agent' || Auth('admin')->User()->type == 'Conversion Agent')
                    <li class="nav-item {{ request()->routeIs('leadsassign') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/leadsassign') }}">
                            <i class="fas fa-user-slash " aria-hidden="true"></i>
                            <p>Мои потенциальные клиенты</p>
                        </a>
                    </li>
                @endif
                @if (Auth('admin')->User()->type == 'Super Admin')
                    <li
                        class="nav-item {{ request()->routeIs('addmanager') ? 'active' : '' }} {{ request()->routeIs('madmin') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#adm">
                            <i class="fa fa-user"></i>
                            <p>Администраторы</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="adm">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ url('/admin/dashboard/addmanager') }}">
                                        <span class="sub-item">Добавить администратора</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/dashboard/madmin') }}">
                                        <span class="sub-item">Управление администраторами</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li
                        class="nav-item {{ request()->routeIs('appsettingshow') ? 'active' : '' }} {{ request()->routeIs('termspolicy') ? 'active' : '' }} {{ request()->routeIs('refsetshow') ? 'active' : '' }} {{ request()->routeIs('paymentview') ? 'active' : '' }} {{ request()->routeIs('frontpage') ? 'active' : '' }} {{ request()->routeIs('allipaddress') ? 'active' : '' }} {{ request()->routeIs('ipaddress') ? 'active' : '' }} {{ request()->routeIs('editpaymethod') ? 'active' : '' }} {{ request()->routeIs('managecryptoasset') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#settings">
                            <i class="fa fa-cog"></i>
                            <p>Настройки</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="settings">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('appsettingshow') }}">
                                        <span class="sub-item">Настройки приложения</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('refsetshow') }}">
                                        <span class="sub-item">Настройки рефералов/бонусов</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('paymentview') }}">
                                        <span class="sub-item">Настройки платежей</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('managecryptoasset') }}">
                                        <span class="sub-item">Настройки обмена</span>
                                    </a>
                                </li>


                                <!--<li>-->
                                <!--    <a href="{{ route('termspolicy') }}">-->
                                <!--        <span class="sub-item">Terms and Privacy</span>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <li>
                                    <a href="{{ url('/admin/dashboard/ipaddress') }}">
                                        <span class="sub-item">IP-адрес</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                    <li class="nav-item {{ request()->routeIs('aboutonlinetrade') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard/about') }}">
                            <i class=" fa fa-info-circle" aria-hidden="true"></i>
                            <p>Для других скриптов</p>
                        </a>
                    </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
