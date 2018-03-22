<?php

class Account
{

    protected $account_number;
    protected $balance = 0.0;
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
        $this->transactions.='</br>' . $transaction;
    }

    public function get_transactions()
    {
        return $this->transactions;
    }

    public function deposit($amount)
    {
        $this->balance+=$amount;
        $this->add_transaction("Deposit " . $amount . " to " . $this->account_number);
    }

    public function withdraw($amount)
    {
        if (!$this->_validate_withdraw($amount))
        {
            AppError::show_errors();
            return;
        }
        $this->balance-=$amount;
        $this->add_transaction("Withdraw " . $amount . " from " . $this->account_number);
    }

    protected function _validate_withdraw($amount)
    {
        if ($this->balance > $amount) return true;

        AppError::add_error('Your account balance not enough');
        return false;
    }

    public function transfer($amount, $xacc)
    {
        if (!$this->_validate_withdraw($amount))
        {
            AppError::show_errors();
            return;
        }
        $this->balance-=$amount;
        /**
         * @todo I have to get the client object that is related to the xacc to access xacc through it
         */
        global $clients;
        $the_other_client = NULL;
        foreach ($clients as $client)
        {
            $index = 0;

            foreach ($client->accounts as $account_number)
            {

                if ($account_number->account_number == $xacc)
                {
                    $the_other_client = $client;
                    break;
                }
                else
                {
                    $index+=1;
                }
            }
            if ($the_other_client != NULL)
            {
                $the_other_client->accounts[$index]->deposit($amount);
                break;
            }
        }

        if ($the_other_client == NULL)
        {
            $this->balance+=$amount;
            echo '<br/>The receiver account does not exist<br/>';
            return;
        }
        $this->add_transaction("Transfer " . $amount . " from " . $this->account_number . " to " . $xacc);
    }

    public function balance()
    {
        return '<br/>Your balance : ' . $this->balance;
    }

}
