<?php

class BankAccount
{
    private $account;

    public function __construct()
    {
        $this->account = 0;
    }

    public function setAccount($value) // setter pozwala na walidację zmiany zmiennej przed nadpisaniem jej zewnątrz klasy
    {
        if($this->account + $value <= 0){
            echo "Brak środków do wypłacenia " . abs($value) . " Saldo na koncie poniżej 0.<br>";
        }
        else {
            $this->account += $value;
        }
    }

    public function getAccount() // getter pozwala tylko na odczyt bez możliwości modyfikacji
    {
        echo $this->account . " PLN <BR>";
    }

}

$bank = new BankAccount();
$bank->setAccount(500);
$bank->getAccount();
$bank->setAccount(100);
$bank->getAccount();
$bank->setAccount(-500);
$bank->getAccount();
$bank->setAccount(-10);
$bank->getAccount();
$bank->setAccount(-5555);
$bank->getAccount();