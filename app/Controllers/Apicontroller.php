<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Apimodel;

class Apicontroller extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new Apimodel();
        $data['posts'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);

    }
    public function createpost()
    {
        $model = new Apimodel();
        $data = [
            'title'=>$this->request->getVar('title'),
            'content'=>$this->request->getVar('content'),
            'first_name'=>$this->request->getVar('name'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Employee created successfully'
            ]
            ];

        return $this->respondCreated($response);
    }

    public function getpost($id = null){
        $apiModel = new ApiModel();
        $data = $apiModel->where('id', $id)->first();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound('Customer does not exist.');
        }
    }
}