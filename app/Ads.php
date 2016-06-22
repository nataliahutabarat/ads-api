<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
  //  protected $table = 'ads';
protected $fillable = array('title','description','location','price','username','useremail','userphone');
}
