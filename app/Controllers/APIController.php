<?php

namespace App\Controllers;

use App\Models\RfidModel;
use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController
{

    private $apiKey;

    public function __construct()
    {
        // Load the API key from the .env file  
        $this->apiKey = getenv('api.API_KEY');
    }
    
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

    public function qrRFIDData()
    {
        // Retrieve the GET parameters
        $scanStatus = $this->request->getGet('scanType');
        $qrData = $this->request->getGet('qrData');
        $rfidData = $this->request->getGet('rfidData');
        $apiKey = $this->request->getGet('apiKey');

        if ($apiKey !== $this->apiKey) {
            return $this->response->setStatusCode(403)->setBody("API key invalid.");
        }

        // Set the timezone to Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');

        // Get the current date and time in DATETIME format
        $currentDateTime = date("Y-m-d H:i:s");

        // Load the database service
        $db = \Config\Database::connect();
        $builder = $db->table('tmpData');

        // Prepare update data
        $updateData = [];
        if (!empty($qrData)) {
            $updateData['tmpQR'] = $qrData;
        }
        if (!empty($rfidData)) {
            $updateData['tmpRFID'] = $rfidData;
        }
        if (empty($updateData)) {
            return $this->response->setStatusCode(400)->setBody("No valid data to update.");
        }

        $updateData['updated_at'] = $currentDateTime;

        // Update the table based on scanStatus
        if ($scanStatus === "jobScan" || $scanStatus === "weldMetalScan") {
            $builder->where('scanType', $scanStatus)
                ->update($updateData);

            if ($db->affectedRows() > 0) {
                return $this->response->setStatusCode(200)->setBody("Data updated successfully.");
            } else {
                return $this->response->setStatusCode(404)->setBody("No matching records found to update.");
            }
        }

        return $this->response->setStatusCode(400)->setBody("Invalid scan status.");
    }

    public function handleRFID()
    {
        $status = $this->request->getGet('Status');
        $machineID = $this->request->getGet('machineID');
        $area = $this->request->getGet('Area');
        $jobData = $this->request->getGet('jobData');
        $weldMetalData = $this->request->getGet('weldMetalData');
        $userRFIDData = $this->request->getGet('userRFIDData');
        $apiKey = $this->request->getGet('apiKey');

        if ($apiKey !== $this->apiKey) {
            return $this->response->setStatusCode(403)->setBody("API key invalid.");
        }

        if (!in_array($area, ["1", "2", "3", "4", "5"])) {
            return $this->response->setStatusCode(400)->setBody("Invalid area!");
        }

        $areaTable = 'area' . $area;
        $db = \Config\Database::connect();
        $builder = $db->table($areaTable);

        switch ($status) {
            case "jobScan":
                $updateData = ['jobRFID' => $jobData];
                break;
            case "weldMetalScan":
                $updateData = ['weldMetalRFID' => $weldMetalData];
                break;
            case "userScan":
                $updateData = ['userRFID' => $userRFIDData];
                break;
            default:
                return $this->response->setStatusCode(400)->setBody("Invalid status!");
        }

        $builder->where('MachineID', $machineID)->update($updateData);

        if ($db->affectedRows() > 0) {
            return $this->response->setStatusCode(200)->setBody("Update successful.");
        } else {
            return $this->response->setStatusCode(404)->setBody("No records updated. MachineID may not exist.");
        }
    }

    public function updateWeldID()
    {
        // Get the incoming request data
        $machineID = $this->request->getGet('MachineID');
        $apiKey = $this->request->getGet('apiKey');

        // Validate the API key
        if ($apiKey !== $this->apiKey) {
            return $this->response->setStatusCode(403)->setBody("API key invalid.");
        }

        // Load the database connection
        $db = \Config\Database::connect();

        // Fetch the row with the largest WeldID value for the specified MachineID
        $builder = $db->table('machine');
        $builder->selectMax('WeldID');
        $builder->where('MachineID', $machineID);
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            // Fetch the result as an array
            $row = $query->getRowArray();
            $maxWeldID = $row['WeldID'];
            $newWeldID = $maxWeldID + 1;

            // Output the new WeldID value
            echo $machineID . '.' . $newWeldID;

            // Update the WeldID in the machine table
            $updateBuilder = $db->table('machine');
            $updateData = [
                'WeldID' => $newWeldID
            ];

            $updateBuilder->where('MachineID', $machineID);
            if ($updateBuilder->update($updateData)) {
                // Successful update, you can handle any success response here
            } else {
                // Handle the error during the update
                echo "Error updating WeldID.";
            }
        } else {
            echo "No records found for MachineID " . $machineID;
        }

        // Close the database connection
        $db->close();
    }
}
