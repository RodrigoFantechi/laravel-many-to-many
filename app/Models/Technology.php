<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    /**
     * The roles that belong to the Technology
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    public static function createSlug($input)
    {
        return Str::slug($input);
    }
}
