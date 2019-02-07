<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Site extends Eloquent
{
  protected $table    = 'site';
  public $timestamps  =   true;

}