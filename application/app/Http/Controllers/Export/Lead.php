<?php

/** --------------------------------------------------------------------------------
 * This controller manages all the business logic for exporting
 *
 * @package    
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers\Export;

use App\Exports\LeadExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Repositories\LeadRepository;

class Lead extends Controller
{

    /**
     * The estimate repository instance.
     */
    protected $leadrepo;

    /**
     * Summary of __construct
     * @param \App\Repositories\LeadRepository $leadrepo
     */
    public function __construct(LeadRepository $leadrepo)
    {
        //parent
        parent::__construct();

        //authenticated
        $this->middleware('auth');

        //Permissions on methods
        $this->middleware('leadsMiddlewareIndex')->only([
            'index',
            'update',
            'store',
            'changeCategoryUpdate',
            'changeStatusUpdate',
            'updateName',
            'updateValue',
            'updateStatus',
            'updateCategory',
            'updateContacted',
            'updatePhone',
            'updateEmail',
            'updateSource',
            'updateOrganisation',
            'updateAssigned',
            'archive',
            'activate',
            'cloneStore',
            'BulkchangeAssignedUpdate',
            'assignedUsersUpdate',
            'BulkChangeStatusUpdate',
        ]);

        $this->leadrepo = $leadrepo;
    }

    /**
     * Export clients to XLSX file
     * @return download
     */
    public function index(LeadExport $export)
    {

        //temp directory
        $directory = Str::random(30);

        //file name
        $filename = __('lang.lead') . '.xlsx';

        //create directory
        Storage::makeDirectory("/temp/$directory");

        //export the file
        try {
            //create directory
            Excel::store($export, "temp/$directory/$filename", 'public');

            //return ajax redirect
            $jsondata['delayed_redirect_url'] = url("/storage/temp/$directory/$filename");

            //ajax response
            return response()->json($jsondata);
        } catch (Exception $e) {

            //error
            $error_message = $e->getMessage();
            Log::error("exporting lead failed", ['process' => '[permissions]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'error_message' => $error_message]);
            //default error
            abort(409, $error_message);
        }
    }
}
