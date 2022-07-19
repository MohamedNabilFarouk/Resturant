
@extends('admin.layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>{{$order->branch->name_en}}</strong>
                        <br>
                        <strong> @lang('site.to'): </strong>   {{$order->address}}
                       <br>
                        <abbr title="Phone">@lang('site.Customer phone'):</abbr> {{$order->user->phone}}
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>

                        <em>@lang('site.At'): {{Carbon\Carbon::now()->setTime(23,59,59)->format('Y-m-d H:i:s')}}</em>
                    </p>
                    <p>
                        <em>@lang('site.Item Orders'): #{{$order->id}}</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>@lang('site.Details')</h1>
                </div>
                <table class="table table-hover table-hover">
                    <thead>

                        <tr class="text-center border-3 m-auto">
                            <th>@lang('site.product')</th>
                            <th>#</th>
                            <th>@lang('size')</th>
                            <!-- <th class="text-center">@lang('site.Price')</th> -->
                            <!-- <th class="text-center">@lang('site.Total')</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total= 0;
                        ?>
                    
                    @foreach($products as $p)
                        <tr class="text-center border-3 m-auto">
                            <td class="col-md-9"><em>{{$p['item']->name_en}}</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> {{$p['qty']}} </td>
                            <td class="col-md-1" style="text-align: center"> {{$p['size'] ?? ''}} </td>
                        </tr>
                        @endforeach
                        <!-- <tr class="text-center border-3 m-auto">
                            <td class="col-md-9"><em>Lebanese Cabbage Salad</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> 1 </td>
                            <td class="col-md-1 text-center">$8</td>
                            <td class="col-md-1 text-center">$8</td>
                        </tr> -->
                        <!-- <tr class="text-center border-3 m-auto">
                            <td class="col-md-9"><em>Baked Tart with Thyme and Garlic</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> 3 </td>
                            <td class="col-md-1 text-center">$16</td>
                            <td class="col-md-1 text-center">$48</td>
                        </tr> -->
                        <tr class="text-center border-3 m-auto">
                            <!--  <td class="px-3">   </td>
                             <td class="px-3">   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>$6.94</strong>
                            </p>
                            <p>
                                <strong>$6.94</strong>
                            </p></td>
                        </tr> -->
                        <tr class="text-center border-3 m-auto">
                             <td class="px-3">   </td>
                             <td class="px-3">   </td>
                            <!-- <td class="text-right"><h4><strong>@lang('site.Total'): </strong></h4></td> -->
                            <!-- <td class="text-center text-danger"><h4><strong>{{$total}} @lang('site.LE')</strong></h4></td> -->
                        </tr>
                    </tbody>
                </table>
                <!-- <button type="button" class="btn btn-success btn-lg btn-block" onclick="window.print()">
                    @lang('site.Print')   <span class="glyphicon glyphicon-chevron-right"></span>
                </button> -->

                <!-- <button onclick="window.print()">Print this page</button> -->
            </div>
        </div>
    </div>

    @endsection
