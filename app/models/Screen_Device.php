<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Screen_Device extends Eloquent
{
  protected $table    = 'screen_device';
  public $timestamps  =   true;

}