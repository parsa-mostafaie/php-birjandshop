<?php
namespace Birjandshop\Models;

use pluslib\App\Models\User as ModelsUser;

class User extends ModelsUser
{

    private function set_password($password)
    {
        $this->password = hash_pass($password);
    }

}