<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramsModel extends Model
{
    //
    protected $table = 'programs';

    protected $fillable = ['program_code' , 'program_name' , 'program_category' , 'program_min_points'];

    protected $id = 'program_code';
}
