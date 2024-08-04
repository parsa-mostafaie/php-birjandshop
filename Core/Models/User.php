<?php
namespace Birjandshop\Models;

use Pluslib\Eloquent\Model;

class User extends Model
{

    private function set_password($password)
    {
        $this->password = hash_pass($password);
    }

}