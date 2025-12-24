@extends('pages.settings.ajaxwrapper')
@section('settings-page')
<!--settings-->
<form class="form">

    <div class="row">
        <div class="col-lg-5 col-md-8">
            <div class="card">
                <div class="card-body">

                    <!--allow registration-->
                    <div class="form-group form-group-checkbox row">
                        <label class="col-10 col-form-label">{{ cleanLang(__('lang.allow_customers_to_signup')) }}</label>
                        <div class="col-2 p-t-5">
                            <input type="checkbox" id="settings_clients_registration" name="settings_clients_registration"
                                class="filled-in chk-col-light-blue"
                                {{ runtimePrechecked($settings['settings_clients_registration'] ?? '') }}>
                            <label for="settings_clients_registration"></label>
                        </div>
                    </div>

                    <!--allow clients to login-->
                    <div class="form-group form-group-checkbox row">
                        <label class="col-10 col-form-label">{{ cleanLang(__('lang.allow_clients_to_login')) }}</label>
                        <div class="col-2 p-t-5">
                            <input type="checkbox" id="settings_clients_app_login" name="settings_clients_app_login"
                                class="filled-in chk-col-light-blue"
                                {{ runtimePrechecked($settings['settings_clients_app_login'] ?? '') }}>
                            <label for="settings_clients_app_login"></label>
                        </div>
                    </div>


                    <!--enable shipping address-->
                    <div class="form-group form-group-checkbox row">
                        <label class="col-10 col-form-label">{{ cleanLang(__('lang.enable_shipping_address')) }}</label>
                        <div class="col-2 p-t-5">
                            <input type="checkbox" id="settings_clients_shipping_address" name="settings_clients_shipping_address"
                                class="filled-in chk-col-light-blue"
                                {{ runtimePrechecked($settings['settings_clients_shipping_address'] ?? '') }}>
                            <label for="settings_clients_shipping_address"></label>
                        </div>
                    </div>

                    <!--disable emails-->
                    <div class="form-group form-group-checkbox row">
                        <label class="col-10 col-form-label">{{ cleanLang(__('lang.disable_all_client_emails')) }}</label>
                        <div class="col-2 p-t-5">
                            <input type="checkbox" id="settings_clients_disable_email_delivery"
                                name="settings_clients_disable_email_delivery" class="filled-in chk-col-light-blue"
                                {{ runtimePrechecked($settings['settings_clients_disable_email_delivery'] ?? '') }}>
                            <label for="settings_clients_disable_email_delivery"></label>
                        </div>
                    </div>



                    <!--buttons-->
                </div>
                <div class="card-footer">


                    <div class="text-right">
                        <button type="submit" id="commonModalSubmitButton"
                            class="btn btn-rounded-x btn-danger waves-effect text-left js-ajax-ux-request" data-url="/settings/clients"
                            data-loading-target="" data-ajax-type="PUT" data-type="form"
                            data-on-start-submit-button="disable">{{ cleanLang(__('lang.save_changes')) }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection