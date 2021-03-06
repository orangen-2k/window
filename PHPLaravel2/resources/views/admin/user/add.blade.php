@extends('admin.admin')
@section('title', "Thêm tài khoản")
@section('content')
    <div class="m-content">
        <div id="preload" class="preload-container text-center" style="display: none">
            <img id="gif-load" src="https://icon-library.com/images/loading-gif-icon/loading-gif-icon-17.jpg" alt="">
        </div>
        <form method="post" id="validate-form-add" action="" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    <div class="m-portlet m-portlet--full-height">
                        <div class="m-wizard m-wizard--2 m-wizard--success m-wizard--step-first" id="m_wizard">
                            <div class="m-wizard__form">
                                <div class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                                    <div class="m-portlet__body">
                                        <div class=" m-wizard__form-step--current" id="m_wizard_form_step_1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="m-form__heading">
                                                        <h3 class="m-form__heading-title" style="font-weight: bold">
                                                            Tài khoản
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="m-form__section m-form__section--first">
                                                        @if(count($errors) > 0)
                                                            <div class="alert alert-danger">
                                                                @foreach($errors->all() as $err)
                                                                    {{$err}}<br/>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                        @if(session('Notification'))
                                                            <div class="alert alert-success">
                                                                {{session('Notification')}}
                                                            </div>
                                                        @endif
                                                        <form action="{{route('add.user')}}" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                            <div class="form-group m-form__group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                        class="text-danger">*</span> Tên: </label>
                                                                <div class="col-xl-9 col-lg-9">
                                                                    <input type="text" name="NameND" class="form-control m-input name-field"
                                                                           placeholder="Điền tên người dùng" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-form__group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                        class="text-danger">*</span> Email: </label>
                                                                <div class="col-xl-9 col-lg-9">
                                                                    <input type="email" name="Email" class="form-control m-input name-field"
                                                                           placeholder="Điền Email" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-form__group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                        class="text-danger">*</span> Mật khẩu: </label>
                                                                <div class="col-xl-9 col-lg-9">
                                                                    <input type="password" name="Password" class="form-control m-input name-field"
                                                                           placeholder="Điền mật khẩu" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-form__group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                        class="text-danger">*</span>Nhập lại mật khẩu: </label>
                                                                <div class="col-xl-9 col-lg-9">
                                                                    <input type="password" name="Password-again" class="form-control m-input name-field"
                                                                           placeholder="Điền lại mật khẩu" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-form__group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                        class="text-danger">*</span> Số điện thoại: </label>
                                                                <div class="col-xl-9 col-lg-9">
                                                                    <input type="text" name="Sđt" class="form-control m-input name-field"
                                                                           placeholder="Điền số điện thoại" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-form__group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                        class="text-danger">*</span>Quyền:</label>
                                                                <div class="col-xl-9 col-lg-9">
                                                                    <select class="form-control select2" name="Level" id="Loaitinid">
                                                                        <option value="" selected>Chọn</option>
                                                                        <option value="1" selected>Quản lý</option>
                                                                        <option value="2" selected>Người dùng</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 d-flex justify-content-end">
                                                                <div class="m-form__actions">
                                                                    <a href="{{route('show.user')}}"><button type="button" class="btn btn-danger">Hủy</button></a>
                                                                    <button type="reset" class="btn btn-focus">Làm mới</button>
                                                                    <button type="submit" class="btn btn-success">Thêm mới</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div class=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
