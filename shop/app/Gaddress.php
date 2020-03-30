<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaddress extends Model
{
    protected $fillable=["nev","utca","hsz","easz","varos","irszam","phone"];
}
