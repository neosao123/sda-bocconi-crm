<?php

return [

/*
|----------------------------------------------------------------------
| Validation Language Lines
|----------------------------------------------------------------------
|
| The following language lines contain the fault error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

'accepted' => ':attribute ' . __('lang.must_be_accepted') . ' (स्वीकृत असावे)',
'active_url' => ':attribute ' . __('lang.is_not_a_valid_url') . ' (वैध URL नाही)',
'after' => ':attribute ' . __('lang.date_is_not_valid') . ' (दिनांक वैध नाही)',
'after_or_equal' => ':attribute ' . __('lang.date_is_not_valid') . ' (दिनांक वैध नाही)',
'alpha' => ':attribute ' . __('lang.must_only_contain_letters') . ' (फक्त अक्षरे असावी)',
'alpha_dash' => ':attribute ' . __('lang.must_only_contain_letters_numbers_dashes') . ' (फक्त अक्षरे, अंक आणि डॅश असावे)',
'alpha_num' => ':attribute ' . __('lang.must_only_contain_letters_numbers') . ' (फक्त अक्षरे आणि अंक असावे)',
'array' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'before' => ':attribute ' . __('lang.date_is_not_valid') . ' (दिनांक वैध नाही)',
'before_or_equal' => ':attribute ' . __('lang.date_is_not_valid') . ' (दिनांक वैध नाही)',
'between' => [
    'numeric' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
    'file' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
    'string' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
    'array' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
],
'boolean' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'confirmed' => ':attribute ' . __('lang.confirmation_text_does_not_match') . ' (पुष्टीकरण जुळत नाही)',
'date' => ':attribute ' . __('lang.date_is_not_valid') . ' (दिनांक वैध नाही)',
'date_format' => ':attribute ' . __('lang.date_is_not_valid') . ' (दिनांक वैध नाही)',
'different' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'digits' => ':attribute ' . __('lang.must_only_contain_numbers') . ' (फक्त अंक असावे)',
'digits_between' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'dimensions' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'distinct' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'email' => ':attribute ' . __('lang.is_not_a_valid_email_address') . ' (वैध ई-मेल पत्ता नाही)',
'exists' => ':attribute ' . __('lang.does_not_exist') . ' (अस्तित्वात नाही)',
'gt' => [
    'numeric' => ':attribute ' . __('lang.must_be_greater_than') . ' :value (यापेक्षा मोठा असावा)',
    'file' => ':attribute ' . __('lang.must_be_greater_than') . ' :value (यापेक्षा मोठा असावा)',
    'string' => ':attribute ' . __('lang.must_be_greater_than') . ' :value (यापेक्षा मोठा असावा)',
    'array' => ':attribute ' . __('lang.must_be_greater_than') . ' :value (यापेक्षा मोठा असावा)',
],
'gte' => [
    'numeric' => ':attribute ' . __('lang.must_be_greater_than_or_equal_to') . ' :value (याबरोबर किंवा मोठा असावा)',
    'file' => ':attribute ' . __('lang.must_be_greater_than_or_equal_to') . ' :value (याबरोबर किंवा मोठा असावा)',
    'string' => ':attribute ' . __('lang.must_be_greater_than_or_equal_to') . ' :value (याबरोबर किंवा मोठा असावा)',
    'array' => ':attribute ' . __('lang.must_be_greater_than_or_equal_to') . ' :value (याबरोबर किंवा मोठा असावा)',
],
'file' => ':attribute ' . __('lang.is_not_a_valid_file') . ' (वैध फाइल नाही)',
'filled' => ':attribute ' . __('lang.must_not_be_blank') . ' (रिकामे नसावे)',
'image' => ':attribute ' . __('lang.is_not_a_valid_image') . ' (वैध प्रतिमा नाही)',
'in' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'in_array' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'integer' => ':attribute ' . __('lang.must_be_a_whole_nuber') . ' (पूर्णांक असावा)',
'ip' => ':attribute ' . __('lang.is_not_a_valid_ip_address') . ' (वैध IP पत्ता नाही)',
'ipv4' => ':attribute ' . __('lang.is_not_a_valid_ip_address') . ' (वैध IP पत्ता नाही)',
'ipv6' => ':attribute ' . __('lang.is_not_a_valid_ip_address') . ' (वैध IP पत्ता नाही)',
'json' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'max' => [
    'numeric' => ':attribute ' . __('lang.must_be_a_number_not_greater_than') . ' :max (यापेक्षा मोठा नसावा)',
    'file' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
    'string' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
    'array' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
],
'mimes' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'mimetypes' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'min' => [
    'numeric' => ':attribute ' . __('lang.must_be_a_number_greater_than') . ' :min (यापेक्षा कमी नसावा)',
    'file' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
    'string' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
    'array' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
],
'not_in' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'numeric' => ':attribute ' . __('lang.is_not_a_valid_number') . ' (वैध संख्या नाही)',
'present' => ':attribute field must be present. (क्षेत्र उपस्थित असावे.)',
'regex' => ':attribute ' . __('lang.is_invalid') . ' (अवैध आहे)',
'required' => ':attribute ' . __('lang.is_required') . ' (आवश्यक आहे)',
'required_if' => ':attribute ' . __('lang.is_required') . ' (आवश्यक आहे)',
'required_unless' => ':attribute ' . __('lang.is_required') . ' (आवश्यक आहे)',
'required_with' => ':attribute ' . __('lang.is_required') . ' (आवश्यक आहे)',
'required_with_all' => ':attribute ' . __('lang.is_required') . ' (आवश्यक आहे)',
'required_without' => ':attribute ' . __('lang.is_required') . ' (आवश्यक आहे)',
'required_without_all' => ':attribute ' . __('lang.is_required') . ' (आवश्यक आहे)',
'same' => ':attribute ' . __('lang.values_do_no_match') . ' (मूल्ये जुळत नाहीत)',
'size' => [
    'numeric' => ':attribute must be :size. (आकार :size असावा.)',
    'file' => ':attribute must be :size kilobytes. (आकार :size किलाबाइट्स असावा.)',
    'string' => ':attribute must be :size characters. (आकार :size अक्षरे असावी.)',
    'array' => ':attribute must contain :size items. (आकार :size वस्तू असाव्यात.)',
],
'string' => ':attribute ' . __('lang.must_only_contain_letters_numbers') . ' (फक्त अक्षरे आणि अंक असावे)',
'timezone' => ':attribute must be a valid zone. (वैध झोन असावा.)',
'unique' => ':attribute ' . __('lang.is_already_taken') . ' (आधीच घेतले आहे)',
'uploaded' => ':attribute ' . __('lang.upload_failed') . ' (अपलोड अयशस्वी झाले)',
'url' => ':attribute ' . __('lang.is_not_a_valid_url') . ' (वैध URL नाही)',

/*
|----------------------------------------------------------------------
| Custom Validation Language Lines
|----------------------------------------------------------------------
|
| Here you may specify custom validation messages for attributes using the
| convention "attribute.rule" to name the lines. This makes it quick to
| specify a specific custom language line for a given attribute rule.
|
*/

'custom' => [
    'attribute-name' => [
        'rule-name' => 'custom-message',
    ],
],

/*
|----------------------------------------------------------------------
| Custom Validation Attributes
|----------------------------------------------------------------------
| These lines are used to swap attribute (form field name) place-holders
| with something more reader friendly such as E-Mail Address instead
| of "email".
|
*/


'attributes' => [

    //common fields
    'role_id' => strtolower(__('lang.user_role')) . ' (युजर भूमिका)',
    'first_name' => strtolower(__('lang.first_name')) . ' (पहिले नाव)',
    'last_name' => strtolower(__('lang.last_name')) . ' (आडनाव)',
    'email' => strtolower(__('lang.email_address')) . ' (ई-मेल पत्ता)',
    'password' => strtolower(__('lang.password')) . ' (गुप्तशब्द)',
    'password_confirmation' => strtolower(__('lang.password_confirmation')) . ' (गुप्तशब्दाची पुष्टी)',
    'city' => strtolower(__('lang.city')) . ' (शहर)',
    'country' => strtolower(__('lang.country')) . ' (देश)',
    'phone' => strtolower(__('lang.phone')) . ' (फोन)',
    'day' => strtolower(__('lang.day')) . ' (दिवस)',
    'month' => strtolower(__('lang.month')) . ' (महिना)',
    'year' => strtolower(__('lang.year')) . ' (वर्ष)',
    'hour' => strtolower(__('lang.hour')) . ' (तास)',
    'minute' => strtolower(__('lang.minute')) . ' (मिनिट)',
    'second' => strtolower(__('lang.second')) . ' (सेकंद)',
    'title' => strtolower(__('lang.title')) . ' (शीर्षक)',
    'date' => strtolower(__('lang.date')) . ' (तारीख)',
    'time' => strtolower(__('lang.time')) . ' (वेळ)',
    'recaptcha' => strtolower(__('lang.recaptcha')) . ' (रिसीप्टचा)',
    'subject' => strtolower(__('lang.subject')) . ' (विषय)',
    'message' => strtolower(__('lang.message')) . ' (संदेश)',

    //create or edit projects form
    'project_title' => strtolower(__('lang.project_title')) . ' (प्रकल्पाचे शीर्षक)',
    'project_date_start' => strtolower(__('lang.start_date')) . ' (प्रकल्पाची सुरुवात)',
    'project_categoryid' => strtolower(__('lang.category')) . ' (श्रेणी)',
    'clientperm_tasks' => strtolower(__('lang.project_title')) . ' (ग्राहक कार्ये)',

    //create or edit clients form
    'client_company_name' => strtolower(__('lang.company_name')) . ' (कंपनीचे नाव)',

    //create or edit leads
    'lead_title' => strtolower(__('lang.title')) . ' (शीर्षक)',
    'lead_firstname' => strtolower(__('lang.first_name')) . ' (पहिले नाव)',
    'lead_lastname' => strtolower(__('lang.last_name')) . ' (आडनाव)',
    'lead_email' => strtolower(__('lang.email_address')) . ' (ई-मेल पत्ता)',
    'lead_company_name' => strtolower(__('lang.company_name')) . ' (कंपनीचे नाव)',
    'lead_job_position' => strtolower(__('lang.job_title')) . ' (कामाची पदवी)',
    'lead_street' => strtolower(__('lang.street')) . ' (रस्ता)',
    'lead_city' => strtolower(__('lang.city')) . ' (शहर)',
    'lead_state' => strtolower(__('lang.state')) . ' (राज्य)',
    'lead_zip' => strtolower(__('lang.zipcode')) . ' (पिन कोड)',
    'lead_country' => strtolower(__('lang.country')) . ' (देश)',
    'lead_website' => strtolower(__('lang.website')) . ' (वेबसाइट)',

    //create or edit task
    'task_projectid' => strtolower(__('lang.project')) . ' (प्रकल्प)',
    'task_title' => strtolower(__('lang.title')) . ' (शीर्षक)',
    'task_status' => strtolower(__('lang.status')) . ' (स्थिती)',
    'task_priority' => strtolower(__('lang.priority')) . ' (महत्त्व)',

    //create or edit invoice or clone
    'invoice_date' => strtolower(__('lang.invoice_date')) . ' (चालान तारीख)',
    'bill_due_date' => strtolower(__('lang.due_date')) . ' (गायरीची तारीख)',
    'bill_clientid' => strtolower(__('lang.client')) . ' (ग्राहक)',
    'bill_projectid' => strtolower(__('lang.project')) . ' (प्रकल्प)',
    'bill_categoryid' => strtolower(__('lang.category')) . ' (श्रेणी)',
    'bill_recurring' => strtolower(__('lang.recurring')) . ' (पुन्हा पुन्हा)',
    'bill_recurring_duration' => strtolower(__('lang.duration')) . ' (कालावधी)',
    'bill_recurring_period' => strtolower(__('lang.period')) . ' (अवधी)',
    'bill_recurring_cycles' => strtolower(__('lang.cycles')) . ' (चक्रे)',
    'bill_recurring_next' => strtolower(__('lang.start_date')) . ' (पुन्हा सुरू होणारी तारीख)',

    'js_item_unit' => strtolower(__('lang.unit')) . ' (युनिट)',
    'bill_amount_before_tax' => strtolower(__('lang.amount_before_tax')) . ' (कराआधीची रक्कम)',
    'bill_final_amount' => strtolower(__('lang.final_amount')) . ' (अखेरची रक्कम)',
    'bill_tax_total_amount' => strtolower(__('lang.tax_amount')) . ' (कराची रक्कम)',
    'bill_discount_percentage' => strtolower(__('lang.discount')) . ' (सवलत)',
    'bill_subtotal' => strtolower(__('lang.subtotal')) . ' (उप-एकूण)',
    'bill_tax_total_percentage' => strtolower(__('lang.tax')) . ' (कर)',
    'bill_discount_amount' => strtolower(__('lang.discount')) . ' (सवलत)',

    //create or edit estimates
    'bill_date' => strtolower(__('lang.date')) . ' (तारीख)',
    'bill_expiry_date' => strtolower(__('lang.expiry_date')) . ' (कालबाह्य तारीख)',
    'bill_categoryid' => strtolower(__('lang.category')) . ' (श्रेणी)',
    'bill_clientid' => strtolower(__('lang.client')) . ' (ग्राहक)',

    //items
    'item_description' => strtolower(__('lang.description')) . ' (विवरण)',
    'item_unit' => strtolower(__('lang.unit')) . ' (युनिट)',
    'item_rate' => strtolower(__('lang.rate')) . ' (दर)',
    'item_categoryid' => strtolower(__('lang.category')) . ' (श्रेणी)',

    //note
    'note_title' => strtolower(__('lang.title')) . ' (शीर्षक)',
    'note_description' => strtolower(__('lang.description')) . ' (विवरण)',

    //payment
    'payment_gateway' => strtolower(__('lang.payment_method')) . ' (भुगतान पद्धत)',
    'payment_date' => strtolower(__('lang.payment_date')) . ' (भुगतान तारीख)',
    'payment_amount' => strtolower(__('lang.amount')) . ' (रक्कम)',
    'payment_invoiceid' => strtolower(__('lang.invoice_id')) . ' (चालान आयडी)',

    //settings - general
    'settings_company_name' => strtolower(__('lang.company_name')) . ' (कंपनीचे नाव)',
    'settings_system_date_format' => strtolower(__('lang.date_format')) . ' (तारीख स्वरूप)',
    'settings_system_datepicker_format' => strtolower(__('lang.date_picker_format')) . ' (तारीख निवडक स्वरूप)',
    'settings_system_default_leftmenu' => strtolower(__('lang.main_menu_default_state')) . ' (मुख्य मेनूचा डिफॉल्ट स्थिती)',
    'settings_system_default_statspanel' => strtolower(__('lang.stats_panel_default_state')) . ' (आकडेवारी पॅनेलचा डिफॉल्ट स्थिती)',
    'settings_system_pagination_limits' => strtolower(__('lang.table_pagination_limits')) . ' (टेबल पृष्ठांकन मर्यादा)',
    'settings_system_kanban_pagination_limits' => strtolower(__('lang.kanban_pagination_limits')) . ' (कानबन पृष्ठांकन मर्यादा)',
    'settings_system_currency_symbol' => strtolower(__('lang.currency_symbol')) . ' (चलन चिन्ह)',
    'settings_system_currency_position' => strtolower(__('lang.currency_symbol_position')) . ' (चलन चिन्ह स्थान)',
    'settings_system_close_modals_body_click' => strtolower(__('lang.modal_window_close_on_body_click')) . ' (बॉडीवर क्लिक केल्यास मोडाल विंडो बंद करा)',

    'settings_company_address_line_1' => strtolower(__('lang.address')) . ' (पत्ता)',
    'settings_company_city' => strtolower(__('lang.city')) . ' (शहर)',
    'settings_company_state' => strtolower(__('lang.state')) . ' (राज्य)',
    'settings_company_zipcode' => strtolower(__('lang.zipcode')) . ' (पिन कोड)',
    'settings_company_country' => strtolower(__('lang.country')) . ' (देश)',
    'settings_company_telephone' => strtolower(__('lang.telephone')) . ' (फोन नंबर)',

    'settings_projects_default_hourly_rate' => strtolower(__('lang.rate')) . ' (तासाला दर)',
    'settings_projects_assignedperm_tasks_collaborate' => strtolower(__('lang.permissions')) . ' (परवानग्या)',
    'settings_projects_clientperm_tasks_view' => strtolower(__('lang.permissions')) . ' (परवानग्या)',
    'settings_projects_clientperm_tasks_collaborate' => strtolower(__('lang.permissions')) . ' (परवानग्या)',
    'settings_projects_clientperm_tasks_create' => strtolower(__('lang.permissions')) . ' (परवानग्या)',
    'settings_projects_clientperm_timesheets_view' => strtolower(__('lang.permissions')) . ' (परवानग्या)',
    'settings_projects_clientperm_expenses_view' => strtolower(__('lang.permissions')) . ' (परवानग्या)',

    // Placeholder for additional attributes
    'foo' => strtolower(__('lang.bar')) . ' (फू)',

],
'attributes' => [

    //settings - categories
    'category_name' => strtolower(__('lang.name')) . ' (नाव)',

    //setting - tags
    'tag_title' => strtolower(__('lang.tag_title')) . ' (टॅग शीर्षक)',

    //setting - lead sources
    'leadsources_title' => strtolower(__('lang.source_name')) . ' (स्त्रोताचे नाव)',

    //setting - lead status
    'leadstatus_title' => strtolower(__('lang.status_name')) . ' (स्थितीचे नाव)',

    //setting - theme
    'settings_theme_name' => strtolower(__('lang.theme')) . ' (थीम)',

    //setting - email
    'settings_email_from_address' => strtolower(__('lang.system_email_address')) . ' (सिस्टीम ई-मेल पत्ता)',
    'settings_email_from_name' => strtolower(__('lang.system_from_name')) . ' (सिस्टीमचा नाव)',
    'settings_email_smtp_host' => strtolower(__('lang.smtp_host')) . ' (SMTP होस्ट)',
    'settings_email_smtp_port' => strtolower(__('lang.smtp_port')) . ' (SMTP पोर्ट)',
    'settings_email_smtp_username' => strtolower(__('lang.username')) . ' (युजरनेम)',
    'settings_email_smtp_password' => strtolower(__('lang.password')) . ' (गुप्तशब्द)',

    //settings invoices
    'settings_invoices_recurring_grace_period' => strtolower(__('lang.bill_recurring_grace_period')) . ' (गायरीची अनुग्रह कालावधी)',

    //milestone
    'milestone_title' => strtolower(__('lang.milestone_name')) . ' (मायलीस्टोन)',

    //knowledgebase
    'category_visibility' => strtolower(__('lang.visible_to')) . ' (दृश्यमानता)',
    'knowledgebase_title' => strtolower(__('lang.title')) . ' (शीर्षक)',
    'knowledgebase_text' => strtolower(__('lang.description')) . ' (विवरण)',
    'kbcategory_title' => strtolower(__('lang.category_name')) . ' (श्रेणी नाव)',

    //expenses
    'expense_description' => strtolower(__('lang.description')) . ' (विवरण)',
    'expense_clientid' => strtolower(__('lang.client')) . ' (ग्राहक)',
    'expense_projectid' => strtolower(__('lang.project')) . ' (प्रकल्प)',
    'expense_date' => strtolower(__('lang.date')) . ' (तारीख)',
    'expense_amount' => strtolower(__('lang.amount')) . ' (रक्कम)',
    'expense_categoryid' => strtolower(__('lang.category')) . ' (श्रेणी)',
    'expense_billable' => strtolower(__('lang.bar')) . ' (बिल करण्यायोग्य)',

    //tickets
    'ticket_clientid' => strtolower(__('lang.client')) . ' (ग्राहक)',
    'ticket_categoryid' => strtolower(__('lang.department')) . ' (विभाग)',
    'ticket_projectid' => strtolower(__('lang.project')) . ' (प्रकल्प)',
    'ticket_subject' => strtolower(__('lang.subject')) . ' (विषय)',
    'ticket_message' => strtolower(__('lang.message')) . ' (संदेश)',
    'ticketreply_text' => strtolower(__('lang.message')) . ' (संदेश)',
    'ticketreply_ticketid' => strtolower(__('lang.ticket')) . ' (तिकट)',

    //comment
    'comment_text' => strtolower(__('lang.comment')) . ' (टिप्पणी)',

    //email templates
    'emailtemplate_body' => strtolower(__('lang.email_body')) . ' (ई-मेल शरीर)',
    'emailtemplate_subject' => strtolower(__('lang.email_subject')) . ' (ई-मेल विषय)',

    //settings - payment methods
    'settings_paypal_currency' => strtolower(__('lang.currency')) . ' (चलन)',
    'settings_stripe_display_name' => strtolower(__('lang.display_name')) . ' (प्रदर्शित नाव)',
    'settings_paypal_display_name' => strtolower(__('lang.display_name')) . ' (प्रदर्शित नाव)',
    'settings_bank_display_name' => strtolower(__('lang.display_name')) . ' (प्रदर्शित नाव)',

    //settings - milestone
    'milestonecategory_title' => strtolower(__('lang.milestone_name')) . ' (मायलीस्टोन श्रेणी)',

    //cards
    'checklist_text' => strtolower(__('lang.checklist')) . ' (चेकलिस्ट)',


    ],

];
