<?php

namespace App\Models;

use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Reservation extends Model
{
    use HasFactory, Sortable;

    public $sortable = [
        'department_id',
        'user_id',
        'date_start',
        'date_end',
    ];

    protected $fillable = [
        'department_id',
	    'user_id',
        'date_start',
        'date_end',
        'rooms',
        'doors',
        'specials',
        'status',
    ];

    /* public function getDateStartAttribute($value)
    {
        return Carbon::parse($value)->format('d. m. Y');
    }

    public function getDateEndAttribute($value)
    {
        return Carbon::parse($value)->format('d. m. Y');
    } */

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

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
