<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurnal extends Model
{
    use HasFactory;

    protected $table = 'jurnal';
    protected $fillable = [
        'employee_id',
        'coordinator_id',
        'categories_id',
        'timing',
        'description',
        'target',
        'status',
        'comment'
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function coordinator()
    {
        return $this->belongsTo(User::class, 'coordinator_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
