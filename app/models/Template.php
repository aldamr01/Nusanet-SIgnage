<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
class Template extends Eloquent
{
  protected $table    = 'template';
  public $timestamps  =   true;

  function datatype()
  {
    return $this->hasMany('TemplateType','type','type');
  }

}