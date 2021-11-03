<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employer;

class Company extends Model
{
    use HasFactory;

    protected $guarded = false;


    public function employers(){

        return $this->hasMany(Employer::class);
    }
}
