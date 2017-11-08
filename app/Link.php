<?php

namespace ahref;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $primaryKey = 'short_url';
    protected $fillable = ['long_url', 'short_url', 'clicks'];
}
