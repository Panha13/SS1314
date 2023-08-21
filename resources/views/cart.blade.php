@extends("layouts.single")
@section("content")

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">{{__('Home')}}</a></li>
                <li class="active">{{__('Shopping Cart')}}</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">{{__('Item')}}</td>
                        <td class="description"></td>
                        <td class="price">{{__('Price')}}</td>
                        <td class="quantity">{{__('Quantity')}}</td>
                        <td class="total">{{__('Total')}}</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $cartItem)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/products/{{$cartItem->attributes->image}}" alt="" width="150px"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$cartItem->name}}</a></h4>
                            <p>{{__('Web ID')}}: {{$cartItem->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{$cartItem->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cartItem->quantity}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{$cartItem->price* $cartItem->quantity}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>{{__('What would you like to do next?')}}</h3>
            <p>{{__('Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.')}}</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>{{__('Use Coupon Code')}}</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>{{__('Use Gift Voucher')}}</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>{{__('Estimate Shipping & Taxes')}}</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>{{__('Country')}}:</label>
                            <select>
                                <option>{{__('United States')}}</option>
                                <option>{{__('Bangladesh')}}</option>
                                <option>{{__('UK')}}</option>
                                <option>{{__('India')}}</option>
                                <option>{{__('Pakistan')}}</option>
                                <option>{{__('Ucrane')}}</option>
                                <option>{{__('Canada')}}</option>
                                <option>{{__('Dubai')}}</option>
                            </select>
                        </li>
                        <li class="single_field">
                            <label>{{__('Region / State')}}:</label>
                            <select>
                                <option>{{__('Select')}}</option>
                                <option>{{__('Dhaka')}}</option>
                                <option>{{__('London')}}</option>
                                <option>{{__('Dillih')}}</option>
                                <option>{{__('Lahore')}}</option>
                                <option>{{__('Alaska')}}</option>
                                <option>{{__('Canada')}}</option>
                                <option>{{__('Dubai')}}</option>
                            </select>
                        </li>
                        <li class="single_field zip-field">
                            <label>{{__('Zip Code')}}:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">{{__('Get Quotes')}}</a>
                    <a class="btn btn-default check_out" href="">{{__('Continue')}}</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>{{__('Cart Sub Total')}} <span>${{cart::getSubTotal()}}</span></li>
                        <li>{{__('Eco Tax')}} <span>$2</span></li>
                        <li>{{__('Shipping Cost')}} <span>{{__('Free')}}</span></li>
                        <li>{{__('Total')}} <span>$61</span></li>
                    </ul>
					<a class="btn btn-default update" href="">{{__('Update')}}</a>
                    <a class="btn btn-default check_out" href="">{{__('Check Out')}}</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection

