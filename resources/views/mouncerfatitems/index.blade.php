@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
 
        <section class="content-header">

            <h1>@lang('site.mouncerfatitems')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.mouncerfatitems')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.mouncerfatitems')</h3>
               <div class="row">
                   <div class="col-md-4">
                                    @if (auth()->user()->hasPermission('create_mouncerfatitems'))
                                
                                        <a href="{{ route('mouncerfatitems.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                    @else
                                         <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                    @endif
                     </div>
                 </div><!-- end of row--> 
                </div><!-- end of box header --> 

<div class="box-body">

@if ($mouncerfatitems->count() > 0)

    <table class="table table-hover">

        <thead>
        <tr> 
            <th>#</th>
            <th>@lang('site.mouncerfatitem_name')</th>
            
            <th>@lang('site.mouncerfatitem_date')</th>
            <th>@lang('site.mouncerfatitem_cat')</th>
            <th>@lang('site.mouncerfatitem_note')</th>
            <th>@lang('site.amount')</th>
            <th>@lang('site.action')</th> 
        </tr>
        </thead>
        
        <tbody>
        @foreach ($mouncerfatitems as $index=>$mouncerfatitem)
            <tr> 

                <td>{{ $index + 1 }}</td>
                <td>{{ $mouncerfatitem->name }}</td>
                <td>{{ date('m,j,Y', strtotime($mouncerfatitem->created_at)) }}</td>
                <td>{{ $mouncerfatitem->mouncerfatcat->name }}</td>
                <td>{{ $mouncerfatitem->note }}</td>
                <td>{{ $mouncerfatitem->amount }}</td>
                <td>
                    @if (auth()->user()->hasPermission('update_mouncerfatitems'))
                        <a href="{{ route('mouncerfatitems.edit', $mouncerfatitem->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                    @else
                        <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                    @endif
                     @if (auth()->user()->hasPermission('delete_mouncerfatitems'))
                        <form action="{{ route('mouncerfatitems.destroy', $mouncerfatitem->id) }}" method="post" style="display: inline-block">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                        </form><!-- end of form -->
                    @else
                        <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                    @endif
                </td>
            </tr>
        
        @endforeach
        </tbody>

    </table><!-- end of table -->
    
    
                        
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
