<?php

namespace App\Controllers\admin;

use App\Request;
use App\Models\CategoryModel;
use App\Controllers\Controller;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = CategoryModel::all();
    return $this->view('backend/categories/list', ['categories' => $categories]);
  }
  public function create()
  {
    return $this->view('backend/categories/add');
  }
  public function store(Request $request)
  {
    $category = $request->getBody();
    $p = new CategoryModel();
    $p->insert($category);
    header("location:/admin/category");
    exit;
  }
  public function edit(Request $request)
  {
    $p = $request->getBody();
    $category = CategoryModel::findOne($p['id']);
    return $this->view('backend/categories/edit', ['category' => $category]);
  }
  public function update(Request $request)
  {
    $data = $request->getBody();

    CategoryModel::findOne($data['id'])->update($data);
    header("location: /admin/category");
    exit;
  }
  public function delete(Request $request)
  {
    $data = $request->getBody();
    $new = new CategoryModel;
    $new->delete($data['id']);
    header("location: /admin/category");
    exit;
  }
}
