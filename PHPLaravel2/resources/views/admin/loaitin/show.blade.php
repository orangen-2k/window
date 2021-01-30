@extends('admin.admin')
@section('title', "Danh sách loại tin")
<link href="{!!  asset('css/css_loading.css') !!}" rel="stylesheet" type="text/css" />
@section('content')
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_tabs_3_1" role="tabpanel">
                        <div class="m-portlet__body table-responsive">
                            <table id="myTable"  class="table table-striped- table-bordered table-hover table-checkable dataTable dtr-inline">
                                @if(session('Notification'))
                                    <div class="alert alert-success">
                                        {{session('Notification')}}
                                    </div>
                                @endif
                                <a href="{{route('add.type_of_news')}}" class="btn btn-success btn-sm m-btn m-btn m-btn--icon m-btn--pill">
                                    <span>
                                        <i class="fas fa-plus"></i>
                                        <span>Tạo mới loại tin</span>
                                    </span>
                                </a><br/><br/>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Thể loại</th>
                                    <th>Tên</th>
                                    <th>Tên không dấu</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody align="center">
                                @foreach ($Type_of_news as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->theloai->ten}}</td>
                                        <td>{{$item->ten}}</td>
                                        <td>{{$item->tenkhongdau}}</td>
                                        <td>
                                            {{--                                            <a target="_blank" href="sua/{{$item->id}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air">--}}
                                            <a href="{{route('update.type_of_news',['id'=>$item])}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip"  data-original-title="Sửa">
                                                <i class="fa fa-pen-alt"></i>
                                            </a>
                                            <a href="{{route('delete.type_of_news',['id'=>$item])}}" class="btn btn-outline-dark m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip"  data-original-title="Xóa ">
                                                <i class="far fa-trash-alt"></i>
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
    </div>
@endsection
