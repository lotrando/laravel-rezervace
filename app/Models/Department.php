<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $department_name
 * @property-read \Illuminate\Database\Eloquent\Collection|Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @method static \Database\Factories\DepartmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereDepartmentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereId($value)
 * @mixin \Eloquent
 * @property int $department_code
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereDepartmentCode($value)
 */
class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'department_code',
        'department_name',
    ];

    public $timestamps = false;
}
