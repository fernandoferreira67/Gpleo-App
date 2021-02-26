<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
   protected $fillable = [
       'customer_id', 'created_user_id', 'finished_user_id', 'status', 'description', 'solution', 'price'
   ];

   public function customer()
   {
       return $this->belongsTo(Customer::class);
   }

   public function createdUser()
   {
       return $this->belongsTo(User::class, 'created_user_id', 'id');
   }

   public function finishedUser()
   {
       return $this->belongsTo(User::class, 'finished_user_id', 'id');
   }
}
