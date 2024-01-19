<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory, sluggable;

    protected $guarded = ['id'];

    protected $fillable = [
        'group_id', 'user_id', 'IsOwner', 'IsEdit', 'IsView'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
