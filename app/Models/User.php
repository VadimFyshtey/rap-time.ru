<?php

namespace App\Models;

use App\Models\Relationships\RatingAlbums;
use App\Models\Relationships\RatingArticles;
use App\Models\Relationships\RatingArtists;
use App\Models\Relationships\RatingInterviews;
use App\Models\Relationships\RatingLyrics;
use App\Models\Relationships\RatingNews;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'users';

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'avatar', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function ratingAlbums(): HasMany
    {
        return $this->hasMany(RatingAlbums::class);
    }

    public function ratingLyrics(): HasMany
    {
        return $this->hasMany(RatingLyrics::class);
    }

    public function ratingArtists(): HasMany
    {
        return $this->hasMany(RatingArtists::class);
    }

    public function ratingInterview(): HasMany
    {
        return $this->hasMany(RatingInterviews::class);
    }

    public function ratingArticles(): HasMany
    {
        return $this->hasMany(RatingArticles::class);
    }

    public function ratingNews(): HasMany
    {
        return $this->hasMany(RatingNews::class);
    }

}
