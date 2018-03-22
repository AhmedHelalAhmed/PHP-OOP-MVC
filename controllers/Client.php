<?php

/**
 * Client class defines a bank client 
 */
class Client
{

    private $first_name = '',
            $last_name  = '';
    public $dob,
            $phone,
            $address;
    public $accounts    = [];

    /**
     *  @brief Retrieve client full name
     *  
     *  @return string, full name of client
     */
    
    public function full_name()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function __construct($fname, $lname)
    {
        
        if ($this->_validate_name($fname)) $this->first_name = $fname;

        if ($this->_validate_name($lname)) $this->last_name = $lname;

        if (AppError::exist()) AppError::show_errors();
    }

    private function _validate_name($name)
    {
        $match = preg_match('/^[a-z][a-z \']*$/i', $name);
        if (!$match) AppError::add_error('Invalid name');

        return $match;
    }

    public function add_account($account_number, $type = 'current')
    {
        
        switch ($type)
        {
            case 'savings':
                $new_acc = new SavingsAccount($account_number);
                break;
            default:
                $new_acc = new CurrentAccount($account_number);
        }

        $this->accounts[] = $new_acc;
        return $new_acc;
    }

}
