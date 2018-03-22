<?php

class SavingsAccount extends Account
{

    private $interest = 0.0;

    public function __construct($account_number)
    {
        parent::__construct($account_number);
    }

    public function set_interest($ir)
    {
        $this->interest = $ir;
    }

}
