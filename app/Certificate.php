<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Certificate extends Model
{
    //

    protected $guarded = [];

    public function candidate()
    {
        return $this->belongsTo('App\Candidate');
    }
}