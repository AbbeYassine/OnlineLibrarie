@extends("template")
@section("content")
    <div id="content" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">
        <div class="container">


            <div class="col-md-9" id="basket">

                <div class="box">


                    <h1>Shopping cart</h1>
                    <p class="text-muted">You currently have {!! count($livres) !!} item(s) in your cart.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $sum=0 ?>
                            @foreach($livres as $livre)
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <tr>
                                        <td>
                                            <a href="/livre/{!! $livre->livre_id !!}">
                                                <img src="/{!! $livre->image !!}" alt="White Blouse Armani" style="width: 50px;height: 50px">
                                            </a>
                                        </td>
                                        <td><a href="/livre/{!! $livre->livre_id !!}">{!! $livre->nom !!}</a>
                                        </td>
                                        <td>
                                            <input disabled type="number" value="{!! $livre->Quantite !!}"
                                                   class="form-control">
                                        </td>
                                        <td>${!! $livre->prix !!}</td>
                                        <td>${!! $livre->prix*$livre->Quantite !!}</td>
                                        <td></td>
                                        <td><a href="/user/delete/panier/{!! $livre->livre_id !!}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php $sum+=$livre->prix*$livre->Quantite ?>
                                @else
                                    <tr>
                                        <td>
                                            <a href="/livre/{!! $livre["livre"]->livre_id !!}">
                                                <img src="/{!! $livre["livre"]->image !!}" alt="White Blouse Armani" style="width: 50px;height: 50px;">
                                            </a>
                                        </td>
                                        <td><a href="/livre/{!! $livre["livre"]->livre_id !!}">{!! $livre["livre"]->nom !!}</a>
                                        </td>
                                        <td>
                                            <input type="number" value="{!! $livre["livre"]->Quantite!!}"
                                                   class="form-control">
                                        </td>
                                        <td>${!! $livre["livre"]->prix !!}</td>
                                        <td>${!! $livre["livre"]->prix*$livre["livre"]->Quantite!!}</td>
                                        <td></td>
                                        <td><a href="/user/delete/panier/{!! $livre["livre"]->livre_id !!}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                   <?php $sum+=$livre["livre"]->prix*$livre["livre"]->Quantite ?>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="4  ">Total</th>
                                <th colspan="2">${!! $sum !!}</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="/" class="btn btn-default"><i class="fa fa-chevron-left"></i>
                                Continue shopping</a>
                        </div>
                        <div class="pull-right">
                            <a href="/checkout" type="submit" class="btn btn-primary">Proceed to checkout <i
                                        class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>


                </div>
                <!-- /.box -->

                @if(Auth::check())
                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box " style="width: 183px ; height: 379px">
                                <h3>You may also like these books</h3>
                            </div>
                        </div>


                        @foreach($livreLike as $livre)
                            <div class="col-md-3 col-sm-6">
                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="/livre/{!! $livre->livre_id !!}">
                                                    <img src="/{!! $livre->image !!}" alt="" class="img-responsive" style="width: 181px;height: 242px">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="/livre/{!! $livre->livre_id !!}">
                                                    <img src="/{!! $livre->image !!}" alt="" class="img-responsive" style="width: 181px;height: 242px" >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail.html" class="invisible">
                                        <img src="/{!! $livre->image !!}" alt="" class="img-responsive" style="width: 181px;height: 242px">
                                    </a>
                                    <div class="text">
                                        <h3>{!! $livre->nom !!}</h3>
                                        <p class="price">${!! $livre->prix !!}</p>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>
                        @endforeach


                    </div>
                @endif


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have
                        entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th>${!! $sum !!}</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th>$0.00</th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>${!! $sum !!}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
    </div>
@stop