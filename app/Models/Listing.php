<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
         'user_id',
        'description',
        'company',
        'website',
        'location',
        'email',
        'tags',
        'logo'
    ];

    public function scopeFilter($query, array $filters){
        
        if($filters['tag'] ?? false){
            $query->where('Tags', 'like', '%'. request('tag').'%');
        }
        if($filters['search'] ?? false){
            $query->where('Tags', 'like', '%'. request('search').'%')
            ->orwhere('Description', 'like', '%'. request('search').'%')
            ->orwhere('Title', 'like', '%'. request('search').'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
