<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }

        $this->attributes['slug'] = $slug;
    }
    public function incrementSlug($slug)
    {
        $original = $slug;

        $count = 2;

        while (static::whereSlug($slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }

        return $slug;
    }
    public function provider()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categoryDetails()
    {
        return $this->belongsTo(Category::class, 'category', 'slug');
    }

    public function applied()
    {
        return $this->hasOne(Connection::class, 'job_id')->where('nurse_id', Auth::user()->id ?? '');
    }
    public function state()
    {
        return $this->hasOne(Zip::class, 'code', 'zip');
    }
}
