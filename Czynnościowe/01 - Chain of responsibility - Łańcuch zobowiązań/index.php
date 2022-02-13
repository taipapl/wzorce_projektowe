<?php 

abstract class PaymentProcessor
{
    protected $successor = null;

    public function setSuccessor($paymentProcessor)
    {
        $this->successor = $paymentProcessor;
    }

    abstract public function processPayment($amount);
}

class PayPal extends PaymentProcessor
{
    public function processPayment($amount)
    {
        if ($amount >= 0 && $amount<= 99 ) {
            return 'Płatność PayPal: ' . $amount;
        } else {
            if ($this->successor != null ) {
                return $this->successor->processPayment($amount);
            }
        }
    }
}

class BankTransfer extends PaymentProcessor
{
    public function processPayment($amount)
    {
        if ($amount >= 100 && $amount<= 999 ) {
            return 'Płatność Przelew: ' . $amount;
        } else {
            if ($this->successor != null ) {
                return $this->successor->processPayment($amount);
            }
        }
    }
}

class CreditCard extends PaymentProcessor
{
    public function processPayment($amount)
    {
        if ($amount > 1000 ) {
            return 'Płatność Karta: ' . $amount;
        } else {
            if ($this->successor != null ) {
                return $this->successor->processPayment($amount);
            }
        }
    }
}

// wzorzec polega na stworzeniu tzw. 'handler'(a) obsługującego żądanie. 
// Rządnie przechodzi przez łańcuch dopóki nie natrafi na właściwy ''handler'.

$pp = new PayPal();
$bt = new BankTransfer();
$cc = new CreditCard();

$pp->setSuccessor($bt);
$bt->setSuccessor($cc);

echo $pp->processPayment(20000);