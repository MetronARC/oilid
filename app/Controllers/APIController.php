<?php

namespace App\Controllers;

use App\Models\RfidModel;
use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController
{
    public function insert()
    {
        log_message('info', 'Insert method called'); // Log when the method is called

        // Get the UID from the request
        $state = $this->request->getGet('UID');

        // Validate the input
        if (empty($state)) {
            return $this->fail('UID is required', 400);
        }

        // Load the model
        $model = new RfidModel();

        // Prepare the data to be inserted or updated
        $data = [
            'tmpUID' => $state,
            'created_at' => date('Y-m-d H:i:s') // Set the current timestamp
        ];

        // Check if any record already exists
        $existingRecord = $model->first(); // Get the first record

        if ($existingRecord) {
            // Update the existing record
            $model->update($existingRecord['ID'], $data); // Assuming 'id' is the primary key
            return $this->respond(['message' => 'Data updated successfully.']);
        } else {
            // Insert the new record
            if ($model->insert($data)) {
                return $this->respondCreated(['message' => 'Data inserted successfully.']);
            } else {
                return $this->fail('Error inserting data', 500);
            }
        }
    }
}
