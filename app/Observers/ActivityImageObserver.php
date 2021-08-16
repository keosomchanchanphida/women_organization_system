<?php

namespace App\Observers;

use App\Models\ActivityImage;

class ActivityImageObserver
{
    /**
     * Handle the ActivityImage "created" event.
     *
     * @param  \App\Models\ActivityImage  $activityImage
     * @return void
     */
    public function created(ActivityImage $activityImage)
    {
        //
    }

    public function updating(ActivityImage $activityImage)
    {
        if($activityImage->isDirty('image_path')){
            $this->tryRemoveFile($activityImage->getOriginal('image_path'));
        }
        if($activityImage->isDirty('image_description_path')){
            $this->tryRemoveFile($activityImage->getOriginal('image_description_path'));
        }
    }

    /**
     * Handle the ActivityImage "updated" event.
     *
     * @param  \App\Models\ActivityImage  $activityImage
     * @return void
     */
    public function updated(ActivityImage $activityImage)
    {
        //
    }

    /**
     * Handle the ActivityImage "deleted" event.
     *
     * @param  \App\Models\ActivityImage  $activityImage
     * @return void
     */
    public function deleted(ActivityImage $activityImage)
    {
        $this->tryRemoveFile($activityImage->image_path);
        $this->tryRemoveFile($activityImage->image_description_path);
    }

    /**
     * Handle the ActivityImage "restored" event.
     *
     * @param  \App\Models\ActivityImage  $activityImage
     * @return void
     */
    public function restored(ActivityImage $activityImage)
    {
        //
    }

    /**
     * Handle the ActivityImage "force deleted" event.
     *
     * @param  \App\Models\ActivityImage  $activityImage
     * @return void
     */
    public function forceDeleted(ActivityImage $activityImage)
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
