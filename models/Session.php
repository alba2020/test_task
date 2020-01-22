<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Session extends Eloquent
{
    protected $guarded = [];

    protected $table = 'session';

    public $timestamps = false;
}
