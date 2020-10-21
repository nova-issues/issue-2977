<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;

class TextField extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        //
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make('Snippet (2nd parameter)', function () {
                return collect([1, 2, 3])->toJson();
            }),

            Text::make('Snippet (resolveUsing)')->resolveUsing(function () {
                return collect([1, 2, 3])->toJson();
            }),

            Text::make('Snippet (displayUsing)')->displayUsing(function () {
                return collect([1, 2, 3])->toJson();
            }),

            Text::make('Snippet (default)')->default(function () {
                return collect([1, 2, 3])->toJson();
            }),
        ];
    }
}
