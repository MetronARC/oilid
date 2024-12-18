<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\tmpRFID;
use App\Models\TmpRFIDModel; // Import the TmpRFIDModel

class ItemDetailsRFID extends BaseController
{
    public function index($ID = null): string
{
    $model = new ItemModel();

    // Fetch item details from the database
    $item = $model->find($ID);

    // Check if item exists
    if (!$item) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Item with ID $ID not found");
    }

    // Pass the item details and a flag to the view
    $data = [
        'title' => 'Item Details',
        'sidebarData' => 'itemDetails',
        'item' => $item, // Pass the item details to the view
        'hasItemID' => !is_null($ID), // Flag to indicate if an itemID was passed
    ];

    return view('user/itemDetailsRFID', $data);
}


    public function checkTmpRFID()
    {
        $model = new ItemModel();
        $tmpRFIDModel = new tmpRFID(); // Use the TmpRFIDModel

        // Fetch the latest tmpUID from the tmpRFID table
        $tmpUID = $tmpRFIDModel->orderBy('created_at', 'DESC')->first(); // Adjust the order by column as needed

        if ($tmpUID) {
            // Check if the tmpUID exists in the itemlist table
            $item = $model->where('itemUID', $tmpUID['tmpUID'])->first();

            if ($item) {
                return $this->response->setJSON($item);
            } else {
                // Debugging: Log or return a message if no item is found
                log_message('debug', 'No item found for tmpUID: ' . $tmpUID['tmpUID']);
                return $this->response->setJSON(['error' => 'No item found']);
            }
        }

        return $this->response->setJSON(['error' => 'No tmpUID found']); // No match found
    }
}
