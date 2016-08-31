@extends("template")
@section("style")



    <link href="/css/smart_wizard.css" rel="stylesheet">

@endsection
@section("content")
    <div id="content">
        <div class="container">


            <div class="col-md-9" id="checkout">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Checkout</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br/>
                                              <small>Information</small>
                                          </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br/>
                                              <small>Validation</small>
                                          </span>
                                    </a>
                                </li>

                            </ul>
                            <div id="step-1">
                                <form class="form-horizontal form-label-left"
                                      action="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}}/modify"
                                      method="post">
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="firstname">Firstname</label>
                                                <input type="text" class="form-control" id="firstname" name="first_name"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->first_name}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="lastname">Lastname</label>
                                                <input type="text" class="form-control" id="lastname" name="last_name"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->last_name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="company">Company</label>
                                                <input type="text" class="form-control" id="company" name="company">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="street">Street</label>
                                                <input type="text" class="form-control" id="street" name="street"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->street}}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="city">Company</label>
                                                <input type="text" class="form-control" id="city" name="city">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="zip">ZIP</label>
                                                <input type="text" class="form-control" id="zip" name="zip"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->zip}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <select class="form-control" id="state" name="state">
                                                    @foreach($states as $state)
                                                        <option value="{{$state->pays_id}}">{{$state->pays}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select class="form-control" id="country" name="country"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="phone">Telephone</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                       value="{{Auth::user()->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email"
                                                       value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                            </div>
                                        </div>
                                    </div>

                                </form>


                            </div>
                            <div id="step-2">
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
                                        <?php $sum = 0 ?>
                                        @foreach($livres as $livre)
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="{!! $livre->image !!}" alt="White Blouse Armani"
                                                                 style="width: 50px;height: 50px;">
                                                        </a>
                                                    </td>
                                                    <td><a href="#">{!! $livre->nom !!}</a>
                                                    </td>
                                                    <td>
                                                        <input disabled type="number" value="{!! $livre->Quantite !!}"
                                                               class="form-control">
                                                    </td>
                                                    <td>${!! $livre->prix !!}</td>
                                                    <td>${!! $livre->prix*$livre->Quantite !!}</td>
                                                    <td></td>

                                                </tr>
                                                <?php $sum += $livre->prix * $livre->Quantite ?>
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
                            </div>


                        </div>
                        <!-- End SmartWizard Content -->


                    </div>
                </div>


                <!-- /.box -->


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
                                <td>Shipping and handling</td>
                                <th>$0.00</th>
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
    @endsection

    @section("script")
            <!-- jQuery Smart Wizard -->
    <!-- jQuery Smart Wizard -->

    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <script src="/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

    <script>
        $(document).ready(function () {
            $('#wizard').smartWizard();

            $('#wizard_verticle').smartWizard({
                transitionEffect: 'slide'
            });

            $('.buttonNext').addClass('btn btn-success');
            $('.buttonPrevious').addClass('btn btn-primary');
            $('.buttonFinish').addClass('btn btn-success');


            $(".buttonFinish").click(function () {
                swal({
                    title: "Generate version PDF?",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, generate it!",
                    cancelButtonText: "No thx !",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location="http://localhost/checkout/submit?pdf=1";
                    } else {
                        window.location = "http://localhost/checkout/submit";
                    }
                });
            })
        });
    </script>
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
    <!-- /jQuery Smart Wizard -->
@endsection