<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Schedule extends Eloquent
{
  protected $table    = 'schedule';
  public $timestamps  =   true;

}