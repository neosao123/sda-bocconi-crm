<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModules extends Model
{
    use HasFactory;


    protected $primaryKey = 'project_module_id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['project_module_id'];
    const CREATED_AT = 'project_module_created';
    const UPDATED_AT = 'project_module_updated';

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'project_module_creatorid', 'id');
    }

    public function deliverable()
    {
        return $this->belongsTo('App\Models\Deliverables', 'project_module_deliverableid', 'deliverable_id');
    }
}
