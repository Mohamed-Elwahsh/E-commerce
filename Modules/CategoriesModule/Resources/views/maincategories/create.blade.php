@extends('categoriesmodule::layouts.master')
@section('title', 'إضافة قسم رئيسى')
@section('content')
<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('maincategories.all')}}"> الأقسام الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active">
                                <a href="{{route('maincategories.create')}}"> إضافة قسم رئيسى </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> إضافة قسم رئيسى </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @if(Session::get('success'))
                                   <div class="alert alert-success">
                                       {{ (Session::get('success')) }}
                                   </div>
                                @endif   
                                @if(Session::get('error'))
                                   <div class="alert alert-danger">
                                       {{ (Session::get('error')) }}
                                   </div>
                                @endif   
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('maincategories.store') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                              <h4 class="form-section"><i class="ft-home"></i> بيانات  القسم الرئيسى </h4>
                                              @if(get_languages() -> count() > 0)
                                                @foreach(get_languages() as $index => $lang)
                                                <div class="row">
                                                    <div class="col-md-12">  
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم القسم - {{ __('categoriesmodule::messages.'.$lang -> abbr) }} </label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder=""
                                                                   name="category[{{ $index }}][name]">
                                                            @error("category.$index.name")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 hidden">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> أختصار اللغة - {{ __('categoriesmodule::messages.'.$lang -> abbr) }} </label>
                                                            <input type="text"  id="name"
                                                                   class="form-control"
                                                                   value="{{ $lang -> abbr }}"
                                                                   placeholder=""
                                                                   name="category[{{ $index }}][abbr]">
                                                            @error("category.$index.abbr")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" 
                                                                   name="category[{{ $index }}][active]"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   value="1"
                                                                   checked/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة  - {{ __('categoriesmodule::messages.'.$lang -> abbr) }}</label>

                                                            @error("category.$index.active")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                              @endif
                                            </div>


                                            <div class="form-group">
                                                <label> صوره القسم </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection
