<?php

namespace App\Nova;

use App\Nova\Aid;
use App\Nova\User;
use App\Nova\Country;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Convoy extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Convoy::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    // public static $title = 'id';

    // // title    
    public  function title()
    {
        return $this->name . ' - ' . $this->country->name . ' - ' . $this->arrival_date;
    }

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
            BelongsTo::make('الدولة', 'country', Country::class)->sortable()->rules('required'),
            Text::make('الاسم', 'name')->sortable()->rules('required', 'max:255'),
            Date::make('تاريخ الوصول', 'arrival_date')->sortable()->rules('required'),
            BelongsTo::make('المسؤل', 'user', User::class)->sortable()->rules('required')->exceptOnForms()->default(auth()->user()->id),
            HasMany::make('المساعدات', 'aids', Aid::class)->sortable()->rules('required'),

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
        return 'القوافل';
    }

    // singular label
    public static function singularLabel()
    {
        return 'قافلة';
    }
}
