<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Participant extends Eloquent
{
    protected $guarded = [];

    protected $table = 'participant';

    public $timestamps = false;
}
