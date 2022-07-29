<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CrudModel;

class UserCrud extends BaseController
{
    public function index()
    {
        $userModel = new CrudModel();
        $data['user_table'] = $userModel->orderBy('id','DESC')->findAll();
        return view('user_view', $data);
    }
    
    public function create()
    {
        return view('user_add');
    }

    public function store() 
    {
        $userModel = new CrudModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' =>$this->request->getVar('email')
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }

    public function single_data($id = null)
    {
        $userModel = new CrudModel();
        $data['user_obj'] =$userModel->where('id', $id)->first();
        return view('edit_user', $data);
    }

    public function update()
    {
        $userModel = new CrudModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email')
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }

    public function delete($id =null)
    {
        $userModel = new CrudModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }
}
