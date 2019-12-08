<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class EducationHistory extends Model
{
    //
    // protected $table = 'education_histories';

    protected $guarded = ['candidate_id'];
}