<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Skill extends Model
{
    //

    protected $guarded = ['candidate_id'];

    public function candidate()
    {
        return $this->belongsTo('App\Candidate');
    }
}