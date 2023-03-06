<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $fillable =['company_name','address','city','state','zip_code','country','telephone','sys_email','from_email','reg_no'];
}
