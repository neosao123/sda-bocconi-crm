<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
    use HasFactory;

    protected $primaryKey = 'workorder_id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['workorder_id'];
    const CREATED_AT = 'workorder_created';
    const UPDATED_AT = 'workorder_updated';


    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'workorder_creatorid', 'id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'workorder_client_id', 'client_id');
    }

    public function estimate()
    {
        return $this->belongsTo('App\Models\Estimate', 'workorder_quotation_id', 'bill_estimateid');
    }


    public function getFormattedWorkorderidAttribute()
    {
        return runtimeWorkorderidFormat($this->workorder_id);
    }
}
