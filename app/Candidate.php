<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Candidate extends Model
{
    //

    // protected $table = 'candidates';

    protected $guarded = [];

    public function education_history()
    {
        return $this->hasMany('App\EducationHistory');
    }

    public function portfolio()
    {
        return $this->hasMany('App\Portfolio');
    }

    public function publication()
    {
        return $this->hasMany('App\Publication');
    }

    public function reference()
    {
        return $this->hasMany('App\Reference');
    }

    public function work_experience()
    {
        return  $this->hasMany('App\WorkExperience');
    }
}