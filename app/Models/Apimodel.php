<?php
namespace App\Models;
use CodeIgniter\Model;

class Apimodel extends Model
{
    protected $table = "posts";
    protected $primaryKey = "id";
    protected $allowedFields = ['title','content','first_name'];
}