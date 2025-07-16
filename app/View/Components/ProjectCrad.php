<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectCrad extends Component
{
    public $id;
    public $title;
    public $cover;
    /**
     * Create a new component instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $title = null,
        ?string $cover = null
    )
    {
        //
        $this->id = $id;
        $this->title = $title ?? "false Titte Project";
        $this->cover = $cover ?? "storage\images\coverService.jpg";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-crad');
    }
}
