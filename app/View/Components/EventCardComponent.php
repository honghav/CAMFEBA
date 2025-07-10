<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

class EventCardComponent extends Component
{

    public $title;
    public $description;
    public $cover;
    public $start_date;
    public $start_time;
    public $end_time;
    public $end_register;
    public $price;
    public $location;
    /**
     * Create a new component instance.
     */
    public function __construct(
    ?string $title = null,
    ?string $description = null,
    ?string $cover = null,  // Assuming this is a file path/URL
    ?string $start_date = null,  // Could use Carbon if you prefer
    ?string $start_time = null,
    ?string $end_time = null,
    ?string $end_register = null,
    ?float $price = null,
    ?string $location = null
    ) {
        $this->title = $title ?? 'Default Title';
        $this->description = $description ?? 'Default description text';
        $this->cover = $cover ?? '/images/default-cover.jpg';
        $this->start_date = $start_date;
        $this->start_time = $start_time ? Carbon::parse($start_date) : null;
        $this->end_time = $end_time;
        $this->end_register = $end_register;
        $this->price = $price ?? 0.00;
        $this->location = $location ?? 'Virtual';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-card-component');
    }
}
