<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Portfolio extends Model
{
    //
    // protected $table = 'portfolio';

    protected $guarded = [];

    public function candidate()
    {
        return $this->belongsTo('App\Candidate');
    }
}