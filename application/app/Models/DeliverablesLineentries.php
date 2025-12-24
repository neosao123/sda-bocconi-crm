<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverablesLineentries extends Model
{
    use HasFactory;

    protected $primaryKey = 'deliverables_lineentry_id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['deliverables_lineentry_id'];
    const CREATED_AT = 'deliverables_lineentry_created';
    const UPDATED_AT = 'deliverables_lineentry_updated';

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'deliverables_lineentry_creatorid', 'id');
    }

    public function techstack()
    {
        return $this->belongsTo('App\Models\TechStack', 'deliverables_lineentry_techstackid', 'tech_stack_id');
    }
}
