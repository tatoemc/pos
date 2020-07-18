@extends('layouts.dashboard.app')

@section('content')
     
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.mouncerfatitems')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>                     
                <li><a href="{{ route('mouncerfatitems.index') }}"> @lang('site.mouncerfatitems')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content col-md-8">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">
 
                    @include('partials._errors')

                    <form action="{{ route('mouncerfatitems.store') }}" method="post" enctype="multipart/form-data" class="dates">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                
                        <div class="form-group">
                            <label>@lang('site.mouncercat_cat')</label>
                            <select name="mouncerfatcat_id" class="form-control">
                                <option value="">@lang('site.mouncercat_cat')</option>
                                @foreach ($mouncerfatcats as $mouncerfatcat)
                                    <option value="{{ $mouncerfatcat->id }}" {{ old('mouncerfatcat_id') == $mouncerfatcat->id ? 'selected' : '' }}>{{ $mouncerfatcat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                        <label>@lang('site.mouncercat_name')</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                        <div class="form-group">
                        <label>@lang('site.mouncercat_note')</label>
                        <textarea name="note" class="form-control">{{ old('note') }}</textarea>
                        
                        <div class="form-group">
                        <label>@lang('site.mouncercat_amount')</label>
                        <input type="number" name="amount" step="0.01" class="form-control" value="{{ old('amount') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

 
<script >
  

  $(function() {
            $('.dates #date1').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'multidate': false,
                
                
            });

        });
</script>


@endsection

