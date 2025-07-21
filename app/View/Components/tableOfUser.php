<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class TableOfUser extends Component
{
    /**
     * @var array
     */
    public array $header;

    /**
     * @var array
     */
    public array $rows;

    /**
     * Create a new component instance.
     *
     * @param array $header The table header columns
     * @param array $rows The table data rows
     * @throws InvalidArgumentException
     */
    public function __construct(array $header, array $rows)
    {
        if (empty($header)) {
            throw new InvalidArgumentException('Header array cannot be empty');
        }

        $this->header = $header;
        $this->rows = $this->formatRows($rows);
    }

    /**
     * Format the rows data to ensure consistent array structure
     *
     * @param array $rows
     * @return array
     */
    private function formatRows(array $rows): array
    {
        return array_map(function ($row) {
            $formattedRow = (array) $row;
            
            // Ensure all cells are strings or numbers
            return array_map(function ($cell) {
                if (is_array($cell) || is_object($cell)) {
                    return json_encode($cell);
                }
                return $cell ?? '';
            }, $formattedRow);
        }, $rows);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.table-of-user');
    }
}
