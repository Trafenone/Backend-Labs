<?php

namespace Models;
/**
 * Item Model
 */
class ItemModel
{
    /**
     * Get Item by id
     * @param $id
     * @return string
     */
    public function getItemById($id): string
    {
        return "Item with ID $id";
    }
}