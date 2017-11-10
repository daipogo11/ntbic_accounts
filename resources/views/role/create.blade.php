@extends('layouts.admin_layout')

@section('name_page')
<a id="namepage" href="{{route('role.index')}}" class="active">Roles</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Create Role</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="admin/role" method="POST" id="createForm" class="form-horizontal">
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
                        <div class="form-group">
                            <label class="control-label col-md-3">Name
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="name" data-required="1" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Source
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select id="source" class="form-control select2me" name="source">
                                    <option id="ntbic_database" value="ntbic_database">Ntbic Database</option>
                                    <option id="ntbic_home" value="ntbic_home">Ntbic Home</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Permissions
                                <span class="required"> * </span>
                            </label>
                            <div class="input-group col-md-8" style="border: 1px solid #c2cad8;padding: 6px 12px;margin-left:15px;">
                            <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible="1" data-rail-color="white" data-handle-color="gray">
                                <div class="icheck-list">
                                    @foreach($permissions as $item)
                                        <label class="col-md-6">
                                            <input type="checkbox" class="icheck" name="permissions[]" value="{{$item->name}}"> {{$item->name}} ({{$item->source}})
                                        </label>
                                    @endforeach
                                </div>
                            </div></div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <a class="btn default" href="{{route('role.index')}}" onclick="history.go(-1)">Cancel</a>
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
      $("#active-role").addClass("active");
    </script>
@endsection

