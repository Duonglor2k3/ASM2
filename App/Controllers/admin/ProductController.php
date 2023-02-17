<?php

namespace App\Controllers\admin;

use App\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Controllers\Controller;

class ProductController extends Controller
{
  public function index()
  {
    $products = ProductModel::all();
    return $this->view('backend/products/list', ['products' => $products]);
  }
  public function create()
  {
    $categories = CategoryModel::all();
    return $this->view('backend/products/add', ['categories' => $categories]);
  }
  public function store(Request $request)
  {
    $product = $request->getBody();
    $image = $_FILES['images']['name'];
    $product['images'] = $image;
    //Upload file
    move_uploaded_file($_FILES['images']['tmp_name'], 'images/' . $image);
    //insert
    $p = new ProductModel();
    $p->insert($product);
    header("location:/admin/product");
    exit;
  }
  public function edit(Request $request)
  {
    $p = $request->getBody();
    $product = ProductModel::findOne($p['id']);
    $categories = CategoryModel::all();
    return $this->view('backend/products/edit', ['product' => $product, 'categories' => $categories]);
  }
  public function update(Request $request)
  {
    $data = $request->getBody();
    if ($_FILES['images']['size'] > 0) {
      $data['images'] = $_FILES['images']['name'];
      move_uploaded_file($_FILES['images']['tmp_name'], 'images/' . $data['images']);
    }
    ProductModel::findOne($data['id'])->update($data);
    header("location: /admin/product");
    exit;
  }
  public function delete(Request $request)
  {
    $data = $request->getBody();
    $new = new ProductModel;
    $new->delete($data['id']);
    header("location: /admin/product");
    exit;
  }
}
