<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
  * @param  $id
  */
//   public function parent()
//   {
//       return $this->belongsTo(Category::class, 'parent_id');
//   }

//   public function children()
//   {
//       return $this->hasMany(Category::class, 'parent_id');
//   }

    public function getParentCategories (){
        return self::all();
    }
    
    public function getAllCategories (){
        return self::all();
    }

    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = ['name'];
    
    public function protypes()
    {
        return $this->belongsToMany(Protype::class, 'category_protype', 'category_id', 'type_id');
    }
}
