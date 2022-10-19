@extends('layouts/main')

@section('title', 'Edit Reservation')

@section('content')

  <div class="d-flex justify-content-center align-items-center mx-auto">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header p-3">
          <h2 class="text-center">{{ __('Edit Reservation') }}</h2>
        </div>
        <div class="card-body p-4">
          @include('partials.alerts')
          <form action="{{ route('user.bikes.update', $bike->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
              <div class="col-3 mb-3">
                <label class="form-label" for="item_id">{{ __('Item') }}</label>
                <select class="form-control @error('item_id') is-invalid @enderror" id="item_id" name="item_id" readonly
                  type="text">
                  <option value="{{ $bike->item_id ?? ' ' }}">
                    {{ $bike->item->name ?? ' ' }} -
                    {{ $bike->item->description ?? 'Choose item ...' }}
                  </option>
                  {{-- @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->description }}</option>
                  @endforeach --}}
                </select>
                @error('item_id')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col-2 mb-3">
                <label class="form-label" for="date_start">{{ __('From') }}</label>
                <input class="form-control @error('date_start') is-invalid @enderror" id="date_start" name="date_start"
                  type="date" value="{{ $bike->date_start }}">
                @error('date_start')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col-2 mb-3">
                <label class="form-label" for="date_end">{{ __('To') }}</label>
                <input class="form-control @error('date_end') is-invalid @enderror" id="date_end" name="date_end"
                  type="date" value="{{ $bike->date_end }}">
                @error('date_end')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col-2 mb-3">
                <label class="form-label" for="phone">{{ __('Phone') }}</label>
                <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                  type="text" value="{{ $bike->phone }}">
                @error('phone')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col-1 mb-3">
                <label class="form-label" for="pernum">{{ __('Osobní číslo') }}</label>
                <input class="form-control @error('pernum') is-invalid @enderror" id="pernum" name="pernum"
                  type="text"
                  value="{{ old('pernum') }}@isset($bike){{ $bike->pernum }}@endisset">
                @error('pernum')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
              <div class="col-2 mb-3">
                <label class="form-label" for="date_born">{{ __('Datum narození') }}</label>
                <input class="form-control @error('date_born') is-invalid @enderror" id="date_born" name="date_born"
                  placeholder="Zadejte datum narození" type="date"
                  value="{{ old('date_born') }}@isset($bike){{ $bike->date_born }}@endisset">
                @error('date_born')
                  <span class="invalid-feedback" role="alert">
                    {{ $message }}
                  </span>
                @enderror
              </div>
            </div>
            <input class="form-control" name="user_id" type="hidden" value="{{ $bike->user_id }}">
            <button class="btn btn-primary" type="submit">{{ __('Edit') }}</button>
            <a class="btn btn-secondary" href="{{ url()->previous() }}">{{ __('Back') }}</a>
            <a class="btn btn-success" href="../../full-calendar"><i class="fa-solid fa-calendar-days"></i></a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
