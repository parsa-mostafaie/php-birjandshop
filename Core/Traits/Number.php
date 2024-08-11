<?php
namespace Birjandshop\Traits;

trait Number
{
  function format($val)
  {
    return number_format($val);
  }
}