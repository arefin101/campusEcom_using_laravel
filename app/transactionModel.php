<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactionModel extends Model
{
    protected $table = "transaction";
    protected $primaryKey =  "studentId";
    public $timetamps = false;
}
