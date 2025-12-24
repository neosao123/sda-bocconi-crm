<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for deleting records
 *
 * @package    
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use Log;

class DestroyRepository
{

    /**
     * destroy a project and all related items
     * @param int $project_id project id
     * @return bool or id of record
     */
    public function destroyProject($project_id)
    {

        //validate project
        if (!is_numeric($project_id)) {
            Log::error("validation error - invalid params", ['process' => '[destroy]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        //get project and validate
        if (!$project = \App\Models\Project::Where('project_id', $project_id)->first()) {
            Log::error("record could not be found", ['process' => '[destroy]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        //delete tags
        $project->tags()->delete();

        //delete milestones
        $project->milestones()->delete();

        //delete notes
        $project->notes()->delete();

        //delete timers
        $project->timers()->delete();

        //delete assigned table records
        $project->assignedrecords()->delete();

        //delete manager table records
        $project->managerrecords()->delete();



        //delete comments
        if ($comments = $project->comments()->get()) {
            foreach ($comments as $comment) {
                $this->destroyComment($comment->comment_id);
            }
        }

        //delete events & events tracking
        if ($events = $project->events()->get()) {
            foreach ($events as $event) {
                $event->trackings()->delete();
                $event->delete();
            }
        }

        //delete files
        if ($files = $project->files()->get()) {
            foreach ($files as $file) {
                $this->destroyFile($file->file_id);
            }
        }

        //delete file folders
        \App\Models\FileFolder::Where('filefolder_projectid', $project->project_id)->delete();

        //delete tasks
        if ($tasks = $project->tasks()->get()) {
            foreach ($tasks as $task) {
                $this->destroyTask($task->task_id);
            }
        }


        //delete queued emails
        \App\Models\EmailQueue::Where('emailqueue_resourcetype', 'project')->Where('emailqueue_resourceid', $project->project_id)->delete();

        //delete the project
        $project->delete();

        return true;
    }

    /**
     * destroy a client and all related items
     * @param numeric $client_id
     * @return bool or id of record
     */
    public function destroyClient($client_id)
    {

        //validate client
        if (!is_numeric($client_id)) {
            Log::error("validation error - invalid params", ['process' => '[destroy][client]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        //get client and validate
        if (!$client = \App\Models\Client::Where('client_id', $client_id)->first()) {
            Log::error("record could not be found", ['process' => '[destroy][client]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        $customer_leads = \App\Models\CustomerLeads::where('lead_clientid', $client_id)->get();

        foreach ($customer_leads as $cstlead) {
            // Delete main lead if exists
            if (!empty($cstlead->lead_clientid) && !empty($cstlead->lead_converted_by_leadid)) {
                $main_lead = \App\Models\Lead::find($cstlead->lead_converted_by_leadid);
                if ($main_lead) {
                    $main_lead->delete();
                } else {
                    Log::warning("Main lead not found for CustomerLead ID: {$cstlead->id}");
                }
            }
            // Delete the customer lead
            $cstlead->delete();
        }

        if ($projects = $client->projects()->get()) {
            foreach ($projects as $project) {
                $this->destroyProject($project->project_id);
            }
        }

        //delete users
        $client->users()->delete();

        //delete queued emails
        \App\Models\EmailQueue::Where('emailqueue_resourcetype', 'client')->Where('emailqueue_resourceid', $client->client_id)->delete();

        //delete client
        $client->delete();

        return true;
    }



    /**
     * destroy a task and all related items
     * @param numeric $task_id
     * @return bool or id of record
     */
    public function destroyTask($task_id)
    {

        //validate task
        if (!is_numeric($task_id)) {
            Log::error("validation error - invalid params", ['process' => '[destroy][task]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        //get task and validate
        if (!$task = \App\Models\Task::Where('task_id', $task_id)->first()) {
            Log::error("record could not be found", ['process' => '[destroy][task]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        //delete tags
        $task->tags()->delete();

        //delete checklists
        $task->checklists()->delete();

        //delete assigned records
        $task->assignedrecords()->delete();

        //delete attachemnts
        if ($attachments = $task->attachments()->get()) {
            foreach ($attachments as $attachment) {
                if ($attachment->attachment_directory != '') {
                    if (Storage::exists("files/$attachment->attachment_directory")) {
                        Storage::deleteDirectory("files/$attachment->attachment_directory");
                    }
                }
                $attachment->delete();
            }
        }

        //delete timers
        $task->timers()->delete();

        //delete comments
        if ($comments = $task->comments()->get()) {
            foreach ($comments as $comment) {
                $this->destroyComment($comment->comment_id);
            }
        }

        //delete events and events tracking
        if ($events = \App\Models\Event::Where('event_parent_type', 'task')->Where('event_parent_id', $task_id)->get()) {
            foreach ($events as $event) {
                $event->trackings()->delete();
                $event->delete();
            }
        }

        //delete queued emails
        \App\Models\EmailQueue::Where('emailqueue_resourcetype', 'task')->Where('emailqueue_resourceid', $task_id)->delete();

        //delete task
        $task->delete();
    }


    /**
     * destroy any type of comment
     * @param numeric $comment_id id of the record
     * @return null
     */
    public function destroyComment($comment_id)
    {

        //validate comment
        if (!is_numeric($comment_id)) {
            Log::error("validation error - invalid params", ['process' => '[destroy][comment]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        //get file and validate
        if (!$comment = \App\Models\Comment::Where('comment_id', $comment_id)->first()) {
            Log::error("record could not be found", ['process' => '[destroy][comment]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        //delete events and events tracking
        if ($events = \App\Models\Event::Where('event_item', 'comment')->Where('event_item_id', $comment_id)->get()) {
            foreach ($events as $event) {
                $event->trackings()->delete();
                $event->delete();
            }
        }

        //delete comment
        $comment->delete();
    }

    /**
     * destroy any type of file
     * @param numeric $file_id
     * @return bool or id of record
     */
    public function destroyFile($file_id)
    {

        //validate file
        if (!is_numeric($file_id)) {
            Log::error("validation error - invalid params", ['process' => '[destroy][file]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        //get file and validate
        if (!$file = \App\Models\File::Where('file_id', $file_id)->first()) {
            Log::error("record could not be found", ['process' => '[destroy][file]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        //physically delete directory
        if ($file->file_directory != '') {
            if (Storage::exists("files/$file->file_directory")) {
                Storage::deleteDirectory("files/$file->file_directory");
            }
        }

        //delete events and events tracking
        if ($events = \App\Models\Event::Where('event_item', 'file')->Where('event_item_id', $file_id)->get()) {
            foreach ($events as $event) {
                $event->trackings()->delete();
                $event->delete();
            }
        }

        //remove cover from projects that originally used this image as a cover
        \App\Models\Project::where('project_cover_file_id', $file_id)
            ->update([
                'project_cover_file_id' => null,
                'project_cover_directory' => '',
                'project_cover_filename' => '',
            ]);

        //delete file
        $file->delete();
    }

    /**
     * destroy any task attachment
     * @param numeric $attachment_id
     * @return bool or id of record
     */
    public function destroyTaskAttachment($attachment_id)
    {

        //validate attachment
        if (!is_numeric($attachment_id)) {
            Log::error("validation error - invalid params", ['process' => '[destroy][attachment]', config('app.debug_ref'), 'function' => __function__, 'attachment' => basename(__FILE__), 'line' => __line__, 'path' => __attachment__]);
            return false;
        }

        //get attachment and validate
        if (!$attachment = \App\Models\Attachment::Where('attachment_id', $attachment_id)->first()) {
            Log::error("attachment could not be found", ['process' => '[destroy][attachment]', config('app.debug_ref'), 'function' => __function__, 'attachment' => basename(__FILE__), 'line' => __line__, 'path' => __attachment__]);
            return false;
        }

        //is it a task attachment
        if ($attachment->attachmentresource_type != 'task') {
            Log::error("attachment is not for a task", ['process' => '[destroy][attachment]', config('app.debug_ref'), 'function' => __function__, 'attachment' => basename(__FILE__), 'line' => __line__, 'path' => __attachment__]);
            return false;
        }

        //physically delete directory
        if ($attachment->attachment_directory != '') {
            if (Storage::exists("files/$attachment->attachment_directory")) {
                Storage::deleteDirectory("files/$attachment->attachment_directory");
            }
        }

        //remove cover from projects that originally used this image as a cover
        \App\Models\Task::where('task_id', $attachment->attachmentresource_id)
            ->update([
                'task_cover_image' => 'no',
                'task_cover_image_uniqueid' => '',
                'task_cover_image_filename' => '',
            ]);

        //delete attachment
        $attachment->delete();
    }

    /**
     * destroy any attachment
     * @param numeric $attachment_id
     * @return bool or id of record
     */
    public function destroyAttachment($attachment_id)
    {

        //validate attachment
        if (!is_numeric($attachment_id)) {
            Log::error("validation error - invalid params", ['process' => '[destroy][attachment]', config('app.debug_ref'), 'function' => __function__, 'attachment' => basename(__FILE__), 'line' => __line__, 'path' => __attachment__]);
            return false;
        }

        //get attachment and validate
        if (!$attachment = \App\Models\Attachment::Where('attachment_id', $attachment_id)->first()) {
            Log::error("attachment could not be found", ['process' => '[destroy][attachment]', config('app.debug_ref'), 'function' => __function__, 'attachment' => basename(__FILE__), 'line' => __line__, 'path' => __attachment__]);
            return false;
        }

        //physically delete directory
        if ($attachment->attachment_directory != '') {
            if (Storage::exists("files/$attachment->attachment_directory")) {
                Storage::deleteDirectory("files/$attachment->attachment_directory");
            }
        }

        //remove cover from projects that originally used this image as a cover
        \App\Models\Task::where('task_id', $attachment->attachmentresource_id)
            ->update([
                'task_cover_image' => 'no',
                'task_cover_image_uniqueid' => '',
                'task_cover_image_filename' => '',
            ]);

        //delete attachment
        $attachment->delete();
    }


    /**
     * destroy a lead and all related items
     * @param numeric $lead_id
     * @return bool or id of record
     */
    public function destroyLead($lead_id, $type)
    {

        //validate lead
        if (!is_numeric($lead_id) && !($type == "client" || $type == "lead")) {
            Log::error("validation error - invalid params", ['process' => '[destroy][lead]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }
        $lead = $type == "client" ? \App\Models\CustomerLeads::Where('customer_lead_id', $lead_id)->first() : \App\Models\lead::Where('lead_id', $lead_id)->first();
        //get lead and validate
        if (!$lead) {
            Log::error("record could not be found", ['process' => '[destroy][lead]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
            return false;
        }

        if ($type == "client") {
            if (!empty($lead->lead_clientid) && !empty($lead->lead_converted_by_leadid)) {
                $main_lead = \App\Models\Lead::find($lead->lead_converted_by_leadid);
                if ($main_lead) {
                    $main_lead->delete();
                }
            }
        } else {
            if ($lead->lead_converted == "yes") {
                Log::error("This lead cannot be deleted because it is converted to customer", ['process' => '[destroy][lead]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
                abort(409, "This lead cannot be deleted because it is converted to customer.");
                return false;
            }
        }

        //delete tags
        $lead->tags()->delete();

        //delete checklists
        $lead->checklists()->delete();

        //delete assigned records
        $lead->assignedrecords()->delete();

        //delete attachemnts
        if ($attachments = $lead->attachments()->get()) {
            foreach ($attachments as $attachment) {
                if ($attachment->attachment_directory != '') {
                    if (Storage::exists("files/$attachment->attachment_directory")) {
                        Storage::deleteDirectory("files/$attachment->attachment_directory");
                    }
                }
                $attachment->delete();
            }
        }

        //delete comments
        if ($comments = $lead->comments()->get()) {
            foreach ($comments as $comment) {
                $this->destroyComment($comment->comment_id);
            }
        }

        //delete events and events tracking
        if ($events = \App\Models\Event::Where('event_parent_type', 'lead')->Where('event_parent_id', $lead_id)->get()) {
            foreach ($events as $event) {
                $event->trackings()->delete();
                $event->delete();
            }
        }

        if ($events = \App\Models\Event::Where('event_parent_type', 'lead')->Where('event_parent_id', $lead_id)->get()) {
            foreach ($events as $event) {
                $event->trackings()->delete();
                $event->delete();
            }
        }


        //delete queued emails
        \App\Models\EmailQueue::Where('emailqueue_resourcetype', 'lead')->Where('emailqueue_resourceid', $lead_id)->delete();

        //delete lead
        $lead->delete();
    }
}
