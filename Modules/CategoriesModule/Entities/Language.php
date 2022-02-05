<?php

namespace Modules\CategoriesModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';
    protected $fillable = [
        'abbr',
        'local',
        'name',
        'direction',
        'active',
        'created_at',
        'updated_at',
    ];
    public function scopeActive($query){
        return $query -> where('active',1);
    }   

     public function scopeSeclection($query){
        return $query -> select('id','abbr','name','direction','active');
    }
    protected static function newFactory()
    {
        return \Modules\CategoriesModule\Database\factories\LanguageFactory::new();
    }
}
