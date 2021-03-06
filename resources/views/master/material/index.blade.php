@extends('adminlte::page')

@section('title', ((isset($title))?$title:""))

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{((isset($title))?$title:"")}}</div>
                </div>
                <div class="card-body">
                    <a href="{{route("master.material.add")}}" class="btn btn-success ml-2 mb-4">
                        <li class="fa fa-plus"></li> Tambah Data
                    </a>
                    <div class="table-responsive">
                        <table  class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bahan Baku</th>
                                <th>Gambar</th>
                                <th>Stok</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Dibuat</th>
                                <th>Diubah</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $num => $row)
                                <tr>
                                    <td>{{($num+1)}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>
                                        <img src="{{$row->img}}" class="img-fluid img-thumbnail" alt="">
                                    </td>
                                    <td>{{number_format($row->stok)}} {{$row->size->name}}</td>
                                    <td>{{$row->deskripsi}}</td>
                                    <td>{{number_format($row->price)}}</td>
                                    <td>{{($row->created_at !== null) ? $row->created_at->format("d-m-Y"):"-"}}</td>
                                    <td>{{($row->updated_at !== null) ? $row->updated_at->format("d-m-Y"):"-"}}</td>
                                    <td>
                                        <a href="{{route("master.material.update",$row->id)}}" class="btn btn-warning m-2">
                                            <li class="fa fa-edit"></li>
                                        </a>

                                        <a href="{{route("master.material.delete",$row->id)}}" class="btn btn-danger m-2">
                                            <li class="fa fa-trash"></li>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section("js")
    @include("msg")
    <script>
        $(document).ready(function () {
            $("table").DataTable();
        });
    </script>
@stop
