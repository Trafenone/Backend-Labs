<?php

namespace Views;

/**
 * Items View
 */
class ItemView
{
    /**
     * @param string $data
     * @return string
     */
    public function render($data): string
    {
        return "<p>$data</p>";
    }
}