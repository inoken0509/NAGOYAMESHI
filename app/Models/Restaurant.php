<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Restaurant extends Model {
    use HasFactory;
    use Sortable;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public $sortable = ['lowest_price', 'highest_price'];
}
