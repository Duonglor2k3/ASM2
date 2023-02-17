<?php 
namespace App\Models;

class ProductModel extends BaseModel {
  protected $tableName = 'products';
  public function show(){
    $products = ProductModel::all();
  }
  
}