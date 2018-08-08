<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

 	protected $table='records';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=['temp','humidiy','co2'];
    protected $guarded=[];
}
