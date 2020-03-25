<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresses extends Model
{
    protected $fillable=["id","utca","hsz","easz","varos","irszam"];
}
