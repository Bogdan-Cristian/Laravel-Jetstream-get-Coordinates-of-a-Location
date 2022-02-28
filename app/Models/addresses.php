<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    protected  $fillable = array('address', 'geo_lat', 'geo_lon');
}
