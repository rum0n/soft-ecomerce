@extends('frontEnd.master')

@section('title', 'Category-wised Product')

@section('banner')

@endsection

@section('mainContent')

        <!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>Single</h3>
    </div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
    <div class="container">
        <div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <!-- FlexSlider -->
                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                    <!-- //FlexSlider-->
                    <ul class="slides">
                        <li data-thumb="{{asset( $singlePro->productPic )}}">
                            <div class="thumb-image"> <img src="{{asset( $singlePro->productPic )}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{asset( $singlePro->productPic )}}">
                            <div class="thumb-image"> <img src="{{asset( $singlePro->productPic )}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{asset( $singlePro->productPic )}}">
                            <div class="thumb-image"> <img src="{{asset( $singlePro->productPic )}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{asset( $singlePro->productPic )}}">
                            <div class="thumb-image"> <img src="{{asset( $singlePro->productPic )}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
            <h3>{{ $singlePro->productName }}</h3>
            <p><span class="item_price">${{ $singlePro->price }}</span></p>
            <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
            </div>
            <div class="description">
                <h5>Check delivery, payment options and charges at your location</h5>
                <input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}" required="">
                <input type="submit" value="Check">
            </div>
            <div class="color-quality">
                <div class="color-quality-right">
                    <h5>Quality :</h5>
                    <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                        <option value="null">5 Qty</option>
                        <option value="null">6 Qty</option>
                        <option value="null">7 Qty</option>
                        <option value="null">10 Qty</option>
                    </select>
                </div>
            </div>
            <div class="occasional">
                <h5>Types :</h5>
                <div class="colr ert">
                    <label class="radio"><input type="radio" name="radio" checked=""><i></i>Casual Shoes</label>
                </div>
                <div class="colr">
                    <label class="radio"><input type="radio" name="radio"><i></i>Sports Shoes</label>
                </div>
                <div class="colr">
                    <label class="radio"><input type="radio" name="radio"><i></i>Formal Shoes</label>
                </div>
                <div class="clearfix"> </div>
            </div>
            <form action="{{route('add_to_cart')}}" method="post">
                @csrf
                <input type="hidden" name="pro_id" value="{{ $singlePro->p_id }}">
                <input type="hidden" name="qty" value="1" min="1">
                <div class="occasion-cart">
                    {{--<a href="{{route('add_to_cart')}}" class="item_add hvr-outline-out button2 btn-primary" type="submit">Add to cart</a>--}}

                    <button class="btn-primary" type="submit">Add to cart</button>
                </div>
            </form>

        </div>
        <div class="clearfix"> </div>

        <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(1)</a></li>
                    <li role="presentation" class="dropdown">
                        <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">Information <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                            <li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">cleanse</a></li>
                            <li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">fanny</a></li>
                        </ul>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <p> <span>{{ $singlePro->productDescription }}</span></p>
                    <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                        <h5>Related Product</h5>


                        @foreach($rel_products as $r_products)
                            <div class="col-md-4 product-men no-pad-men">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="{{asset( $r_products->productPic )}}" alt="" class="pro-image-front">
                                        <img src="{{asset( $r_products->productPic )}}" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{route('single_product',$r_products->id)}}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        <span class="product-new-top">New</span>

                                    </div>
                                    <div class="item-info-product ">
                                        <h4><a href="{{route('single_product',$r_products->id)}}">{{ $r_products->productName  }}</a></h4>
                                        <div class="info-product-price">
                                            <span class="item_price">{{ $r_products->price  }}</span>
                                            {{--<del>$69.71</del>--}}
                                        </div>
                                        <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                        <div class="bootstrap-tab-text-grids">
                            <div class="bootstrap-tab-text-grid">
                                <div class="bootstrap-tab-text-grid-left">
                                    <img src="{{asset('frontEnd/images')}}/men3.jpg" alt=" " class="img-responsive">
                                </div>
                                <div class="bootstrap-tab-text-grid-right">
                                    <ul>
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
                                    </ul>
                                    <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                                        suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                        vel eum iure reprehenderit.</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="add-review">
                                <h4>add a review</h4>
                                <form>
                                    <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                    <input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">

                                    <textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                                    <input type="submit" value="SEND">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2" aria-labelledby="dropdown2-tab">
                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //single -->

@endsection
