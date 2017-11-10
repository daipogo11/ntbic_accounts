@extends('layouts.admin_layout')

@section('name_page')
<a id="namepage" href="{{route('permission.index')}}" class="active">Permissions</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Edit permission</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="{{url('admin/permission/'.$permission->id)}}" method="POST" id="editForm" class="form-horizontal">
                    {{ method_field('PUT') }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                            <button class="close" data-close="alert"></button>
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                <button class="close" data-close="alert"></button>{{session('message')}}</div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-md-3">Source
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select id="source" class="form-control select2me" name="source">
                                    @if($permission->source == 'ntbic_database')
                                        <option id="ntbic_database" value="ntbic_database" selected>Ntbic Database</option>
                                        <option id="ntbic_home" value="ntbic_home">Ntbic Home</option>
                                        @else($permission->source == 'ntbic_home')
                                        <option id="ntbic_database" value="ntbic_database">Ntbic Database</option>
                                        <option id="ntbic_home" value="ntbic_home" selected>Ntbic Home</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Permission
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" data-required="1" class="form-control" value="{{$permission->name}}" required/> </div>
                        </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Sửa</button>
                                <a class="btn default cancel" href="{{route('permission.index')}}">Hủy</a>
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
      $("#active-permission").addClass("active");
    </script>
@endsection