<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with('user')
        ->join('departments', 'departments.id', '=', 'reservations.department_id')
        ->orderBy('created_at', 'desc')->paginate(5);

        return view('index', ['reservations' => $reservations]);
    }
}
