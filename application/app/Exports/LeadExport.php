<?php

namespace App\Exports;

use App\Repositories\LeadRepository;
use App\Repositories\CustomFieldsRepository;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LeadExport implements FromCollection, WithHeadings, WithMapping
{

    /**
     * The client repo repository
     */
    protected $leadrepo;
    protected $customrepo;

    public function __construct(LeadRepository $leadrepo, CustomFieldsRepository $customrepo)
    {
        $this->leadrepo = $leadrepo;
        $this->customrepo = $customrepo;
    }

    //get the leadrepo
    public function collection()
    {
        //search
        request()->merge([
            'search_type' => 'exports',
        ]);
        $lead = $this->leadrepo->search('', ['no_pagination' => true]);
        //return
        return $lead;
    }

    //map the columns that we want
    public function map($lead): array
    {

        $map = [];

        //standard fields - loop thorugh all post data
        if (is_array(request('standard_field'))) {
            foreach (request('standard_field') as $key => $value) {
                if ($value == 'on') {
                    switch ($key) {
                        case 'lead_id':
                            $map[] = getLeadId($lead)['formatted_id'];
                            break;
                        case 'lead_contact_name':
                            $map[] = $lead->lead_firstname . ' ' . $lead->lead_lastname;
                            break;
                        case 'lead_title':
                            $map[] = $lead->lead_title;
                            break;
                        case 'lead_type':
                            $map[] = getLeadTypeName($lead->lead_type);
                            break;
                        case 'lead_created':
                            $map[] = runtimeDate($lead->lead_created);
                            break;
                        // case 'lead_value':
                        //     $map[] = runtimeMoneyFormat($lead->lead_value) ?? '';
                        //     break;
                        case 'lead_status':
                            $map[] = $lead->leadstatus->leadstatus_title;
                            break;
                        case 'lead_assigned':
                            $map[] = isset($lead->assigned)
                                ? implode(', ', $lead->assigned->map(fn($user) => $user->first_name . ' ' . $user->last_name)->toArray())
                                : '';
                            break;
                        case 'lead_categoryid':
                            $map[] = $lead->category_name;
                            break;
                        case 'lead_company_name':
                            $map[] = $lead->lead_company_name;
                            break;
                        case 'lead_email':
                            $map[] = $lead->lead_email;
                            break;
                        case 'lead_phone':
                            $map[] = $lead->lead_phone;
                            break;
                        case 'lead_job_position':
                            $map[] = $lead->lead_job_position;
                            break;
                        case 'lead_city':
                            $map[] = $lead->lead_city;
                            break;
                        case 'lead_state':
                            $map[] = $lead->lead_state;
                            break;
                        case 'lead_zip':
                            $map[] = $lead->lead_zip;
                            break;
                        case 'lead_country':
                            $map[] = $lead->lead_country;
                            break;
                        case 'lead_vat':
                            $map[] = $lead->lead_vat;
                            break;
                        case 'lead_last_contacted':
                            $map[] = runtimeDate($lead->lead_last_contacted);
                            break;
                        case 'lead_converted_date':
                            $map[] = runtimeDate($lead->lead_converted_date);
                            break;
                        case 'lead_source':
                            $map[] = $lead->lead_source;
                            break;
                        default:
                            $map[] = $lead->{$key};
                            break;
                    }
                }
            }
        }

        //custom fields - loop thorugh all post data
        if (is_array(request('custom_field'))) {

            foreach (request('custom_field') as $key => $value) {
                if ($value == 'on') {
                    if ($field = \App\Models\CustomField::Where('customfields_name', $key)->first()) {
                        switch ($field->customfields_datatype) {
                            case 'date':
                                $map[] = runtimeDate($lead->{$key});
                                break;
                            case 'checkbox':
                                $map[] = ($lead->{$key} == 'on') ? __('lang.checked_custom_fields') : '---';
                                break;
                            default:
                                $map[] = $lead->{$key};
                                break;
                        }
                    } else {
                        $map[] = '';
                    }
                }
            }
        }

        return $map;
    }

    //create heading
    public function headings(): array
    {

        //headings
        $heading = [];

        //lang - standard fields
        $standard_lang = [
            'lead_id' => __('lang.id'),
            'lead_contact_name' => __('lang.contact_name'),
            'lead_title' => __('lang.title'),
            'lead_created' => __('lang.created'),
            'lead_type' => __('lang.lead_type'),
            // 'lead_value' => __('lang.value'),
            'lead_status' => __('lang.status'),
            'lead_assigned' => __('lang.assigned'),
            'lead_categoryid' => __('lang.category'),
            'lead_company_name' => __('lang.company'),
            'lead_email' => __('lang.email'),
            'lead_phone' => __('lang.phone'),
            'lead_job_position' => __('lang.position'),
            'lead_city' => __('lang.city'),
            'lead_state' => __('lang.state'),
            'lead_zip' => __('lang.zipcode'),
            'lead_country' => __('lang.country'),
            'lead_vat' => __('lang.vat_tax_number'),
            'lead_last_contacted' => __('lang.last_contacted'),
            'lead_converted_date' => __('lang.date_converted'),
            'lead_source' => __('lang.source'),
        ];

        $custom_lang = $this->customrepo->fieldTitles();

        //standard fields - loop thorugh all post data
        if (is_array(request('standard_field'))) {
            foreach (request('standard_field') as $key => $value) {
                if ($value == 'on') {
                    $heading[] = (isset($standard_lang[$key])) ? $standard_lang[$key] : $key;
                }
            }
        }

        //custom fields - loop thorugh all post data
        if (is_array(request('custom_field'))) {
            foreach (request('custom_field') as $key => $value) {
                if ($value == 'on') {
                    $heading[] = (isset($custom_lang[$key])) ? $custom_lang[$key] : $key;
                }
            }
        }

        //return full headings
        return $heading;
    }
}
