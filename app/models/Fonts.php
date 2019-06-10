<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Fonts extends Eloquent
{
  protected $table    = 'fonts';
  public $timestamps  =   true;
}