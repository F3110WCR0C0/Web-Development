<?php

namespace Account;

class CurrentAccount extends BankAccount {

    protected const FREE_TRANSACTIONS = 3;
    protected const TRANSACTION_FEE = 1.50;

    protected $transactionCount;

    public function __construct($num, $name, $balance) {
        parent::__construct($num, $name, $balance);
        $this->transactionCount = 0;
    }

    public function __toString() {
        $format = "Account number: %s, name: %s, balance: %01.2f, transaction count: %d";
        $str = sprintf($format, $this->number, $this->name, $this->balance, $this->transactionCount);
        return $str;
    }

    public function deposit($amount) {
        $this->transactionCount++;
        parent::deposit($amount);
    }

    public function withdraw($amount) {
        $this->transactionCount++;
        parent::withdraw($amount);
    }

    public function deductFees() {
        if ($this->transactionCount > self::FREE_TRANSACTIONS) {
            $numTrans = ($this->transactionCount - self::FREE_TRANSACTIONS);
            $fees = self::TRANSACTION_FEE * $numTrans;
            parent::withdraw($fees);
        }
        $this->transactionCount = 0;
    }
}