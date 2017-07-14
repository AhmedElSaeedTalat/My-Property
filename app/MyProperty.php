<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\detailedPage;
class MyProperty extends Model
{
	use Searchable;
    public $fillable=["user_id"];
    public $timestamps=false;
   public $table = "Houses";
   public function searchableAs(){
   	return "id_index";
   }
   public function Desc(){
   	return $this->hasMany(detailedPage::class,"MyProperty_id");
   }
}
