<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     public function catalog () {
         return $this->belongsTo(Catalog::class);
     }

     public function author () {
         return $this->belongsTo(User::class, 'user_id');
     }


    //------------------------------------------

    ////// одобрен комментарий или нет
    public function allow () {
         $this->status = 1;
         $this->save();
    }

    public function veto () {
         $this->status = 0;
         $this->save();
    }

    public function toggleStatus () {
         if ($this->status == 0) {
             return $this->allow();
         }
            return $this->veto();
    }



    ////// удалить комментарий
    public function remove () {
         $this->delete();
    }





}
