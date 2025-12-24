<?php

namespace App\Imports;
// 
use App\Models\Lead;
// 
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class LeadsImport implements ToModel, WithStartRow, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{

    use Importable, SkipsFailures;

    private $rows = 0;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty(array_filter($row))) {
            return null;
        }

        ++$this->rows;

        $customerId = $row['customerid'] ?? null;
        $clientPrefix = config('system.settings_customer_prefix'); // e.g. 'CST'
        $numericId = null;

        if (!empty($customerId) && str_starts_with($customerId, $clientPrefix)) {
            // Remove prefix and get the numeric part (e.g., CST0027 → 27)
            $numericPart = substr($customerId, strlen($clientPrefix));
            if (is_numeric($numericPart)) {
                $numericId = (int) ltrim($numericPart, '0'); // convert '0027' → 27
            }
        }

        // Check if a client exists with this ID
        $customerExists = false;
        if ($numericId) {
            $customerExists = \App\Models\Client::where('client_id', $numericId)->exists();
        }


        // Base data always required
        $data = [
            'lead_importid' => request('import_ref'),
            'lead_firstname' => $row['firstname'] ?? '',
            'lead_type' => $row['leadtype'] ?? 'inhouse',
            'lead_lastname' => $row['lastname'] ?? '',
            'lead_email' => $row['email'] ?? '',
            'lead_title' => $row['title'] ?? '',
            'lead_phone' => $row['telephone'] ?? '',
            'lead_source' => $row['source'] ?? '',
            'lead_job_position' => $row['jobposition'] ?? '',
            'lead_description' => $row['description'] ?? '',
            'lead_creatorid' => auth()->id(),
            'lead_created' => now(),
            'lead_status' => request('lead_status'),
        ];

        // If customer does not exist, add company-related data
        if (!$customerExists) {
            $data = array_merge($data, [
                'lead_company_name' => $row['companyname'] ?? '',
                'lead_street' => $row['street'] ?? '',
                'lead_city' => $row['city'] ?? '',
                'lead_state' => $row['state'] ?? '',
                'lead_zip' => $row['zipcode'] ?? '',
                'lead_country' => $row['country'] ?? '',
                'lead_website' => $row['website'] ?? '',
                'lead_vat' => $row['gstin'] ?? '',
            ]);
        }

        // Add dynamic custom fields (1-150)
        for ($i = 1; $i <= 150; $i++) {
            $key = "lead_custom_field_{$i}";
            $data[$key] = $row[$key] ?? '';
        }

        // Return model based on customer existence
        if ($customerExists) {
            return new \App\Models\CustomerLeads(array_merge($data, [
                'lead_clientid' => $numericId
            ]));
        } else {
            return new \App\Models\Lead($data);
        }
    }


    public function rules(): array
    {
        return [
            'firstname' => [
                'nullable',
            ],
            'lastname' => [
                'nullable',
            ],
            'title' => [
                'required',
            ],
        ];
    }

    /**
     * we are ignoring the header and so we will start with row number (2)
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }


    /**
     * lets count the total imported rows
     * @return int
     */
    public function getRowCount(): int
    {
        return $this->rows;
    }
}
