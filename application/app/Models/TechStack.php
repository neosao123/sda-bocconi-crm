<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechStack extends Model
{
    use HasFactory;

    protected $primaryKey = 'tech_stack_id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['tech_stack_id'];
    const CREATED_AT = 'tech_stack_created';
    const UPDATED_AT = 'tech_stack_updated';

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'tech_stack_creatorid', 'id');
    }
}
