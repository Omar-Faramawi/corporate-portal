@inject('Language', 'App\Http\Controllers\LanguageController') 
@extends('backend.master')
@section('header')

@endsection
@section('content-header')
<section class="content-header">
    <h1><i class="livicon" data-name="list" data-size="25" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i>{{ trans('backend.create') }} {{ trans('backend.link') }}</h1>
    <ol class="breadcrumb">
      <li><a href="/{{ Lang::getlocale() }}/admin"><i class="fa fa-tachometer"></i> {{ trans('backend.dashboard') }}</a></li>
      <li><a href="/{{ Lang::getlocale() }}/admin/menus"> {{ trans('backend.list_menus') }}</a></li>
      <li class="active"> {{ trans('backend.create') }} {{ trans('backend.link') }}</li>
    </ol>   
</section>
@endsection

@section('content')
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
               <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ trans('backend.create') }} {{ trans('backend.link') }}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ action('MenusController@store_link') }}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-9">
                        @if($Language->all()->count())
                            @foreach($Language->all() as $lang)
                            <div id="group-{{$lang->code}}">
                                <div class="form-group">
                                    <label for="title">{{ trans('backend.title') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <input type="text" class="form-control" name="title_{{$lang->code}}" value="{{ old('title_'.$lang->code.'') }}" placeholder="{{ trans('backend.title') }} @if($Language->all()->count() > '1') {{ $lang->name }} @endif">
                                </div>

                                <div class="form-group">
                                    <label for="link">{{ trans('backend.link') }} @if($Language->all()->count() > '1') ( {{ $lang->name }} ) @endif</label>
                                    <input type="text" class="form-control" name="link_{{$lang->code}}" value="{{ old('link_'.$lang->code.'') }}" placeholder="{{ trans('backend.link') }} @if($Language->all()->count() > '1') {{ $lang->name }} @endif">
                                </div>

                            </div>
                            @endforeach
                        @endif


                        @if($menus->count())
                            <div class="form-group">
                                <label for="menu">{{ trans('backend.menu') }}</label>
                                <select name="menu" id="" class="form-control">
                                    <option value="">-- {{ trans('backend.choose menu') }} --</option>
                                    @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" @if(old('menu') == $menu->id) selected @endif>{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        
                    </div>
                    <div class="col-md-3 sidbare">
                        <!-- Language field -->
                        @include('backend.language.field')
                        <!-- End Language field -->
                        <button type="submit" class="btn btn-block btn-primary">{{ trans('backend.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')

<!--Language -->
@include('backend.language.scripts.scripts')
<!--end Language -->

@endsection