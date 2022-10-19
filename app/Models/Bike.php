<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Bike extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'item_id',
        'user_id',
        'date_start',
        'date_end',
    ];

	protected $fillable = [
		'item_id',
		'user_id',
		'phone',
        'pernum',
        'date_born',
        'serviceday',
        'date_start',
        'date_end',
        'status',

    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d. m. Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d. m. Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

	public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
