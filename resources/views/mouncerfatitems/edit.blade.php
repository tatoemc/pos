@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('mouncerfatitems.index') }}"> @lang('site.products')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.edit')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('mouncerfatitems.update', $mouncerfatitem->id) }}" method="post" enctype="multipart/form-data" class="dates">

                        {{ csrf_field() }}
                        {{ method_field('put') }}  

<div class="form-group"> 
<label>@lang('site.mouncercat_cat')</label>
<select name="mouncerfatcat_id" class="form-control">
<option value="">@lang('site.mouncercat_cat')</option>
@foreach ($mouncerfatcats as $mouncerfatcat)
    <option value="{{ $mouncerfatcat->id }}" {{ $mouncerfatitem->id == $mouncerfatcat->id ? 'selected' : '' }}>{{ $mouncerfatcat->name }}</option>
@endforeach
</select>
</div>

                        <div class="form-group">
                            <label>@lang('site.mouncercat_name')</label>
                            <input type="text" name="name" class="form-control" value="{{ $mouncerfatitem->name }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.mouncercat_note')</label>
                            <input type="text" name="note" class="form-control" value="{{ $mouncerfatitem->note }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.mouncercat_amount')</label>
                            <input type="number" name="amount" class="form-control" value="{{ $mouncerfatitem->amount }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
@push('scripts')
<script >
  

  $(function() {
            $('.dates #date1').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'multidate': true
            });

        });
</script>
@endpush

@endsection
