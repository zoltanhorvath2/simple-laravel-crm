<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'company_id',
        'email',
        'phone_number',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $connection = 'mysql';


    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');

    }
}
