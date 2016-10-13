<?php

class authentication {
    
    public function login($username, $password) {
        $decrypted = $this->decrypt($password);
        if($this->valid_password($username, $decrypted)) {
            return true;
        }
        return false;
    }
    
    public function encrypt($password) {
        $passArray = str_split($password);
        $encrypted = array();
        foreach($passArray as $char) {
            $salt = count($encrypted);
            $char = base64_encode(dechex(ord($this->str_rot($char,($salt+3)))*3));
            if($salt % 2 == 0) $char = strrev($char);
            array_push($encrypted, $char);
        }
        $encrypted = implode(":", $encrypted);
        $encrypted = str_replace("=", "?", $encrypted);
        return $encrypted;
    }
    
    public function decrypt($password) {
file corrupted