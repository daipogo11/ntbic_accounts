@extends('layouts.admin_layout')

@section('name_page')
<a id="namepage" href="#" class="active">User</a>
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Bảng user</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a id="create" class="btn sbold green btn-outline" href="#"><span class="fa fa-pencil"></span> Thêm user</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session('message'))
                    <div class="alert alert-success">
                    <button class="close" data-close="alert"></button>{{session('message')}}</div>
                @endif
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th> STT </th>
                            <th> Tên </th>
                            <th> Email </th>
                            <th> Avatar </th>
                            <th> Sửa </th>
                            <th> Xóa </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $item)
                            <tr class="odd gradeX">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td><img src="assets/upload/users/{{$item->hinh_anh}}" height="100"></td>
                                <td class="center"><div ><a class='edit' href="#" data-id="{{$item->id}}"><span class="fa fa-pencil-square"></span></a></div></td>
                                <td class="center"><a class="delete-modal" data-toggle="modal" href="#small" data-id="{{$item->id}}"><span class="fa fa-trash-o"></span></a></div></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $users->links() !!}
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<div class="modal fade bs-modal-sm" id="small" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Xóa user</h4>
            </div>
            <div class="modal-body"> 
                <form>
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    Bạn chắc chắn muốn xóa user? 
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" id="delete" class="btn red">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('js')
    <script type="text/javascript">
        $('.delete-modal').click(function() {
            var id = $(this).data("id");
            var pathname = window.location.pathname+'/';
            var url_delete = pathname+id;
            $('#delete').click(function() {
                $.ajax({
                    type: 'delete',
                    dataType: 'json',
                    url: url_delete,
                    data:{
                        '_token': $('input[name=_token]').val(),
                        'id': id
                    },
                    success: function() {
                        location.reload();
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            console.log(window.location.pathname);
            var pathname = window.location.pathname;
            $('#namepage').attr('href',pathname);
            var create_path = pathname+'/create';
            $('#create').attr('href',create_path);
        });

         $(document).ready(function() {
            $('.edit').click(function() {
                var pathname = window.location.pathname + '/';
                var id = $(this).data("id");
                $(this).attr('href',pathname+id+'/edit');
            });
         });
    </script>

    <script type="text/javascript">
      $("#active-user").addClass("active");
    </script>
@endsection