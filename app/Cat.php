<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Cat extends Model
{
    //
    use Searchable;
    protected $guarded=[];
}
