<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class RunningText extends Eloquent
{
  protected $table    = 'running_text';
  public $timestamps  =   true;
}