<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverables extends Model
{
    use HasFactory;

    protected $primaryKey = 'deliverable_id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['deliverable_id'];
    const CREATED_AT = 'deliverable_created';
    const UPDATED_AT = 'deliverable_updated';

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'deliverable_creatorid', 'id');
    }

    public function deliverables_lineentry()
    {
        return $this->hasMany('App\Models\DeliverablesLineentries', 'deliverables_lineentry_deliverablesid', 'deliverable_id');
    }
}
