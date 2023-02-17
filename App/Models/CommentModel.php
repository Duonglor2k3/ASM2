<?php 
namespace App\Models;

class CommentModel extends BaseModel {
  protected $tableName = 'Comments';
  public function show(){
    $Comments = CommentModel::getTable('full_name,description,comments.id,created_at,image');
  }
  
}