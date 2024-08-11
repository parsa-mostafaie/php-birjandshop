<?php
namespace Birjandshop\Traits;

trait Price
{
  use Number;

  function readable_toman($val)
  {
    return $this->format($this->toman($val));
  }

  function toman($val)
  {
    return $val / 10;
  }
}