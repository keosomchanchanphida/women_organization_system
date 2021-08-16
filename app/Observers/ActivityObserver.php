<?php

namespace App\Observers;

use App\Models\Activity;

class ActivityObserver
{
    /**
     * Handle the Activity "created" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function created(Activity $activity)
    {
        //
    }

    public function updating(Activity $activity)
    {
        if($activity->isDirty('content_path')){
            $this->tryRemoveFile($activity->getOriginal('content_path'));
        }
    }

    /**
     * Handle the Activity "updated" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function updated(Activity $activity)
    {
        //
    }

    /**
     * Handle the Activity "deleted" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function deleted(Activity $activity)
    {
        $this->tryRemoveFile($activity->content_path);
        foreach($activity->images as $image){
            $image->delete();
        }
    }

    /**
     * Handle the Activity "restored" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function restored(Activity $activity)
    {
        //
    }

    /**
     * Handle the Activity "force deleted" event.
     *
     * @param  \App\Models\Activity  $activity
     * @return void
     */
    public function forceDeleted(Activity $activity)
    {
        //
    }

    private function tryRemoveFile($file)
    {
        try {
            if($file)
                unlink(public_path().$file);
        } catch (\Throwable $e) { }
    }
}
