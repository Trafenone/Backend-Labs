<?php

namespace Controllers;

use Models\ItemModel;
use Views\ItemView;

//require_once 'Models/ItemModel.php';
//require_once 'Views/ItemView.php';

/**
 * Items Controller
*/

class ItemController
{
    /**
     * @param int $itemId
     * @return string
     */
    public function getItem($itemId) : string
    {
        $itemModal = new ItemModel();
        $item = $itemModal->getItemById($itemId);
        $itemView = new ItemView();
        return $itemView->render($item);
    }
}