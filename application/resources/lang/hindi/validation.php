<?php

return [

/*
    |--------------------------------------------------------------------------
    | सत्यापन भाषा रेखाएँ
    |--------------------------------------------------------------------------
    |
    | निम्नलिखित भाषा रेखाएँ उन त्रुटि संदेशों को शामिल करती हैं
    | जो सत्यापन कक्षा द्वारा उपयोग की जाती हैं। इनमें से कुछ नियमों में
    | कई संस्करण होते हैं जैसे आकार के नियम। यहां इन संदेशों को
    | अनुकूलित करने के लिए स्वतंत्र महसूस करें।
    |
 */

 'accepted' => ':attribute ' . __('lang.को_स्वीकृत_किया_जाना_चाहिए'),
 'active_url' => ':attribute ' . __('lang.एक_मान्य_url_नहीं_है'),
 'after' => ':attribute ' . __('lang.तारीख_मान्य_नहीं_है'),
 'after_or_equal' => ':attribute ' . __('lang.तारीख_मान्य_नहीं_है'),
 'alpha' => ':attribute ' . __('lang.केवल_अक्षर_समाहित_करना_चाहिए'),
 'alpha_dash' => ':attribute ' . __('lang.केवल_अक्षर_संख्याएँ_और_डैश_समाहित_करना_चाहिए'),
 'alpha_num' => ':attribute ' . __('lang.केवल_अक्षर_और_संख्याएँ_समाहित_करना_चाहिए'),
 'array' => ':attribute ' . __('lang.अमान्य_है'),
 'before' => ':attribute ' . __('lang.तारीख_मान्य_नहीं_है'),
 'before_or_equal' => ':attribute ' . __('lang.तारीख_मान्य_नहीं_है'),
 'between' => [
     'numeric' => ':attribute ' . __('lang.अमान्य_है'),
     'file' => ':attribute ' . __('lang.अमान्य_है'),
     'string' => ':attribute ' . __('lang.अमान्य_है'),
     'array' => ':attribute ' . __('lang.अमान्य_है'),
 ],
 'boolean' => ':attribute ' . __('lang.अमान्य_है'),
 'confirmed' => ':attribute ' . __('lang.पुष्टि_पाठ_मेल_नहीं_खाता'),
 'date' => ':attribute ' . __('lang.तारीख_मान्य_नहीं_है'),
 'date_format' => ':attribute ' . __('lang.तारीख_मान्य_नहीं_है'),
 'different' => ':attribute ' . __('lang.अमान्य_है'),
 'digits' => ':attribute ' . __('lang.केवल_संख्याएँ_समाहित_करनी_चाहिए'),
 'digits_between' => ':attribute ' . __('lang.अमान्य_है'),
 'dimensions' => ':attribute ' . __('lang.अमान्य_है'),
 'distinct' => ':attribute ' . __('lang.अमान्य_है'),
 'email' => ':attribute ' . __('lang.एक_मान्य_ईमेल_पता_नहीं_है'),
 'exists' => ':attribute ' . __('lang.मौजूद_नहीं_है'),
 'gt' => [
     'numeric' => ':attribute ' . __('lang.से_बड़ा_होना_चाहिए') . ' :value',
     'file' => ':attribute ' . __('lang.से_बड़ा_होना_चाहिए') . ' :value',
     'string' => ':attribute ' . __('lang.से_बड़ा_होना_चाहिए') . ' :value',
     'array' => ':attribute ' . __('lang.से_बड़ा_होना_चाहिए') . ' :value',
 ],
 'gte' => [
     'numeric' => ':attribute ' . __('lang.या_इसके_बराबर_होना_चाहिए') . ' :value',
     'file' => ':attribute ' . __('lang.या_इसके_बराबर_होना_चाहिए') . ' :value',
     'string' => ':attribute ' . __('lang.या_इसके_बराबर_होना_चाहिए') . ' :value',
     'array' => ':attribute ' . __('lang.या_इसके_बराबर_होना_चाहिए') . ' :value',
 ],
 'file' => ':attribute ' . __('lang.एक_मान्य_फाइल_नहीं_है'),
 'filled' => ':attribute ' . __('lang.खाली_नहीं_होना_चाहिए'),
 'image' => ':attribute ' . __('lang.एक_मान्य_छवि_नहीं_है'),
 'in' => ':attribute ' . __('lang.अमान्य_है'),
 'in_array' => ':attribute ' . __('lang.अमान्य_है'),
 'integer' => ':attribute ' . __('lang.एक_पूर्णांक_होना_चाहिए'),
 'ip' => ':attribute ' . __('lang.एक_मान्य_IP_पता_नहीं_है'),
 'ipv4' => ':attribute ' . __('lang.एक_मान्य_IP_पता_नहीं_है'),
 'ipv6' => ':attribute ' . __('lang.एक_मान्य_IP_पता_नहीं_है'),
 'json' => ':attribute ' . __('lang.अमान्य_है'),
 'max' => [
     'numeric' => ':attribute ' . __('lang.एक_संख्या_नहीं_होनी_चाहिए') . ' :max',
     'file' => ':attribute ' . __('lang.अमान्य_है'),
     'string' => ':attribute ' . __('lang.अमान्य_है'),
     'array' => ':attribute ' . __('lang.अमान्य_है'),
 ],
 'mimes' => ':attribute ' . __('lang.अमान्य_है'),
 'mimetypes' => ':attribute ' . __('lang.अमान्य_है'),
 'min' => [
     'numeric' => ':attribute ' . __('lang.एक_संख्या_होनी_चाहिए') . ' :min',
     'file' => ':attribute ' . __('lang.अमान्य_है'),
     'string' => ':attribute ' . __('lang.अमान्य_है'),
     'array' => ':attribute ' . __('lang.अमान्य_है'),
 ],
 'not_in' => ':attribute ' . __('lang.अमान्य_है'),
 'numeric' => ':attribute ' . __('lang.एक_मान्य_संख्या_नहीं_है'),
 'present' => ':attribute फ़ील्ड मौजूद होना चाहिए।',
 'regex' => ':attribute ' . __('lang.अमान्य_है'),
 'required' => ':attribute ' . __('lang.आवश्यक_है'),
 'required_if' => ':attribute ' . __('lang.आवश्यक_है'),
 'required_unless' => ':attribute ' . __('lang.आवश्यक_है'),
 'required_with' => ':attribute ' . __('lang.आवश्यक_है'),
 'required_with_all' => ':attribute ' . __('lang.आवश्यक_है'),
 'required_without' => ':attribute ' . __('lang.आवश्यक_है'),
 'required_without_all' => ':attribute ' . __('lang.आवश्यक_है'),
 'same' => ':attribute ' . __('lang.मान_मेल_नहीं_खाते'),
 'size' => [
     'numeric' => ':attribute का आकार :size होना चाहिए।',
     'file' => ':attribute का आकार :size किलोबाइट होना चाहिए।',
     'string' => ':attribute का आकार :size अक्षर होना चाहिए।',
     'array' => ':attribute में :size आइटम होने चाहिए।',
 ],
 'string' => ':attribute ' . __('lang.केवल_अक्षर_और_संख्याएँ_समाहित_करना_चाहिए'),
 'timezone' => ':attribute एक मान्य क्षेत्र होना चाहिए।',
 'unique' => ':attribute ' . __('lang.पहले_से_ले लिया_जा_चुका_है'),
 'uploaded' => ':attribute ' . __('lang.अपलोड_विफल_हुआ'),
 'url' => ':attribute ' . __('lang.एक_मान्य_url_नहीं_है'),
 
 /*
     |--------------------------------------------------------------------------
     | कस्टम सत्यापन भाषा रेखाएँ
     |--------------------------------------------------------------------------
     |
     | यहाँ आप गुणों के लिए कस्टम सत्यापन संदेश निर्दिष्ट कर सकते हैं,
     | उपयोग करके "attribute.rule" की सं Convention के अनुसार
     | इन रेखाओं का नाम देना। यह एक विशेष कस्टम भाषा रेखा को
     | निर्दिष्ट करने में तेज बनाता है।
     |
  */
 
 'custom' => [
     'attribute-name' => [
         'rule-name' => 'कस्टम-संदेश',
     ],
 ],
 
 /*
     |--------------------------------------------------------------------------
     | कस्टम सत्यापन गुण
     |--------------------------------------------------------------------------
     | ये रेखाएँ गुण (फॉर्म फ़ील्ड नाम) प्लेस-होल्डर्स को
     | कुछ अधिक पाठक-अनुकूल के साथ बदलने के लिए उपयोग की जाती हैं,
     | जैसे ई-मेल पता "ईमेल" के बजाय।
     |
  */
 
 
 
 
 
 
 
 'attributes' => [
 
     // सामान्य फ़ील्ड
     'role_id' => strtolower(__('lang.उपयोगकर्ता_भूमिका')),
     'first_name' => strtolower(__('lang.पहला_नाम')),
     'last_name' => strtolower(__('lang.अंतिम_नाम')),
     'email' => strtolower(__('lang.ईमेल_पता')),
     'password' => strtolower(__('lang.पासवर्ड')),
     'password_confirmation' => strtolower(__('lang.पासवर्ड_पुष्टि')),
     'city' => strtolower(__('lang.शहर')),
     'country' => strtolower(__('lang.देश')),
     'phone' => strtolower(__('lang.फोन')),
     'day' => strtolower(__('lang.दिन')),
     'month' => strtolower(__('lang.महिना')),
     'year' => strtolower(__('lang.वर्ष')),
     'hour' => strtolower(__('lang.घंटा')),
     'minute' => strtolower(__('lang.मिनट')),
     'second' => strtolower(__('lang.सेकंड')),
     'title' => strtolower(__('lang.शीर्षक')),
     'date' => strtolower(__('lang.तारीख')),
     'time' => strtolower(__('lang.समय')),
     'recaptcha' => strtolower(__('lang.recaptcha')),
     'subject' => strtolower(__('lang.विषय')),
     'message' => strtolower(__('lang.संदेश')),
 
     // प्रोजेक्ट बनाने या संपादित करने का फॉर्म
     'project_title' => strtolower(__('lang.प्रोजेक्ट_शीर्षक')),
     'project_date_start' => strtolower(__('lang.आरंभ_तारीख')),
     'project_categoryid' => strtolower(__('lang.श्रेणी')),
     'clientperm_tasks' => strtolower(__('lang.प्रोजेक्ट_शीर्षक')),
     'project_clientid' => strtolower(__('lang.ग्राहक')),
 
     // ग्राहकों को बनाने या संपादित करने का फॉर्म
     'client_company_name' => strtolower(__('lang.कंपनी_का_नाम')),
 
     // लीड बनाने या संपादित करने के लिए
     'lead_title' => strtolower(__('lang.शीर्षक')),
     'lead_firstname' => strtolower(__('lang.पहला_नाम')),
     'lead_lastname' => strtolower(__('lang.अंतिम_नाम')),
     'lead_email' => strtolower(__('lang.ईमेल_पता')),
     'lead_company_name' => strtolower(__('lang.कंपनी_का_नाम')),
     'lead_job_position' => strtolower(__('lang.काम_का_पद')),
     'lead_street' => strtolower(__('lang.गली')),
     'lead_city' => strtolower(__('lang.शहर')),
     'lead_state' => strtolower(__('lang.राज्य')),
     'lead_zip' => strtolower(__('lang.जिपकोड')),
     'lead_country' => strtolower(__('lang.देश')),
     'lead_website' => strtolower(__('lang.वेबसाइट')),
 
     // कार्य बनाने या संपादित करने के लिए
     'task_projectid' => strtolower(__('lang.प्रोजेक्ट')),
     'task_title' => strtolower(__('lang.शीर्षक')),
     'task_status' => strtolower(__('lang.स्थिति')),
     'task_priority' => strtolower(__('lang.प्राथमिकता')),
 
     // चालान या क्लोन बनाने या संपादित करने के लिए
     'invoice_date' => strtolower(__('lang.चालान_तारीख')),
     'bill_due_date' => strtolower(__('lang.बकाया_तारीख')),
     'bill_clientid' => strtolower(__('lang.ग्राहक')),
     'bill_projectid' => strtolower(__('lang.प्रोजेक्ट')),
     'bill_categoryid' => strtolower(__('lang.श्रेणी')),
     'bill_recurring' => strtolower(__('lang.पुनरावृत्त')),
     'bill_recurring_duration' => strtolower(__('lang.अवधि')),
     'bill_recurring_period' => strtolower(__('lang.अवधि')),
     'bill_recurring_cycles' => strtolower(__('lang.चक्र')),
     'bill_recurring_next' => strtolower(__('lang.आरंभ_तारीख')),
     
     'js_item_unit' => strtolower(__('lang.इकाई')),
     'bill_amount_before_tax' => strtolower(__('lang.कर_से_पहले_की_राशि')),
     'bill_final_amount' => strtolower(__('lang.अंतिम_राशि')),
     'bill_tax_total_amount' => strtolower(__('lang.कर_की_राशि')),
     'bill_discount_percentage' => strtolower(__('lang.छूट')),
     'bill_subtotal' => strtolower(__('lang.उप-योग')),
     'bill_tax_total_percentage' => strtolower(__('lang.कर')),
     'bill_discount_amount' => strtolower(__('lang.छूट')),
 
     // अनुमान बनाने या संपादित करने के लिए
     'bill_date' => strtolower(__('lang.तारीख')),
     'bill_expiry_date' => strtolower(__('lang.समाप्ति_तारीख')),
     'bill_categoryid' => strtolower(__('lang.श्रेणी')),
     'bill_clientid' => strtolower(__('lang.ग्राहक')),
 
     // वस्तुएं
     'item_description' => strtolower(__('lang.विवरण')),
     'item_unit' => strtolower(__('lang.इकाई')),
     'item_rate' => strtolower(__('lang.दर')),
     'item_categoryid' => strtolower(__('lang.श्रेणी')),
 
     // नोट
     'note_title' => strtolower(__('lang.शीर्षक')),
     'note_description' => strtolower(__('lang.विवरण')),
 
     // भुगतान
     'payment_gateway' => strtolower(__('lang.भुगतान_विधि')),
     'payment_date' => strtolower(__('lang.भुगतान_तारीख')),
     'payment_amount' => strtolower(__('lang.राशि')),
     'payment_invoiceid' => strtolower(__('lang.चालान_आईडी')),
 
     // सेटिंग्स - सामान्य
     'settings_company_name' => strtolower(__('lang.कंपनी_का_नाम')),
     'settings_system_date_format' => strtolower(__('lang.तारीख_का_स्वरूप')),
     'settings_system_datepicker_format' => strtolower(__('lang.तारीख_चुनने_का_स्वरूप')),
     'settings_system_default_leftmenu' => strtolower(__('lang.मुख्य_मेनू_डिफ़ॉल्ट_स्थिति')),
     'settings_system_default_statspanel' => strtolower(__('lang.आंकड़े_पैनल_डिफ़ॉल्ट_स्थिति')),
     'settings_system_pagination_limits' => strtolower(__('lang.तालिका_पृष्ठांकन_सीमाएं')),
     'settings_system_kanban_pagination_limits' => strtolower(__('lang.कानबान_पृष्ठांकन_सीमाएं')),
     'settings_system_currency_symbol' => strtolower(__('lang.मुद्रा_चिन्ह')),
     'settings_system_currency_position' => strtolower(__('lang.मुद्रा_चिन्ह_की_स्थिति')),
     'settings_system_close_modals_body_click' => strtolower(__('lang.शारीरिक_क्लिक_पर_मोडल_खिड़की_बंद करें')),
 
     'settings_company_address_line_1' => strtolower(__('lang.पता')),
     'settings_company_city' => strtolower(__('lang.शहर')),
     'settings_company_state' => strtolower(__('lang.राज्य')),
     'settings_company_zipcode' => strtolower(__('lang.जिपकोड')),
     'settings_company_country' => strtolower(__('lang.देश')),
     'settings_company_telephone' => strtolower(__('lang.फोन')),
 
     'settings_projects_default_hourly_rate' => strtolower(__('lang.दर')),
     'settings_projects_assignedperm_tasks_collaborate' => strtolower(__('lang.अनुमतियाँ')),
     'settings_projects_clientperm_tasks_view' => strtolower(__('lang.अनुमतियाँ')),
     'settings_projects_clientperm_tasks_collaborate' => strtolower(__('lang.अनुमतियाँ')),
     'settings_projects_clientperm_tasks_create' => strtolower(__('lang.अनुमतियाँ')),
     'settings_projects_clientperm_timesheets_view' => strtolower(__('lang.अनुमतियाँ')),
     'settings_projects_clientperm_expenses_view' => strtolower(__('lang.अनुमतियाँ')),
 
     // डमी फ़ील्ड्स
     'foo' => strtolower(__('lang.bar')),
 ],
 
 'attributes' => [
 
     // सेटिंग्स - श्रेणियाँ
     'category_name' => strtolower(__('lang.नाम')),
 
     // सेटिंग्स - टैग्स
     'tag_title' => strtolower(__('lang.टैग_शीर्षक')),
 
     // सेटिंग्स - लीड स्रोत
     'leadsources_title' => strtolower(__('lang.स्रोत_का_नाम')),
 
     // सेटिंग्स - लीड स्थिति
     'leadstatus_title' => strtolower(__('lang.स्थिति_का_नाम')),
 
     // सेटिंग्स - थीम
     'settings_theme_name' => strtolower(__('lang.थीम')),
 
     // सेटिंग्स - ईमेल
     'settings_email_from_address' => strtolower(__('lang.सिस्टम_ईमेल_पता')),
     'settings_email_from_name' => strtolower(__('lang.सिस्टम_से_नाम')),
     'settings_email_smtp_host' => strtolower(__('lang.smtp_होस्ट')),
     'settings_email_smtp_port' => strtolower(__('lang.smtp_पोर्ट')),
     'settings_email_smtp_username' => strtolower(__('lang.उपयोगकर्ता_नाम')),
     'settings_email_smtp_password' => strtolower(__('lang.पासवर्ड')),
 
     // सेटिंग्स - चालान
     'settings_invoices_recurring_grace_period' => strtolower(__('lang.बिल_पुनरावृत्ति_ग्रेस_पीरियड')),
 
     // मील का पत्थर
     'milestone_title' => strtolower(__('lang.मील का पत्थर_का_नाम')),
 
     // ज्ञानकोष
     'category_visibility' => strtolower(__('lang.दृश्यमान_के_लिए')),
     'knowledgebase_title' => strtolower(__('lang.शीर्षक')),
     'knowledgebase_text' => strtolower(__('lang.विवरण')),
     'kbcategory_title' => strtolower(__('lang.श्रेणी_का_नाम')),
 
     // व्यय
     'expense_description' => strtolower(__('lang.विवरण')),
     'expense_clientid' => strtolower(__('lang.ग्राहक')),
     'expense_projectid' => strtolower(__('lang.प्रोजेक्ट')),
     'expense_date' => strtolower(__('lang.तारीख')),
     'expense_amount' => strtolower(__('lang.राशि')),
     'expense_categoryid' => strtolower(__('lang.श्रेणी')),
     'expense_billable' => strtolower(__('lang.बिलिंग योग्य')),
 
     // टिकट
     'ticket_clientid' => strtolower(__('lang.ग्राहक')),
     'ticket_categoryid' => strtolower(__('lang.विभाग')),
     'ticket_projectid' => strtolower(__('lang.प्रोजेक्ट')),
     'ticket_subject' => strtolower(__('lang.विषय')),
     'ticket_message' => strtolower(__('lang.संदेश')),
     'ticketreply_text' => strtolower(__('lang.संदेश')),
     'ticketreply_ticketid' => strtolower(__('lang.टिकट')),
 
     // टिप्पणी
     'comment_text' => strtolower(__('lang.टिप्पणी')),
 
     // ईमेल टेम्पलेट्स
     'emailtemplate_body' => strtolower(__('lang.ईमेल_शरीर')),
     'emailtemplate_subject' => strtolower(__('lang.ईमेल_विषय')),
 
     // सेटिंग्स - भुगतान विधियाँ
     'settings_paypal_currency' => strtolower(__('lang.मुद्रा')),
     'settings_stripe_display_name' => strtolower(__('lang.प्रदर्शित_नाम')),
     'settings_paypal_display_name' => strtolower(__('lang.प्रदर्शित_नाम')),
     'settings_bank_display_name' => strtolower(__('lang.प्रदर्शित_नाम')),
 
     // सेटिंग्स - मील का पत्थर
     'milestonecategory_title' => strtolower(__('lang.मील का पत्थर_का_नाम')),
 
     // कार्ड
     'checklist_text' => strtolower(__('lang.चेकलिस्ट')),
 

    ],

];
