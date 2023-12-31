<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Export extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Export::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make('المساعدة', 'aid', Aid::class)->sortable()->rules('required'),
            BelongsTo::make('المسؤل', 'user', User::class)->sortable()->rules('required')->exceptOnForms()->default(auth()->user()->id),
            Number::make('الكمية', 'quantity')->sortable()->rules('required')->min(1),
            BelongsTo::make('الوحدة', 'unit', Unit::class)->sortable()->rules('required'),
            Date::make('تاريخ الصرف', 'export_date')->sortable()->rules('required'),
            Text::make('الوجهة', 'destination')->sortable()->rules('required', 'max:255')->default(function ($request) {
                return 'غزة';
            })->readonly(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    // label
    public static function label()
    {
        return 'صرف مساعدات';
    }

    // singular label
    public static function singularLabel()
    {
        return 'صرف مساعدة';
    }

    // group
    public static function group()
    {
        return __('قوافل الخير');
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        if (auth()->user()->hasRole('admin')) {
            return $query;
        } else {
            return $query->where('user_id', auth()->user()->id);
        }
    }

    public static function availableForNavigation(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            return true;
        }
    }
}
