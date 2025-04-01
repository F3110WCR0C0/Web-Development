<?php

class CreditCard {

    public $id;
    public $name;
    public $number;
    public $exp_month;
    public $exp_year;

    public function __construct($props = null) {
    }

    public function save() {
    }

    public function delete() {
    }

    public static function findAll() {
        $profiles = array();
        return $profiles;
    }

    public static function findById($id) {
        $profile = null;
        return $profile;
    }
}