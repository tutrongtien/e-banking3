<?php
namespace App\Http\Views\Composers;

use Illuminate\View\View;
use App\Account;
use Auth;
class AccountComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $accounts;

   
    public function __construct(Account $accounts)
    {
        // Dependencies automatically resolved by service container...
        $this->accounts = $accounts;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $a = Auth::id();
        $view->with('accounts', $this->accounts->where('user_id', $a)->pluck('bank_number', 'id'));
    }
}