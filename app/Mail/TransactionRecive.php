<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Transaction;
use App\Account;

class TransactionRecive extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;
    public $account;
    public $account_pre;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(Transaction $transaction, Account $account, Account $account_pre)
    {
        $this->transaction = $transaction;
        $this->account = $account;
        $this->account_pre = $account_pre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.transferReceive');
    }
}
