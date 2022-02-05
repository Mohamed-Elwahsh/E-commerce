<?php

namespace Modules\CategoriesModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainCategory extends Model
{
    use HasFactory;

    protected $table = 'main_categories';
    protected $fillable = [
        'translation_lang',
        'translation_of',
        'name',
        'slug',
        'photo',
        'active	',
        'created_at',
        'updated_at',
    ];    
    public function scopeActive($query){
        return $query -> where('active',1);
    }
    public function scopeSeclection($query){
        return $query -> select('translation_lang','name','slug','photo','active');
    }
    protected static function newFactory()
    {
        return \Modules\CategoriesModule\Database\factories\MainCategoryFactory::new();
    }
}
