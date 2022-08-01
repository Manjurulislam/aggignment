@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Employee</h6>
                    </div>
                </div>
                <div class="card-header p-3 border-1">
                    <form action="{{route('backend.dashboard')}}">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group input-group-outline my-3">
                                    <select class="form-control" name="year" id="exampleFormControlSelect1">
                                        <option value="">Year</option>
                                        @for ($year = date('Y'); $year > date('Y') - 100; $year--)
                                            <option
                                                value="{{ $year }}" {{ (request()->get('year') == $year ? "selected":"") }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group-outline my-3">
                                    <select class="form-control" name="month" id="exampleFormControlSelect1">
                                        <option value="">Month</option>
                                        @foreach(range(1,12) as $month)
                                            <option
                                                value="{{$month}}" {{ (request()->get('month') == $month ? "selected":"") }}>
                                                {{date("M", strtotime('2016-'.$month))}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group input-group-outline my-3">
                                    <button class="btn btn-icon btn-2 btn-primary" type="submit">
                                        <span class="btn-inner--icon"><i class="material-icons">search</i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Sl
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Name
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Email
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Phone
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Birthday
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Country
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IP
                                    Address
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(!blank($items))
                                @foreach($items as $key => $item)
                                    <tr>
                                        <td>
                                            <span class="text-xs font-weight-bold mb-0">{{$key+1}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$item->name}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$item->email}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$item->phone}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$item->dob}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$item->country}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$item->ip}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center mb-3">
                        {{$items->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
