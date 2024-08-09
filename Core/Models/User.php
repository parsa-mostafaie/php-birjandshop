<?php
namespace Birjandshop\Models;

use pluslib\App\Models\User as ModelsUser;

/**
 * @property int $id
 * 
 * @property string $username
 * @property string $email
 * 
 * @property string $password
 * 
 * @property string $name
 * @property string $firstname
 * @property string $family
 * @property string $lastname
 * 
 * @property string $phone
 * 
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $address
 * 
 * @property string $zip_code
 * 
 * @property int|float $total_order
 * @property int $order_count
 * 
 * @property string|int|\pluslib\Database\Expression $register_date
 */
class User extends ModelsUser
{
  protected $id_field = "ID";

  protected $translation = [
    'firstname' => 'name',
    'lastname' => 'family'
  ];

  const updated_at = null;
  const created_at = 'register_date';

  function set_password($password = null, $save = true)
  {
    $password ??= $this->username;
    $this->password = hash_pass($password);

    $save && $this->save();
  }

}