@extends('frontEnd.master')

@section('title', 'Checkout')

@section('banner')
    <!-- banner -->
        <div class="page-head">
            <div class="container">
                <h3>Check Out</h3>
            </div>
        </div>
    <!-- //banner -->
@endsection

@section('mainContent')
    <!-- check out -->
        <div class="checkout">
            <div class="container">
                <h3>My Shopping Bag</h3>
                <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>Remove</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Product Name</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <?php
                        $total = 0;
                        ?>
                        @foreach($cartProduct as $cart_pro)
                            <tr class="rem1">
                                <td class="invert-closeb">
                                    <div class="rem">
                                        <div class="close1"> </div>
                                    </div>
                                    <script>$(document).ready(function(c) {
                                            $('.close1').on('click', function(c){
                                                $('.rem1').fadeOut('slow', function(c){
                                                    $('.rem1').remove();
                                                });
                                            });
                                        });
                                    </script>
                                </td>
                                <td class="invert-image"><a href="single.html"><img src="{{asset('frontEnd/images')}}/a1.jpg" alt=" " class="img-responsive" /></a></td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">

                                            <form method="post" action="{{route('cart.update',$cart_pro->rowId)}}">
                                                @csrf
                                                <input type="number" name="qty" value="{{$cart_pro->qty}}">
                                                <input type="hidden" name="pro_id" value="{{$cart_pro->rowId}}">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>

                                            {{--<div class="entry value-minus">&nbsp;</div>--}}
                                            {{--<div class="entry value"><span>{{$cart_pro->qty}}</span></div>--}}
                                            {{--<div class="entry value-plus active">&nbsp;</div>--}}
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">{{$cart_pro->name}}</td>
                                <td class="invert">{{$item_total=$cart_pro->price*$cart_pro->qty}}</td>
                            </tr>
                            <?php
                                $total = $total + $item_total;
                            ?>
                        @endforeach

                        <!--quantity-->
                        <script>
                            $('.value-plus').on('click', function(){
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                                divUpd.text(newVal);
                            });

                            $('.value-minus').on('click', function(){
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                                if(newVal>=1) divUpd.text(newVal);
                            });
                        </script>
                        <!--quantity-->
                    </table>
                </div>
                <div class="checkout-left">

                    <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                        <a href="mens.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                    </div>
                    <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                        <h4>Shopping basket</h4>
                        <ul>
                            <li>Hand Bag <i>-</i> <span>$45.99</span></li>
                            <li>Watches <i>-</i> <span>$45.99</span></li>
                            <li>Sandals <i>-</i> <span>$45.99</span></li>
                            <li>Wedges <i>-</i> <span>$45.99</span></li>
                            <li>Total <i>-</i> <span>{{$total}}</span></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    <!-- //check out -->
@endsection