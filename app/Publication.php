<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Publication extends Model
{
    //
    protected $guarded = ['candidate_id'];
}