@extends('admin.layouts.master')
@section('content')
<div class="page-content">
    <section>
        <div class="box-item">
            <div class="box-item-head">
                <h3 class="title">اضافة</h3>
                <i class="fa fa-angle-down"></i>
            </div><!-- End Box-Item-Head -->
            <div class="box-item-content">
                <form class="form" action="{{route('admin.portfolio.add')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="choose-img">
                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                        <input type="hidden" value="portfolio" id="storage" >
                                        <input type="hidden" name="image"  id="img" >
                                        <input type="file" name="image" id="image">
                                        <p style="font-size: large;">
                                            اضغط لتحميل صورة
                                        </p>
                                    </div><!-- End Choose-Img -->
                                    <div class="upload-action">
                                        <button class="upload-btn" type="button" id="upload-btn">
                                            تحميل صورة
                                        </button>
                                        <div class="progress">
                                            <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                            </div>
                                        </div>
                                        <h3 id="status"></h3>
                                        <p id="loaded_n_total"></p>
                                    </div><!--End upload-action-->
                                </div><!-- End Form-Group -->
                            </div><!-- End col -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="choose-img">
                                        <input type="hidden" value="{{route('admin.upload.icon')}}" id="url2" >
                                        <input type="hidden" value="portfolio" id="storage2" >
                                        <input type="hidden" name="image2" id="img2" >
                                        <input type="file" name="image2" id="image2" required>
                                        <p style="font-size: large;">اضغط لتحميل أيكونة</p>
                                    </div><!-- End Choose-Img -->
                                    <div class="upload-action">
                                        <button class="upload-btn" type="button" id="upload-btn2">
                                            تحميل أيكونة
                                        </button>
                                        <div class="progress">
                                            <div id="progressBar2" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                            </div>
                                        </div>
                                        <h3 id="status2"></h3>
                                        <p id="loaded_n_total2"></p><br>

                                        <h5>التفعيل</h5><br>
                                        <select class="form-control" name="active">
                                            <option value="----------"></option>
                                            <option value="1">نعم</option>
                                            <option value="0">لا</option>
                                        </select>
                                        <br>
                                    </div><!--End upload-action-->
                                </div><!-- End Form-Group -->
                            </div><!-- End col -->
                            <div class="col-md-6">
                                <div class="form-group ar">
                                    <label>اسم الخدمة باللغة العربية</label>
                                    <input type="text" class="form-control" name="name_ar">
                                </div><!--End Form-group-->
                            </div><!--End Col-md-6-->
                            <div class="col-md-6">
                                <div class="form-group en">
                                    <label>Name in English</label>
                                    <input type="text" class="form-control" name="name_en">
                                </div><!--End Form-group-->
                            </div><!--End Col-md-6-->
                            <div class="col-md-6">
                                <div class="form-group ar">
                                    <label>محتوى الخدمة باللغة العربية</label>
                                    <textarea class="form-control" rows="10" name="content_ar"></textarea>
                                </div><!-- End Form-Group -->
                            </div><!-- End col -->
                            <div class="col-md-6">
                                <div class="form-group en">
                                    <label>Content in English</label>
                                    <textarea class="form-control" rows="10" name="content_en"></textarea>
                                </div><!-- End Form-Group -->
                            </div><!-- End col -->
                            <div class="col-md-6">
                                <div class="form-group en">
                                    <label>Portfolio URL</label>
                                    <input class="form-control" type="text" name="url">
                                </div><!-- End Form-Group -->
                            </div><!-- End col -->
                            <div class="col-md-6">
                                <div class="form-group ar">
                                    <label>الفئة</label>
                                    <div class="tg-item">
                                        <select class="form-control" name="cat_id">
                                            <option value="-------------"></option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">
                                                    {{$category->cat_name_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- End Form-Group -->
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="custom-btn addBTN" type="submit">حفظ التغييرات</button>
                                    <a href="{{route('admin.portfolios')}}" class="custom-btn" style="margin-right: 20px;">أغلق</a>
                                </div><!--End Col-->
                            </div><!--End Row-->
                        </div><!--End Form-action-->
                    </div>
                </form><!-- End row -->
            </div><!-- End Box-Item-Content -->
        </div><!-- End Box-Item -->
    </section><!--End Section-->
    <section>
        <div class="box-item">
            <div class="box-item-head">
                <h3 class="title">
                    اضافة صور المشروع
                </h3>
                <i class="fa fa-angle-down"></i>
            </div><!-- End Box-Item-Head -->
            <div class="box-item-content">
                <form action="{{route('admin.portfolio.images')}}" style="border-color:#eee; width: 100%; height: 700px;margin-bottom: 20px;" class="dropzone" id="my-dropzone" method="post">
                    {{ csrf_field() }}
                    <div class="col-xs-12">
                        <div class="col-md-12" style="margin-left: 250px; margin-top: 20px;">
                            <div class="form-group">
                                <p style="text-align: center;">
                                    اختر مشروع
                                </p>
                                <select class="form-control" required name="portfolio">
                                    <option>          </option>
                                    @foreach($portfolios as $portfolio)
                                        <option value="{{ $portfolio->id }}">{{ $portfolio->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div><!-- End Form-Group -->
                        </div><!--End Col-md-6-->
                    </div>
                    <p style="text-align: center;">
                        قم بتحميل صور المشروع
                    </p>
                </form>
            </div><!-- End Box-Item-Content -->
        </div><!-- End Box-Item -->
    </section><!--End Section-->
</div><!--End page-content-->
@endsection