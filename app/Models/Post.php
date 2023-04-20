<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    // don't allow some properties to be mass assigned
    // protected $guarded = ['id'];
    // Only mass assign the values we are in charge of
    protected $guarded = [];
    // allow some properties to be mass assigned
    // protected $fillable = ['title', 'excerpt','body',];

    protected $with = ["category", "author", "comments"];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters["search"] ?? false,
            fn($query, $search) => $query->where(
                fn($query) => $query
                    ->where("title", "like", "%" . $search . "%")
                    ->orWhere("body", "like", "%" . $search . "%")
            )
        );

        $query->when(
            $filters["category"] ?? false,
            fn($query, $category) => $query->whereHas(
                "category",
                fn($query) => $query->where("slug", $category)
            )
        );

        $query->when(
            $filters["author"] ?? false,
            fn($query, $author) => $query->whereHas(
                "author",
                fn($query) => $query->where("username", $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function setSlugAttribute($slug)
    {
        $this->attributes["slug"] = Str::slug($slug, '-');
    }

    public function setUserIdAttribute()
    {
        $this->attributes["user_id"] = auth()->id();
    }
}
