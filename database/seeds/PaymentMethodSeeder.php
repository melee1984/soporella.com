<?php

use Illuminate\Database\Seeder;

use App\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    private $data = [
        [
            'title' => 'Credit Card',
            'active' => 1,
            'description' => 'You will be redirected to the Payment Page to complete the payment process.',
            'class' => 'credit_card'
        ],
        [
            'title' => 'Cash on Delivery',
            'active' => 1,
            'description' => 'Paying when they are delivered.',
            'class' => 'money'
        ],

       
    ];
    
	public function run()
    {
        foreach ($this->data as $payment) {
           PaymentMethod::create($payment);
        }

    }
}
