@extends('layouts.app')
@section('content')
 <!-- breadcrumb section start -->
 <section class="breadcrumb-banner bg-cover bg-overlay parallax-2" style="margin-top:50px;background-image: url('{{asset(config('files.uri.background'))}}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="breadcrumb-inner text-center">
                <h2>@lang('address.register_title')</h2>
                <!-- register section start -->
                <div class="registar-area section-padding">
                    <div class="container">
                        <div class="row ">
                            <div class="col-xl-8 col-sm-12 col-md-8 offset-lg-2 offset-md-2">
                                <div class="registar-form ">
                                @if(session()->has("success"))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                    <i class="material-icons">close</i>
                            </button>
                            <span> {{ session("success") }}</span>
                        </div>
                    @endif
                                    @include('common.errors')
                                    <form action="/manager/address/register" class="row" method='post' enctype="multipart/form-data" onSubmit="return checkFormRegisterAddress();">
                                        @csrf
                                        
                                        <div class="card-body">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Tên địa chỉ
                                                    </span>
                                                </div>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="*Nhập địa chỉ của bạn" required>
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text">
                                                        Loại địa chỉ
                                                    </span>
                                                </div>
                                                <select name="addresstype_id" class="form-control">
                                                @foreach($addresstypes as $addresstype)
                                                <option value="{{$addresstype->id}}">
                                                    {{$addresstype->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text">
                                                        Ảnh
                                                    </span>
                                                </div>
                                                <input style="opacity: 1; position: initial;line-height:29px;" type="file" name="photos[]" class="form-control"  multiple="multiple" accept="image/*">
                                            </div>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text">
                                                        Địa chỉ chi tiết
                                                    </span>
                                                </div>
                                                <input type="text" name="detail" class="form-control"
                                                    placeholder="Địa chỉ chi tiết" required> 
                                                <button class="btn col-3 btn-success ml-1" type="button" data-toggle="modal" data-target="#location" data-backdrop="static" data-keyboard="false" style="margin-left:0!important;border-radius:0 5px 5px 0;">Chọn trên bản đồ</button>
                                            </div>
                                            <input type="hidden" name="location" class="form-control rounded-right" placeholder="Chọn vị trí trên bản đồ" readonly id="returnLocation">
                                        </div>
                                        <button type="submit" class="btn-submit rounded">@lang('address.register')</button> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- register section end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb section end -->
<!-- location -->
<div class="modal fade" id="location" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ghim một vị trí trên bản đồ</h4>
            </div>
            <div class="modal-body" style="height:55vh;">
                <div id="map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary mr-auto" onclick="getLocation().then(data=>{$('#returnLocation').val(data[0]+','+data[1])});$('#location').modal('hide');">Vị trí hiện tại</button>
                <button type="button" class="btn btn-primary" data-location="" id="selectLocation" onclick="$('#returnLocation')">Chọn</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('error.close')</button>
            </div>
        </div>
    </div>
</div>
<script>
    register = true;
</script>
<style>
    body {
        height: auto;
    }
</style>
@endsection
