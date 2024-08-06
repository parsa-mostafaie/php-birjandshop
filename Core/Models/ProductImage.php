<?php
namespace Birjandshop\Models;

use pluslib\Database\UploadBaseColumn;

class ProductImage extends UploadBaseColumn
{
  protected ?string $table = 'products';
  protected string $colName = 'thumbnail';
  protected string $prefix = 'product.photo';

  function __construct()
  {
    parent::__construct();

    // $this->altImage = c_url('/assets/images/1.jpg', false);
  }
}