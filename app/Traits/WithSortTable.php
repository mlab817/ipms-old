<?php

namespace App\Traits;

trait WithSortTable
{
    public $sortField = 'id'; // default sorting field
    public $sortAsc = true; // default sort direction

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc; // if field is already sorted, use the opposite instead
        } else {
            $this->sortAsc = true; // sort selected field by ascending by default
        }

        $this->sortField = $field;
    }
}
