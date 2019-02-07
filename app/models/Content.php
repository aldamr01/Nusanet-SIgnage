<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Content extends Eloquent
{
  protected $table    = 'content';
  public $timestamps  =   true;

}