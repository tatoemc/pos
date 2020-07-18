@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.report')
               
            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.report')</li> 
            </ol>
        </section>

        <section class="content"> 

            <div class="row">

                <div class="col-md-6">

                    <div class="box box-primary">
 
                        <div class="box-header">

                            <h3 class="box-title" style="margin-bottom: 10px">@lang('site.product_sell')</h3>

                        </div><!-- end of box header -->


                            <div class="box-body table-responsive">
 
                                <table class="table table-hover">
                                    <tr> 
                                        <th>اسم المنتج</th>
                                        <th>الكمية</th>
                                    </tr>
                                    <tr>
                                        @foreach($products as $product )
                                                
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->orders->count()}}</td>
                                                </tr>
                                         @endforeach
                                </table><!-- end of table -->
                            </div>
                    </div><!-- end of box -->

                </div><!-- end of col -->


                

            </div><!-- end of row -->

        </section><!-- end of content section -->

    </div><!-- end of content wrapper -->

@endsection
