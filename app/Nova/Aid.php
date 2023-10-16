<?php

namespace App\Nova;

use App\Nova\User;
use App\Nova\Convoy;
use App\Nova\Export;
use App\Nova\AidType;
use App\Nova\Warehouse;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Aid extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Aid::class;

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
            BelongsTo::make('نوع المساعدة', 'aidType', AidType::class)->sortable()->rules('required'),
            BelongsTo::make('المستودع', 'warehouse', Warehouse::class)->sortable()->rules('required'),
            BelongsTo::make('المسؤل', 'user', User::class)->sortable()->rules('required')->exceptOnForms()->default(auth()->user()->id),
            BelongsTo::make('القافلة', 'convoy', Convoy::class)->sortable()->rules('required'),
            Text::make('الكمية', 'quantity')->sortable()->rules('required', 'max:255'),
            HasMany::make('الصرفيات', 'exports', Export::class)->sortable()->rules('required'),
            
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
        return 'المساعدات';
    }

    // singular label
    public static function singularLabel()
    {
        return 'مساعدة';
    }
}
