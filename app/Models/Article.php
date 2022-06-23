<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug','body','subject_id',
    ];


    public function getRouteKeyName(){
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

} 