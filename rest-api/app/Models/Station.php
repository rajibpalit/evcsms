<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Company;

class Station extends Model
{
    use HasFactory;
    protected $table = 'stations';
    protected $fillable = ['name', 'latitude', 'longitude', 'company_id', 'address'];
    // public function children()
    // {
    //     return $this->hasManyThrough(Company::class, self::class, 'id', 'company_parent_id', 'company_id');
    //     // return $this->hasManyThrough(
    //     //     Company::class,
    //     //     self::class,
    //     //     'company_id',
    //     //     'id',
    //     //     'id'
    //     // );
    // }
}
