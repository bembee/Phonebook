<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
        'address',
        'mailing_address'
    ];

    public function Email()
    {
        return $this->hasMany(Email::class);
    }
    
    public function Phone()
    {
        return $this->hasMany(Phone::class);
    }

}
