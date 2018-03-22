<?php

class home
{

    public function index()
    {

        echo "Welcome to MVC!";
        echo '<br/>';
        echo "test the task ";
        echo '<br/>';

        //test account
        $client1   = new Client('Ahmed', 'Saeed');
        #to store the clients
        global $clients;
        $clients[] = $client1;
//        echo $client1->full_name();
        //echo $client1->first_name . ' ' . $client1->last_name;
        $client1->add_account(1000000015)->add_checkbook();
        $client1->add_account(1000000016);
        $client1->add_account(1000000018, 'savings')->set_interest(0.1);
        #var_dump($client1->accounts);


        $acc_num = 2;
        #balance
        echo $client1->accounts[$acc_num - 1]->balance(); #0.0
        #deposit
        echo'<br/>Deposit===>1000';
        $client1->accounts[$acc_num - 1]->deposit(1000);

        #transactions
        #echo $client1->accounts[2]->get_transactions();
        #balance
        echo $client1->accounts[$acc_num - 1]->balance();

        #withdraw
        echo'<br/>withdraw===>500';
        $client1->accounts[$acc_num - 1]->withdraw(500);
        #balance
        echo $client1->accounts[$acc_num - 1]->balance();
        #transactions
        echo'<br/>==========( transactions )==========';
        echo $client1->accounts[$acc_num - 1]->get_transactions();
        echo'<br/>==========( transactions )==========<br/>';

        #balance
        echo $client1->accounts[$acc_num - 1]->balance();








        $client2   = new Client('Ahmed', 'Ali');
        #to store the clients
        $clients[] = $client2;
        //echo $client1->first_name . ' ' . $client1->last_name;
        $client2->add_account(1000000001)->add_checkbook();
        $client2->add_account(1000000002);
        $client2->add_account(1000000003, 'savings')->set_interest(0.1);







        $client3   = new Client('Diaa', 'Ossama');
        #to store the clients
        $clients[] = $client3;
        //echo $client1->first_name . ' ' . $client1->last_name;
        $client3->add_account(1000000100)->add_checkbook();
        $client3->add_account(1000000200);
        $client3->add_account(1000000300, 'savings')->set_interest(0.1);




        echo'<br/>Transfer===>200';
        #transfer
        $client1->accounts[$acc_num - 1]->transfer(200, 1000000100);

        

        #balance
        echo '<br/>for client 1 : ';
        echo $client1->accounts[$acc_num - 1]->balance();
        #balance
        echo '<br/>for client 3 : ';
        $acc_num = 1;
        echo $client3->accounts[$acc_num - 1]->balance();
        $acc_num = 2;


        #transactions
        echo'<br/>==========( transactions )==========';
        echo $client1->accounts[$acc_num - 1]->get_transactions();
        echo'<br/>==========( transactions )==========<br/>';
        #transactions
        echo'<br/>==========( transactions )==========';
        $acc_num = 1;
        echo $client3->accounts[$acc_num - 1]->get_transactions();
        $acc_num = 2;
        echo'<br/>==========( transactions )==========<br/>';
    }

}
