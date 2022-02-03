<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobil extends Model
{
    use HasFactory;
    // protected $fillable=['name','description','price'];
    // protected $guarded = ['id'];
    protected $guarded = [];

    public function type(){
        return $this->belongsTo(AutomobilType::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
