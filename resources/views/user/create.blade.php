@extends('layouts.admin_layout')

@section('name_page')
<a id="namepage" href="{{route('users.index')}}" class="active">Users</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Thêm user</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="#" method="POST" id="createForm" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                                    Đã có lỗi xảy ra !!!
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-md-3">Email
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="email" data-required="1" class="form-control" value="{{old('email')}}" required/>
                                <span class="required"> {{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tên người dùng
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" data-required="1" class="form-control" value="{{old('name')}}" required/>
                                <span class="required"> {{$errors->first('name')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Roles
                                <span class="required"> * </span>
                            </label>
                            <div class="input-group col-md-8" style="border: 1px solid #c2cad8;padding: 6px 12px;margin-left:15px;">
                            <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible="1" data-rail-color="white" data-handle-color="gray">
                                <div class="icheck-list">
                                    @foreach($roles as $item)
                                        <label class="col-md-6">
                                            <input type="checkbox" class="icheck" name="roles[]" value="{{$item->id}}"> {{$item->name}} ({{$item->source}})
                                        </label>
                                    @endforeach
                                </div>
                            </div></div>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputFile" class="col-md-3 control-label">Avatar
                                </label>
                                <div class="col-md-9">
                                    <input type="file" name="hinh_anh" class="form-control" value="{{old('hinh_anh')}}" multiple>
                                    <span class="required"> {{$errors->first('hinh_anh')}}</span>
                                </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Thêm</button>
                                <a class="btn default" href="{{route('users.index')}}">Hủy</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            console.log(window.location.pathname);
            var pathname = window.location.pathname;
            $('#namepage').attr('href', pathname.substr(0,pathname.length-7));
            var create_path = pathname.substr(0,pathname.length-7);
            $('#createForm').attr('action',create_path);
        });
    </script>

    <script type="text/javascript">
      $("#active-user").addClass("active");
    </script>
@endsection