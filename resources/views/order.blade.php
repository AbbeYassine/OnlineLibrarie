@extends("template")
@section("content")
    <div id="content">
        <div class="container">

            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li><a href="#">My orders</a>
                    </li>

                </ul>

            </div>
            <div class="col-md-3">
                <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Customer section</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked" id="list_option">
                            <li class="active" id="orders">
                                <a href="#"><i class="fa fa-list"></i> My orders</a>
                            </li>
                            <li id="wishlist">
                                <a href="#"><i class="fa fa-heart"></i>My wishlist</a>
                            </li>
                            <li id="account">
                                <a href="#"><i class="fa fa-user"></i> My account</a>
                            </li>
                            <li>
                                <a href="/auth/logout"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /.col-md-3 -->

                <!-- *** CUSTOMER MENU END *** -->
            </div>

            <div class="col-md-9 orders" id="customer-orders" style="display: block">
                <div class="box">
                    <div class="row">
                        <div class="col-md-10">
                            <h1>Order #{!! $order[0]->commande_id !!}</h1>
                        </div>

                        <div class="col-md-2">
                            <a href="/user/order/{!! $order[0]->commande_id !!}/generate">
                                <img src="/img/pdf_icon.ico" style="height: 50px;width: 50px"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <p class="lead">Order #{!! $order[0]->commande_id !!} was placed on
                            <strong>{!! $order[0]->date_commande !!}</strong>.</p>
                    </div>
                    <div class="row">
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact
                                us</a>, our customer service center is working for you 24/7.</p>

                        <hr>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $ord)
                                <tr>
                                    <td>
                                        <a href="/livre/{!! $ord->livre_id !!}">
                                            <img src="/{!! $ord->image !!}" style="height: 50px ;width: 50px">
                                        </a>
                                    </td>
                                    <td><a href="/livre/{!! $ord->livre_id !!}">{!! $ord->nom !!}</a>
                                    </td>
                                    <td>{!! $ord->quantite !!}</td>
                                    <td>${!! $ord->prix !!}</td>
                                    <td>$0.00</td>
                                    <td>${!! $ord->prix*$ord->quantite !!}</td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="5" class="text-right">Order subtotal</th>
                                <th>${!! $order[0]->total !!}</th>
                            </tr>

                            <tr>
                                <th colspan="5" class="text-right">Tax</th>
                                <th>$0.00</th>
                            </tr>
                            <tr>
                                <th colspan="5" class="text-right">Total</th>
                                <th>${!! $order[0]->total !!}</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                    <div class="row addresses">
                        <div class="col-md-6">
                            <h2>Invoice address</h2>
                            <p>John Brown
                                <br>13/25 New Avenue
                                <br>New Heaven
                                <br>45Y 73J
                                <br>England
                                <br>Great Britain</p>
                        </div>
                        <div class="col-md-6">
                            <h2>Shipping address</h2>
                            <p>John Brown
                                <br>13/25 New Avenue
                                <br>New Heaven
                                <br>45Y 73J
                                <br>England
                                <br>Great Britain</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-9 wishlist" id="customer-wishlist" style="display: none">


                <div class="row products">

                    @foreach($livres as $livre)
                        <div class="col-md-3 col-sm-4">
                            <div class="product" style="width: 183px; height: 468px">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.html">
                                                <img src="/{!! $livre->image !!}" alt="" class="img-responsive"
                                                     style="width: 181px; height: 242px">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="/{!! $livre->livre_id !!}">
                                                <img src="/{!! $livre->image !!}" alt="" class="img-responsive"
                                                     style="width: 181px; height: 242px">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="/img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.html">{!! $livre->nom !!}</a></h3>
                                    <p class="price">${!! $livre->prix !!}</p>
                                    <p class="buttons">
                                        <a href="/livre/{!! $livre->livre_id !!}" class="btn btn-default">View
                                            detail</a>
                                        <a href="/user/{!! \Illuminate\Support\Facades\Auth::user()->client_id !!}/{!! $livre->livre_id !!}/addPanier"
                                           class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart"></i>Add
                                            to cart</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                    @endforeach


                </div>
                <!-- /.products -->


            </div>

            <div class="col-md-9 account" id="customer-account" style="display: none">
                <div class="box">
                    <h1>My account</h1>
                    <p class="lead">Change your personal details or your password here.</p>
                    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                        turpis egestas.</p>

                    <h3>Change password</h3>

                    <form method="post"
                          action="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}/modifyPass">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_old">Old password</label>
                                    <input type="password" class="form-control" id="password_old" name="password_old">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_1">New password</label>
                                    <input type="password" class="form-control" id="password_1" name="password_1">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_2">Retype new password</label>
                                    <input type="password" class="form-control" id="password_2" name="password_2">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password
                            </button>
                        </div>
                    </form>

                    <hr>

                    <h3>Personal details</h3>
                    <form action="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}}/modify" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" class="form-control" id="firstname" name="first_name"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" class="form-control" id="lastname" name="last_name"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company" name="company">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="street">Street</label>
                                    <input type="text" class="form-control" id="street" name="street"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->street}}">
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="city">Company</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="zip">ZIP</label>
                                    <input type="text" class="form-control" id="zip" name="zip"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->zip}}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select class="form-control" id="state" name="state">
                                        @foreach($states as $state)
                                            <option value="{{$state->pays_id}}">{{$state->pays}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control" id="country" name="country"></select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Telephone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           value="{{Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-9 order" id="customer-order" style="display: none">
                <div class="box">
                    <h1>Order #1735</h1>

                    <p class="lead">Order #1735 was placed on <strong>22/06/2013</strong> and is currently <strong>Being
                            prepared</strong>.</p>
                    <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact
                            us</a>, our customer service center is working for you 24/7.</p>

                    <hr>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <a href="#">
                                        <img src="/img/detailsquare.jpg" alt="White Blouse Armani">
                                    </a>
                                </td>
                                <td><a href="#">White Blouse Armani</a>
                                </td>
                                <td>2</td>
                                <td>$123.00</td>
                                <td>$0.00</td>
                                <td>$246.00</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">
                                        <img src="/img/basketsquare.jpg" alt="Black Blouse Armani">
                                    </a>
                                </td>
                                <td><a href="#">Black Blouse Armani</a>
                                </td>
                                <td>1</td>
                                <td>$200.00</td>
                                <td>$0.00</td>
                                <td>$200.00</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="5" class="text-right">Order subtotal</th>
                                <th>$446.00</th>
                            </tr>
                            <tr>
                                <th colspan="5" class="text-right">Shipping and handling</th>
                                <th>$10.00</th>
                            </tr>
                            <tr>
                                <th colspan="5" class="text-right">Tax</th>
                                <th>$0.00</th>
                            </tr>
                            <tr>
                                <th colspan="5" class="text-right">Total</th>
                                <th>$456.00</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                    <div class="row addresses">
                        <div class="col-md-6">
                            <h2>Invoice address</h2>
                            <p>John Brown
                                <br>13/25 New Avenue
                                <br>New Heaven
                                <br>45Y 73J
                                <br>England
                                <br>Great Britain</p>
                        </div>
                        <div class="col-md-6">
                            <h2>Shipping address</h2>
                            <p>John Brown
                                <br>13/25 New Avenue
                                <br>New Heaven
                                <br>45Y 73J
                                <br>England
                                <br>Great Britain</p>
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- /.container -->
    </div>
@endsection
@section("script")
    <script>
        <?php  echo "var states = ".$states."\n";?>
        <?php  echo "var country = ".$country."\n";?>

            $("#list_option li").click(function () {
            $("#customer-orders").css("display", "none");
            $("#customer-wishlist").css("display", "none");
            $("#customer-account").css("display", "none");
            $("#list_option li").removeClass("active");
            var id = $(this).attr("id");
            $("." + id).css("display", "block");
            $("#" + id).addClass("active");
            var item_list = $("#" + id).text();
            $(".breadcrumb li:eq(1)").replaceWith("<li><a href='#' >" + item_list + " </a></li> ");
        });
        $(function () {
            $('#datetimepicker10').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
        });
        det_countries();
        $("#state").change(function () {
            det_countries();
        });

        function det_countries() {
            $("#country").html("");
            var id = $("#state").val();
            for (var j = 0; j < country.length; j++) {
                console.log(country[j]["ville_id"]);
                if (id == country[j]["pays_id"]) {
                    $('#country').append($('<option>', {
                        value: country[j]["ville_id"],
                        text: country[j]["libelle"]
                    }));
                }
            }
        }
    </script>
@endsection