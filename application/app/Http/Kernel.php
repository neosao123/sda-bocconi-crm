<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [

            //system middleware
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,

            //#neosao BOOTING
            \App\Http\Middleware\General\BootSystem::class,
            \App\Http\Middleware\General\BootTheme::class,
            \App\Http\Middleware\General\BootMail::class,

            //#neosao [settings middleware]
            \App\Http\Middleware\General\Settings::class,
            //#neosao [general middleware]
            \App\Http\Middleware\General\SanityCheck::class,
            //#neosao [general middleware]
            \App\Http\Middleware\General\General::class,
            //#neosao [modules middleware]
            \App\Http\Middleware\Modules\Status::class,
            //#neosao [modules middleware]
            \App\Http\Middleware\Modules\Visibility::class,

            //[MODULES] #neosao [modules main menus]
            \App\Http\Middleware\Modules\Menus::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [

        //system
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'memo' => \App\Http\Middleware\General\Memo::class, //[memo]

        /** ---------------------------------------------------------------------------------
         * [SAAS] MIDDLEWARE
         *-----------------------------------------------------------------------------------*/
        'accountStatus' => \App\Http\Middleware\Account\AccountStatus::class,
        'accountLimitsClients' => \App\Http\Middleware\Account\AccountLimitsClients::class,
        'accountLimitsTeam' => \App\Http\Middleware\Account\AccountLimitsTeam::class,
        'accountLimitsProjects' => \App\Http\Middleware\Account\AccountLimitsProjects::class,

        /** ---------------------------------------------------------------------------------
         * CRM MIDDLEWARE
         *-----------------------------------------------------------------------------------*/

        //#neosao - [general]
        'adminCheck' => \App\Http\Middleware\General\AdminCheck::class,
        'teamCheck' => \App\Http\Middleware\General\TeamCheck::class,
        'generalMiddleware' => \App\Http\Middleware\General\General::class,
        'demoModeCheck' => \App\Http\Middleware\General\DemoCheck::class,
        'FileSecurityCheck' => \App\Http\Middleware\Fileupload\FileSecurityCheck::class,

        //#neosao - [authentication]
        'authenticationMiddlewareGeneral' => \App\Http\Middleware\Authenticate\General::class,

        //#neosao - [authentication]
        'categoriesMiddlewareGeneral' => \App\Http\Middleware\Categories\General::class,

        //#neosao - [clients]
        'clientsMiddlewareIndex' => \App\Http\Middleware\Clients\Index::class,
        'clientsMiddlewareEdit' => \App\Http\Middleware\Clients\Edit::class,
        'clientsMiddlewareDestroy' => \App\Http\Middleware\Clients\Destroy::class,
        'clientsMiddlewareShow' => \App\Http\Middleware\Clients\Show::class,
        'clientsMiddlewareCreate' => \App\Http\Middleware\Clients\Create::class,
        'importClientsMiddlewareCreate' => \App\Http\Middleware\Import\Clients\Create::class,

        //#neosao - [projects]
        'projectsMiddlewareIndex' => \App\Http\Middleware\Projects\Index::class,
        'projectsMiddlewareShow' => \App\Http\Middleware\Projects\Show::class,
        'projectsMiddlewareEdit' => \App\Http\Middleware\Projects\Edit::class,
        'projectsMiddlewareCreate' => \App\Http\Middleware\Projects\Create::class,
        'projectsMiddlewareDestroy' => \App\Http\Middleware\Projects\Destroy::class,
        'projectsMiddlewareBulkEdit' => \App\Http\Middleware\Projects\BulkEdit::class,
        'projectsMiddlewareBulkAssign' => \App\Http\Middleware\Projects\BulkAssign::class,

        //#neosao - [timesheets]
        'timesheetsMiddlewareIndex' => \App\Http\Middleware\Timesheets\Index::class,
        'timesheetsMiddlewareDestroy' => \App\Http\Middleware\Timesheets\Destroy::class,
        'timesheetsMiddlewareEdit' => \App\Http\Middleware\Timesheets\Edit::class,

        //#neosao - [settings]
        'settingsMiddlewareIndex' => \App\Http\Middleware\Settings\Index::class,

        //#neosao - [notes]
        'notesMiddlewareIndex' => \App\Http\Middleware\Notes\Index::class,
        'notesMiddlewareCreate' => \App\Http\Middleware\Notes\Create::class,
        'notesMiddlewareEdit' => \App\Http\Middleware\Notes\Edit::class,
        'notesMiddlewareDestroy' => \App\Http\Middleware\Notes\Destroy::class,
        'notesMiddlewareShow' => \App\Http\Middleware\Notes\Show::class,

        //#neosao - [items]
        'itemsMiddlewareIndex' => \App\Http\Middleware\Items\Index::class,
        'itemsMiddlewareCreate' => \App\Http\Middleware\Items\Create::class,
        'itemsMiddlewareEdit' => \App\Http\Middleware\Items\Edit::class,
        'itemsMiddlewareDestroy' => \App\Http\Middleware\Items\Destroy::class,
        'itemsMiddlewareBulkEdit' => \App\Http\Middleware\Items\BulkEdit::class, //DONE

        //#neosao - [contacts]
        'contactsMiddlewareIndex' => \App\Http\Middleware\Contacts\Index::class,
        'contactsMiddlewareCreate' => \App\Http\Middleware\Contacts\Create::class,
        'contactsMiddlewareEdit' => \App\Http\Middleware\Contacts\Edit::class,
        'contactsMiddlewareDestroy' => \App\Http\Middleware\Contacts\Destroy::class,

        //#neosao - [leads]
        'leadsMiddlewareIndex' => \App\Http\Middleware\Leads\Index::class,
        'leadsMiddlewareCreate' => \App\Http\Middleware\Leads\Create::class,
        'leadsMiddlewareEdit' => \App\Http\Middleware\Leads\Edit::class,
        'leadsMiddlewareShow' => \App\Http\Middleware\Leads\Show::class,
        'leadsMiddlewareDestroy' => \App\Http\Middleware\Leads\Destroy::class,
        'leadsMiddlewareBulkEdit' => \App\Http\Middleware\Leads\BulkEdit::class,
        'leadsMiddlewareParticipate' => \App\Http\Middleware\Leads\Participate::class,
        'leadsMiddlewareDeleteAttachment' => \App\Http\Middleware\Leads\DeleteAttachment::class,
        'leadsMiddlewareDownloadAttachment' => \App\Http\Middleware\Leads\DownloadAttachment::class,
        'leadsMiddlewareDeleteComment' => \App\Http\Middleware\Leads\DeleteComment::class,
        'leadsMiddlewareEditDeleteChecklist' => \App\Http\Middleware\Leads\EditDeleteChecklist::class,
        'leadsMiddlewareAssign' => \App\Http\Middleware\Leads\Assign::class,
        'importLeadsMiddlewareCreate' => \App\Http\Middleware\Import\Leads\Create::class,
        'leadsMiddlewareCloning' => \App\Http\Middleware\Leads\Cloning::class,
        'leadsMiddlewareBulkAssign' => \App\Http\Middleware\Leads\BulkAssign::class,

        //#neosao - [tasks]
        'tasksMiddlewareIndex' => \App\Http\Middleware\Tasks\Index::class,
        'tasksMiddlewareShow' => \App\Http\Middleware\Tasks\Show::class,
        'tasksMiddlewareCreate' => \App\Http\Middleware\Tasks\Create::class,
        'tasksMiddlewareDestroy' => \App\Http\Middleware\Tasks\Destroy::class,
        'tasksMiddlewareTimer' => \App\Http\Middleware\Tasks\Timer::class,
        'tasksMiddlewareEdit' => \App\Http\Middleware\Tasks\Edit::class,
        'tasksMiddlewareParticipate' => \App\Http\Middleware\Tasks\Participate::class,
        'tasksMiddlewareDeleteAttachment' => \App\Http\Middleware\Tasks\DeleteAttachment::class,
        'tasksMiddlewareDownloadAttachment' => \App\Http\Middleware\Tasks\DownloadAttachment::class,
        'tasksMiddlewareDeleteComment' => \App\Http\Middleware\Tasks\DeleteComment::class,
        'tasksMiddlewareEditDeleteChecklist' => \App\Http\Middleware\Tasks\EditDeleteChecklist::class,
        'tasksMiddlewareAssign' => \App\Http\Middleware\Tasks\Assign::class,
        'tasksMiddlewareCloning' => \App\Http\Middleware\Tasks\Cloning::class,
        'tasksMiddlewareManageDependencies' => \App\Http\Middleware\Tasks\ManageDependencies::class,

        //#neosao - [files]
        'filesMiddlewareIndex' => \App\Http\Middleware\Files\Index::class,
        'filesMiddlewareCreate' => \App\Http\Middleware\Files\Create::class,
        'filesMiddlewareDownload' => \App\Http\Middleware\Files\Download::class,
        'filesMiddlewareDestroy' => \App\Http\Middleware\Files\Destroy::class,
        'filesMiddlewareEdit' => \App\Http\Middleware\Files\Edit::class,
        'filesMiddlewareMove' => \App\Http\Middleware\Files\Move::class,
        'filesMiddlewareBulkDownload' => \App\Http\Middleware\Files\BulkDownload::class,
        'manageFoldersMiddleware' => \App\Http\Middleware\Files\ManageFolders::class,
        'filesMiddlewareCopy' => \App\Http\Middleware\Files\Copy::class,

        //#neosao - [comments]
        'commentsMiddlewareIndex' => \App\Http\Middleware\Comments\Index::class,
        'commentsMiddlewareCreate' => \App\Http\Middleware\Comments\Create::class,
        'commentsMiddlewareDestroy' => \App\Http\Middleware\Comments\Destroy::class,

        //#neosao - [milestone]
        'milestonesMiddlewareIndex' => \App\Http\Middleware\Milestones\Index::class,
        'milestonesMiddlewareCreate' => \App\Http\Middleware\Milestones\Create::class,
        'milestonesMiddlewareEdit' => \App\Http\Middleware\Milestones\Edit::class,
        'milestonesMiddlewareDestroy' => \App\Http\Middleware\Milestones\Destroy::class,


        //#neosao - [milestone]
        'homeMiddlewareIndex' => \App\Http\Middleware\Home\Index::class,

        //#neosao - [project templates]
        'projectTemplatesGeneral' => \App\Http\Middleware\Projects\ProjectTemplatesGeneral::class,
        'projectTemplatesMiddlewareIndex' => \App\Http\Middleware\Templates\Projects\Index::class,
        'projectTemplatesMiddlewareShow' => \App\Http\Middleware\Templates\Projects\Show::class,
        'projectTemplatesMiddlewareEdit' => \App\Http\Middleware\Templates\Projects\Edit::class,
        'projectTemplatesMiddlewareCreate' => \App\Http\Middleware\Templates\Projects\Create::class,
        'projectTemplatesMiddlewareDestroy' => \App\Http\Middleware\Templates\Projects\Destroy::class,

        //#neosao - [customfields]
        'customfieldsMiddlewareEdit' => \App\Http\Middleware\Settings\CustomFields\Edit::class,

        //#neosao - [team]
        'teamMiddlewareIndex' => \App\Http\Middleware\Team\Index::class,
        'teamMiddlewareCreate' => \App\Http\Middleware\Team\Create::class,
        'teamMiddlewareEdit' => \App\Http\Middleware\Team\Edit::class,

        //#neosao - [documents](proposals & contracts)
        'documentsMiddlewareEdit' => \App\Http\Middleware\Documents\Edit::class,

        //#neosao - [spaces]
        'spacesMiddlewareShow' => \App\Http\Middleware\Spaces\Show::class,

        //#neosao - [product tasks]
        'productTasksMiddlewareView' => \App\Http\Middleware\Items\TasksView::class,
        'productTasksMiddlewareEdit' => \App\Http\Middleware\Items\TasksEdit::class,


        //#neosao - [reports]
        'searchMiddlewareIndex' => \App\Http\Middleware\Search\Index::class,

    ];
}
