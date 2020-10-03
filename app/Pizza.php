<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
 protected $table = 'pizza';

 protected $casts = [
     'toppings' => 'array'
 ];
}
