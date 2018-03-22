<?php

class Account
{

    protected $account_number;
    protected $balance;
    protected $transactions;

    public function __construct($account_number)
    {
        if (!$this->_validate_account($account_number))
        {
            AppError::show_errors();
            return;
        }

        $this->account_number = $account_number;
    }

    protected function _validate_account($num)
    {
        if ($num >= 1000000000 && $num <= 9999999999) return true;

        AppError::add_error('Invalid account number');
        return false;
    }

    public function add_transaction($transaction)
    {
        $transactions.=$transaction;
    }

    public function get_transactions()
    {
        return $transactions;
    }

    public function deposit($amount)
    {
        $this->balance+=$amount;
        add_transaction("Deposit " . $amount . "to " . $this->account_number);
    }

    public function withdraw($amount)
    {
        $this->balance-=$amount;
        add_transaction("Withdraw " . $amount . "from " . $this->account_number);
    }

    public function transfer($amount, $xacc)
    {
        add_transaction("Transfer " . $amount . "from " . $this->account_number . " to" . $xacc);
    }

}
