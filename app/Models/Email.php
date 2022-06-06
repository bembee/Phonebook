<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'phonebook_id'
    ];

    public function Phonebook()
    {
        return $this->belongsTo(Phonebook::class);
    }
    
    
}
