<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class TemplateType extends Eloquent
{
  protected $table    = 'template_type';
  public $timestamps  =   true;

}