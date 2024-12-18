<?php

namespace App\Controllers;

use App\Models\ItemModel;

class User extends BaseController
{
    public function index(): string
    {
        $model = new ItemModel();

        // Truncate the tmpRFID table
        $model->truncateTable('tmpRFID');

        $data['title'] = 'Dashboard';
        $data['sidebarData'] = 'dashboard';
        $data['items'] = []; // Initialize items as an empty array

        return view('user/index', $data);
    }


    public function search()
    {
        $model = new ItemModel();

        // Get search criteria from the form
        $uid = $this->request->getPost('uid');
        $itemName = $this->request->getPost('item-name');
        $equipType = $this->request->getPost('equip-type');
        $certNo = $this->request->getPost('cert-no');
        $location = $this->request->getPost('location');
        $status = $this->request->getPost('status');

        // Build the query
        $builder = $model->builder();
        if ($uid) {
            $builder->like('itemUID', $uid);
        }
        if ($itemName) {
            $builder->like('itemName', $itemName);
        }
        if ($equipType) {
            $builder->like('itemEquipType', $equipType);
        }
        if ($certNo) {
            $builder->like('itemCertNo', $certNo);
        }
        if ($location) {
            $builder->like('itemLocation', $location);
        }
        if ($status) {
            $builder->like('itemStatus', $status);
        }

        // Execute the query and get results
        $items = $builder->get()->getResultArray();

        // Return results as JSON
        return $this->response->setJSON($items);
    }
}
