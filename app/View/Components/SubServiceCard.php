<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubServiceCard extends Component
{
    public $id;
    public $title;
    public $releaseDate;
    public $category;
    public $cover;
    public $khmer;
    public $english;
    /**
     * Create a new component instance.
     */
    public function __construct(
        ?int $id,
        ?string $title,
        ?string $releaseDate,
        ?string $category,
        ?string $cover,
        ?string $khmer,
        ?string $english
    )
    {
        //
        $this->id = $id;
        $this->title = $title ?? 'Empty';
        $this->releaseDate = $releaseDate;
        $this->category = $category;
        $this->cover = $cover;
        $this->khmer = $khmer;
        $this->english = $english;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sub-service-card');
    }
}
