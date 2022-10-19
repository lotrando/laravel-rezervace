<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Mail\CleanerMail;
use App\Mail\PaintDelete;
use App\Mail\PaintingMail;
use App\Mail\PaintUpdateMail;
use App\Models\Department;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (!Auth::user()) {
			return redirect(route('login'));
		}

		$reservations = Reservation::sortable()
			->with('user', 'department')
			->orderBy('created_at', 'asc')
			->paginate(10);

		if (Gate::denies('logged-in')) {
			return view('home');
		} else {
			return view('user.reservations.index', ['reservations' => $reservations]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		if (Gate::allows('logged-in')) {
			return view('user.reservations.create', ['departments' => Department::all()]);
		} else {
			$request->session()->flash('error', 'Musíte být přihlášen !');
			return redirect(route('home'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreReservationRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreReservationRequest $request)
	{
		if (Gate::allows('logged-in')) {
			$validatedData = $request->validated();
			Reservation::create($validatedData);

			$reservation = Reservation::with('department', 'user')->latest()->first();

			$data = [
				'id'            => $reservation->id,
				'user'          => $reservation->user->user_name,
				'email'         => $reservation->user->email,
				'department'    => $reservation->department->department_name,
				'rooms'         => $reservation->rooms,
				'status'        => $reservation->status,
				'start'         => $reservation->date_start,
				'end'           => $reservation->date_end,
			];

			foreach (['belica@khn.cz', 'vedouci.uklidu@khn.cz'] as $recipients) {
				Mail::to($recipients)->send(new PaintingMail($data));
			}

			$request->session()->flash('success', 'Rezervace malování úspěšně vytvořena !');
			return redirect(route('user.reservations.index'));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Reservation  $reservation
	 * @return \Illuminate\Http\Response
	 */
	public function show(Reservation $reservation, Request $request)
	{
		if (!$reservation) {
			$request->session()->flash('error', 'Tato rezervace malování neexistuje !');
			return redirect(route('user.reservations.index'));
		}
		return view('user.reservations.show', ['reservation' => $reservation]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Reservation  $reservation
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Reservation $reservation, Request $request)
	{
		if (!$reservation) {
			$request->session()->flash('error', 'Tato rezervace neexistuje nebo ji už nemůžete editovat !');
			return redirect(route('user.reservations.index'));
		}

		if (Gate::allows('is-admin')) {
			$reservation = Reservation::find($reservation->id);
		}

		return view('user.reservations.edit', [
			'departments' => Department::all(),
			'reservation' => $reservation
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateReservationRequest  $request
	 * @param  \App\Models\Reservation  $reservation
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateReservationRequest $request, Reservation $reservation)
	{

		$oldreservation = Reservation::find($reservation->id);
		$validatedData = $request->validated();
		$reservation = Reservation::with('department', 'user')->find($reservation->id);
		$reservation->update($validatedData);

		$data = [
			'id'            => $reservation->id,
			'user'          => $reservation->user->user_name,
			'email'         => $reservation->user->email,
			'olddepartment' => $oldreservation->department->department_name,
			'oldrooms'      => $oldreservation->rooms,
			'oldstart'      => $oldreservation->date_start,
			'oldend'        => $oldreservation->date_end,
			'department'    => $reservation->department->department_name,
			'rooms'         => $reservation->rooms,
			'start'         => $reservation->date_start,
			'end'           => $reservation->date_end,
			'status'        => $reservation->status,
		];

		if ($reservation->status == 'Schváleno') {
			Mail::to('vedouci.uklidu@khn.cz')->send(new CleanerMail($data));
		}

		foreach (['belica@khn.cz', 'vedouci.uklidu@khn.cz'] as $recipients) {
			Mail::to($recipients)->send(new PaintUpdateMail($data));
		}

		$request->session()->flash('success', 'Rezervace ' . $reservation->id . ' úspěšně aktualizována!');
		return redirect(route('user.reservations.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Reservation  $reservation
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Reservation $reservation, Request $request)
	{
		$reservation = Reservation::with('department', 'user')->find($reservation->id);

		$data = [
			'id'            => $reservation->id,
			'user'          => $reservation->user->user_name,
			'email'         => $reservation->user->email,
			'department'    => $reservation->department->department_name,
			'rooms'         => $reservation->rooms,
			'status'        => $reservation->status,
			'start'         => $reservation->date_start,
			'end'           => $reservation->date_end,
		];

		foreach (['belica@khn.cz', 'vedouci.uklidu@khn.cz'] as $recipients) {
			Mail::to($recipients)->send(new PaintDelete($data));
		}

		$reservation->delete();

		$request->session()->flash('success', 'Rezervace úspěšně odstraněna!');
		return redirect()->back();
	}
}
