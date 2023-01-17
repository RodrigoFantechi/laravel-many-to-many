<?php
namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable =['title', 'description', 'slug','cover_image','type_id' ];

    public static function createSlug($input)
    {
        return Str::slug($input);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
