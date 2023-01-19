<?php

namespace App\Models;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'slug', 'cover_image', 'type_id'];

    public static function createSlug($input)
    {
        return Str::slug($input);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * The roles that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
