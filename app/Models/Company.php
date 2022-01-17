<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'id',
        'company_name',
        'email',
        'logo_url',
        'logo_name',
        'website_url',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $connection = 'mysql';


    public function employee()
    {
        return $this->hasMany('App\Models\Employee', 'company_id');

    }
}
