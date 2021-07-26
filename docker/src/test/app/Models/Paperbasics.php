<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paperbasics extends Model
{
  protected $primaryKey = 'paperid';
  protected $table = 'paperbasic';
  const CREATED_AT = 'regittime';
  const UPDATED_AT = 'updatetime';

  protected $fillable = [
    'paperid',
    'id',
    // 'updatetime',
    // 'regittime',
  ];

  protected $guarded = [
    // 'id'
  ];

  // https://webru.info/laravel/column-sortable/
  /*
  public $sortable = [
    'paperid',
    'papername'
  ];
  */

  // paperbasic から User への参照
  public function paperbasic_user()
  {
    return $this->belongsTo('App\User', 'id','id');
  }

  // paperbasic から paperdetails への参照
  public function paperdetails()
  {
    return $this->hasone('App\Models\Paperdetail', 'paperid','paperid');
  }
}
