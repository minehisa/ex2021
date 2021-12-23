<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paperdetail extends Model
{
  protected $primaryKey = 'paperid';
  protected $table = 'paperdetails';
  public $timestamps = false;

  protected $fillable = [
    'paperid',
    'papername',
    'journal',
    'yearofpublic',
    'volume',
    'number',
    'pages',
    'publisher',
    'paperpdf',
  ];

  public $sortable = [
    // 'paperid',
    'papername'
  ];

  // paperdetails から paperbasic への参照
  public function paperdetails_paperbasic()
  {
    return $this->belongsTo('App\Models\Paperbasics', 'paperid', 'paperid');
  }
}
