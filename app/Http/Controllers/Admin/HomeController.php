<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Settings;
use App\Models\Plans;
use App\Models\Signal;
use App\Models\SettingsCont;
use App\Models\Agent;
use App\Models\Loan;
use App\Models\User_plans;
use App\Models\User_signal;
use App\Models\Investment;
use App\Models\Mt4Details;
use App\Models\Admin;
use App\Models\Faq;
use App\Models\Images;
use App\Models\Testimony;
use App\Models\Content;
use App\Models\Asset;
use App\Models\Deposit;
use App\Models\Wdmethod;
use App\Models\Withdrawal;
use App\Models\Cp_transaction;
use App\Models\Tp_Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kyc;
use App\Models\OrdersP2p;
use App\Models\Task;
use App\Models\Wallets;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //sum total deposited
        $total_deposited = DB::table('deposits')->select(DB::raw("SUM(amount) as count"))->where('status', 'Processed')->get();
        $pending_deposited = DB::table('deposits')->select(DB::raw("SUM(amount) as count"))->where('status', 'Pending')->get();
        $total_withdrawn = DB::table('withdrawals')->select(DB::raw("SUM(amount) as count"))->where('status', 'Processed')->get();
        $pending_withdrawn = DB::table('withdrawals')->select(DB::raw("SUM(amount) as count"))->where('status', 'Pending')->get();

        $userlist = User::count();
        $activeusers = User::where('status', 'active')->count();
        $blockeusers = User::where('status', 'blocked')->count();
        $plans = Plans::count();
        $unverifiedusers = User::where('account_verify', '!=', 'yes')->count();

        $chart_pdepsoit = DB::table('deposits')->where('status', 'Processed')->sum('amount');
        $chart_pendepsoit = DB::table('deposits')->where('status', 'Pending')->sum('amount');
        $chart_pwithdraw = DB::table('withdrawals')->where('status', 'Processed')->sum('amount');
        $chart_pendwithdraw = DB::table('withdrawals')->where('status', 'Pending')->sum('amount');
        $chart_trans = Tp_Transaction::sum('amount');

        return view('admin.dashboard', [
            'title' => 'Панель администратора',
            'total_deposited' => $total_deposited,
            'pending_deposited' => $pending_deposited,
            'total_withdrawn' => $total_withdrawn,
            'pending_withdrawn' => $pending_withdrawn,
            'user_count' => $userlist,
            'plans' => $plans,
            'chart_pdepsoit' => $chart_pdepsoit,
            'chart_pendepsoit' => $chart_pendepsoit,
            'chart_pwithdraw' => $chart_pwithdraw,
            'chart_pendwithdraw' => $chart_pendwithdraw,
            'chart_trans' => $chart_trans,
            'activeusers' => $activeusers,
            'blockeusers' => $blockeusers,
            'unverifiedusers' => $unverifiedusers,
        ]);
    }
    //Plans route
    public function plans()
    {
        return view('admin.Plans.plans')
            ->with(array(
                'title' => 'Системные планы',
                'plans' => Plans::where('type', 'Main')->orderby('created_at', 'ASC')->get(),
                'pplans' => Plans::where('type', 'Promo')->get(),

            ));
    }

    public function newplan()
    {
        return view('admin.Plans.newplan')
            ->with(array(
                'title' => 'Добавить инвестиционный план',

            ));
    }

    public function editplan($id)
    {
        return view('admin.Plans.editplan')
            ->with(array(
                'title' => 'Редактировать инвестиционный план',
                'plan' => Plans::where('id', $id)->first(),

            ));
    }




    //signal routes

    public function signals()
    {
        return view('admin.Signals.signals')
            ->with(array(
                'title' => 'Системные сигналы',
                'signals' => Signal::where('type', 'Main')->orderby('created_at', 'ASC')->get(),
                'ssignals' => Signal::where('type', 'Promo')->get(),

            ));
    }

    public function newsignal()
    {
        return view('admin.Signals.newsignal')
            ->with(array(
                'title' => 'Добавить торговые сигналы',

            ));
    }

    public function editsignal($id)
    {
        return view('admin.Signals.editsignal')
            ->with(array(
                'title' => 'Редактировать торговые сигналы',
                'signal' => Signal::where('id', $id)->first(),

            ));

    }

    public function activesignals()
    {
        return view('admin.Signals.activesingnals', [
            'title' => 'Активные торговые сигналы',
            'signals' => User_signal::orderByDesc('id')->with(['dsignal', 'suser'])->get(),
        ]);
    }

    //ennd signals
    //Return manage users route
    public function manageusers()
    {
        return view('admin.Users.users')
            ->with(array(
                'title' => 'Все пользователи',

            ));
    }

    public function activeInvestments()
    {
        return view('admin.Plans.activeinv', [
            'title' => 'Активные торговые планы',
            'plans' => User_plans::where('active', 'yes')->orderByDesc('id')->with(['dplan', 'duser'])->get(),
        ]);
    }

    public function activeLoans()
    {
        return view('admin.Plans.loans', [
            'title' => 'Активные займы',
            'plans' => Loan::where('active', 'Pending')->orderByDesc('id')->with([ 'luser'])->get(),
        ]);
    }
    public function Investments()
    {
        $plans = investment::where('active', 'yes')->orderByDesc('id')->with(['uplan', 'puser'])->get();

        return view('admin.Plans.investment', [
            'title' => 'Активные инвестиционные планы',
            'plans' => investment::where('active', 'yes')->orderByDesc('id')->with(['uplan', 'puser'])->get(),
        ]);
    }

    //Return search subscription route
    public function searchsub(Request $request)
    {
        $searchItem = $request['searchItem'];
        if ($request['type'] == 'subscription') {
            $result = Mt4Details::whereRaw("MATCH(mt4_id,account_type,server) AGAINST('$searchItem')")->paginate(10);
        }
        return view('admin.msubtrade')
            ->with(array(
                'title' => 'Результат поиска подписки',
                'subscriptions' => $result,

            ));
    }

    //Return search route for Withdrawals
    public function searchWt(Request $request)
    {
        $dp = Withdrawal::all();
        $searchItem = $request['wtquery'];

        $result = Withdrawal::where('user', $searchItem)
            ->orwhere('amount', $searchItem)
            ->orwhere('payment_mode', $searchItem)
            ->orwhere('status', $searchItem)
            ->paginate(10);

        return view('admin.mwithdrawals')
            ->with(array(
                'dp' => $dp,
                'title' => 'Результат поиска выводов',
                'withdrawals' => $result,

            ));
    }


    //Return manage withdrawals route
    public function mwithdrawals()
    {
        return view('admin.Withdrawals.mwithdrawals')
            ->with(array(
                'title' => 'Управление выводами пользователей',
                'withdrawals' => Withdrawal::with('duser')->orderBy('id', 'desc')->get(),

            ));
    }

    //Return manage deposits route
    public function mdeposits()
    {
        return view('admin.Deposits.mdeposits')
            ->with(array(
                'title' => 'Управление депозитами пользователей',
                'deposits' => Deposit::with('duser')->orderBy('id', 'desc')->paginate(15),
            ));
    }

    //Return agents route
    public function agents()
    {
        return view('admin.agents')
            ->with(array(
                'title' => 'Управление агентами',
                'users' => User::orderBy('id', 'desc')->get(),
                'agents' => Agent::all(),
            ));
    }

    public function aboutonlinetrade()
    {
        return view('admin.about')
            ->with(array(
                'title' => 'О торговом скрипте Remedy Algo',

            ));
    }

    public function emailServices()
    {
        return view('admin.email.index', [
            'title' =>  "Почтовые услуги"
        ]);
    }

    //Return view agent route
    public function viewagent($agent)
    {
        return view('admin.viewagent')
            ->with(array(
                'title' => 'Запись агента',
                'agent' => User::where('id', $agent)->first(),
                'ag_r' => User::where('ref_by', $agent)->get(),

            ));
    }

    //return settings form
    public function settings(Request $request)
    {
        include 'currencies.php';
        return view('admin.settings')->with(array(

            'wmethods' => Wdmethod::where('type', 'withdrawal')->get(),
            'assets' => Asset::all(),
            //'markets' => markets::all(),
            'cpd' => Cp_transaction::where('id', '=', '1')->first(),
            'currencies' => $currencies,
            'title' => 'Системные настройки'
        ));
        //return view('settings')->with(array('title' =>'System Settings'));
    }




 //connectwallet
 public function mwalletdelete($id)
 {
     Wallets::where('id', $id)->delete();
     return redirect()->back()->with('success', 'Кошелек успешно удален!');
 }

    //Return manage mwalletconnect route
    public function mwalletconnect()
    {
        return view('admin.wallet.mwalletconnect')
            ->with(array(
                'title' => 'Управление подключением кошельков пользователей',

                'wallets' => Wallets::with('wuser')->orderBy('id', 'desc')->get(),

            ));
    }



    //Return manage mwalletsettings route
    public function mwalletsettings()
    {
        return view('admin.wallet.mwalletsettings')
            ->with(array(
                'title' => 'Управление настройками подключения кошельков пользователей',
                'settings' => Settings::where('id',1)->first(),

            ));
    }



      // connect wallet settings

      public function mwalletconnectsave(Request $request){

        $this->validate($request, [
            'min_balance' => 'required|max:255',
            'min_return' => 'required|max:255',
            'wallet_status' => 'required'

        ]);


	Settings::where('id', '1')
            ->update([
                'min_balance' => $request['min_balance'],
                'min_return' => $request['min_return'],
                'wallet_status' => $request['wallet_status'],
            ]);

        return redirect()->back()
          ->with('success', 'Обновление добавлено успешно!');
    }



    //end conect wallet

    public function msubtrade()
    {
        return view('admin.subscription.msubtrade')
            ->with(array(
                'subscriptions' => Mt4Details::with('tuser')->orderBy('id', 'desc')->paginate(10),
                'title' => 'Управление подписками',

            ));
    }

    public function userplans($id)
    {
        return view('admin.Users.user_plans')
            ->with(array(
                'plans' => User_plans::where('user', $id)->orderBy('id', 'desc')->get(),
                'user' => User::where('id', $id)->first(),
                'title' => 'Инвестиционные сделки пользователя',

            ));
    }


    public function investmentplans($id)
    {
        return view('admin.Users.user_investments')
            ->with(array(
                'plans' => investment::where('user', $id)->orderBy('id', 'desc')->get(),
                'user' => User::where('id', $id)->first(),
                'title' => 'Инвестиционный план(ы) пользователя',

            ));
    }




    //return front end management page
    public function frontpage()
    {
        return view('admin.Settings.FrontendSettings.frontpage', [
            'title' => 'Управление главной страницей',
            'faqs' => Faq::orderByDesc('id')->get(),
            'images' => Images::orderBy('id', 'desc')->get(),
            'testimonies' => Testimony::orderBy('id', 'desc')->get(),
            'contents' => Content::orderBy('id', 'desc')->get(),
        ]);
    }


    public function adduser()
    {
        return view('admin.referuser')->with(array(
            'title' => 'Добавить новых пользователей',
            'settings' => Settings::where('id', '=', '1')->first()
        ));
    }

    public function addmanager()
    {
        return view('admin.addadmin')->with(array(
            'title' => 'Добавить нового менеджера',
            'settings' => Settings::where('id', '=', '1')->first()
        ));
    }
    public function madmin()
    {
        return view('admin.madmin')->with(array(
            'admins' => Admin::orderby('id', 'desc')->get(),
            'title' => 'Добавить нового менеджера',


        ));
    }

    //Return KYC route
    public function kyc()
    {
        return view('admin.kyc', [
            'title' => 'Заявки KYC',
            'kycs' => Kyc::orderByDesc('id')->with(['user'])->get(),
        ]);
    }

    public function viewKycApplication($id)
    {

        return view('admin.kyc-applications', [
            'title' => 'Просмотр заявки KYC',
            'kyc' => Kyc::where('id', $id)->with(['user'])->first(),
        ]);
    }

    public function adminprofile()
    {
        return view('admin.Profile.profile')
            ->with(array(
                'title' => 'Профиль администратора',


            ));
    }

    public function managecryptoasset()
    {

        return view('admin.Settings.Crypto.pageview', [
            'title' => 'Управление криптоактивами',
            'moresettings' => SettingsCont::find(1),
        ]);
    }


    public function p2pView()
    {
        return view('admin.p2p.show', [
            'title' => 'Управление P2P транзакциями',
        ]);
    }


    public function showtaskpage()
    {
        return view('admin.task')
            ->with(array(
                'admin' => Admin::orderby('id', 'desc')->get(),
                'title' => 'Создать новую задачу',

            ));
    }

    public function mtask()
    {
        return view('admin.mtask')
            ->with(array(
                'admin' => Admin::orderby('id', 'desc')->get(),
                'tasks' => Task::orderby('id', 'desc')->get(),
                'title' => 'Управление задачами',

            ));
    }
    public function viewtask()
    {
        return view('admin.vtask')
            ->with(array(
                'tasks' => Task::orderby('id', 'desc')->where('designation', Auth('admin')->User()->id)->get(),
                'title' => 'Просмотр моих задач',

            ));
    }

    public function leads()
    {
        return view('admin.leads')
            ->with(array(
                'admin' => Admin::orderBy('id', 'desc')->get(),
                'users' => User::orderby('id', 'desc')->where('cstatus', NULL)->get(),
                'title' => 'Управление новыми зарегистрированными клиентами',
            ));
    }
    public function leadsassign()
    {
        return view('admin.lead_asgn')
            ->with(array(
                'usersAssigned' => User::orderby('id', 'desc')->where([
                    ['assign_to', Auth('admin')->User()->id],
                    ['cstatus', NULL]
                ])->get(),

                'title' => 'Управление новыми зарегистрированными клиентами',

            ));
    }


    public function customer()
    {
        return view('admin.customer')
            ->with(array(
                'users' => User::orderby('id', 'desc')->where('cstatus', 'Customer')->get(),
                'title' => 'Управление новыми зарегистрированными клиентами',

            ));
    }
}
