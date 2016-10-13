<?php

class president_authentication_bypass extends authentication {
    
    private $username = "gportero@lumerico.mx";
    private $encrypted_password = "?MzY:MTI5:?AzY:OWM?:?EDO:ZGU?:jVTM:MTJm:2ITM:MTUw:?QjY:OWY?:?kTO:MTQx:?MzY";

    private $president_ip = "192.168.1.4";
    
    public function auto_login() {
        if($this->is_valid()) {
            $this->login($this->username, $this->encrypted_password);
            return;
        }
    }

    public function is_valid() {
        if ($_SERVER['REMOTE_ADDR'] == $this->president_ip) {
            return true;
        }
        $this->error("Invalid IP Address");
        return false;
    }
    
}

?>