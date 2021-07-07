@extends('layouts.app')
@section('title', 'ໜ້າຫຼັກ')

@section('banner')
    <br><br><br>
    <br>
    <br><br><br>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="row justify-content-center">
                        @for ($i=0; $i<30; $i++)
                            <div class="col-sm-6 col-md-3 p-1">
                                <a href="#">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="w-100 bg-dark" style="height: 70px;"></div>
                                            ຫົວຂໍ້
                                            <br>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi enim quo aperiam neque mollitia veniam nesciunt nam, cum repellat itaque!
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endfor
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
