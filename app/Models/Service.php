<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'services';
    protected $dates = ['deleted_at'];
    protected $fillable = array('name');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
