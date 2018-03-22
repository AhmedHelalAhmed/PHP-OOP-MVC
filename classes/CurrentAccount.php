<?php

class CurrentAccount extends Account
{

    private $has_checks = false;

    public function __construct($account_number)
    {
        parent::__construct($account_number);
    }

    public function add_checkbook()
    {
        $this->has_checks = true;
    }

}
