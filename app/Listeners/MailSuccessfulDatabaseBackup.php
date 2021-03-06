<?php

namespace App\Listeners;

use App\Events\SpatieBackupEventsBackupZipWasCreated;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Queue\InteractsWithQueue;


class MailSuccessfulDatabaseBackup
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SpatieBackupEventsBackupZipWasCreated  $event
     * @return void
     */
    public function handle(SpatieBackupEventsBackupZipWasCreated $event)
    {
        $this->mailBackupFile($event->pathToZip);
    }

    public function mailBackupFile($path)
    {
        try {
            Mail::raw('You have a new database backup file.',   function ($message) use ($path) {
                $message->to(env('DB_BACKUP_EMAIL'))
                    ->subject('DB Auto-backup Done')
                    ->attach($path);
            });
        } catch (\Exception $exception) {
            throw $exception;
        }

    }
}
