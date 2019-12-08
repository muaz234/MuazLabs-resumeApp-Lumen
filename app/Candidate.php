<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Candidate extends Model
{
    //

    // protected $table = 'candidates';

    protected $guarded = [];

    public function education_histories()
    {
        return $this->hasMany('App\EducationHistory');
    }

    public function portfolios()
    {
        return $this->hasMany('App\Portfolio');
    }

    public function publications()
    {
        return $this->hasMany('App\Publication');
    }

    public function references()
    {
        return $this->hasMany('App\Reference');
    }

    public function work_experiences()
    {
        return  $this->hasMany('App\WorkExperience');
    }
}