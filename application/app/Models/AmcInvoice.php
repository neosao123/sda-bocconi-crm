<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmcInvoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'bill_amc_invoiceid';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['bill_amc_invoiceid'];
    const CREATED_AT = 'bill_created';
    const UPDATED_AT = 'bill_updated';

    /**
     */
    public function taxes()
    {
        return $this->morphMany('App\Models\Tax', 'taxresource')->where('taxresource_type', 'proforma-invoice');
    }

    /**
     * relatioship business rules:
     *         - the Invoice belongs to one Client
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'bill_clientid', 'client_id');
    }

    /**
     * Summary of lineitems
     */
    public function lineitems()
    {
        return $this->morphMany('App\Models\Lineitem', 'lineitemresource');
    }

    /**
     * relatioship business rules:
     *         - the Invoice can have many Tags
     *         - the Tags belongs to one Invoice
     *         - other tags can belong to other tables
     */
    public function tags()
    {
        return $this->morphMany('App\Models\Tag', 'tagresource');
    }


    public function getFormattedBillAmcInvoiceidAttribute()
    {
        return runtimeAmcInvoiceIdFormat($this->bill_date_wise_amc_invoiceid, $this->bill_created);
    }
}
