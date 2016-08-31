@extends("template")
@section("content")
    <div id="content">

        <div class="container">
            <div class="col-md-12">
                <div id="main-slider" style="height: 600px">
                    <div class="item">
                        <img src="/img/book1.jpg" style="width: 1110px ;height: 600px" alt="" class="img-responsive">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="/img/book2.jpg" style="width: 1110px ;height: 600px" alt="">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="/img/book3.jpg" style="width: 1110px; height: 600px" alt="">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="/img/book4.jpg" style="width: 1110px;height: 600px" alt="">
                    </div>
                </div>
                <!-- /#main-slider -->
            </div>
        </div>

        <!-- *** ADVANTAGES HOMEPAGE ***
    _________________________________________________________ -->
        <div id="advantages">

            <div class="container">
                <div class="same-height-row">
                    <div class="col-sm-4">
                        <div class="box same-height clickable">
                            <div class="icon"><i class="fa fa-heart"></i>
                            </div>

                            <h3><a href="#">We love our customers</a></h3>
                            <p>We are known to provide best possible service ever</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box same-height clickable">
                            <div class="icon"><i class="fa fa-tags"></i>
                            </div>

                            <h3><a href="#">Best prices</a></h3>
                            <p>You can check that the height of the boxes adjust when longer text like this one is used
                                in one of them.</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box same-height clickable">
                            <div class="icon"><i class="fa fa-thumbs-up"></i>
                            </div>

                            <h3><a href="#">100% satisfaction guaranteed</a></h3>
                            <p>Free returns on everything for 3 months.</p>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->

        </div>
        <!-- /#advantages -->

        <!-- *** ADVANTAGES END *** -->

        <!-- *** HOT PRODUCT SLIDESHOW ***
    _________________________________________________________ -->
        <div id="hot">

            <div class="box">
                <div class="container">
                    <div class="col-md-12">
                        <h2>Hot this week</h2>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="product-slider">
                    @foreach($livres as $livre)

                        <div class="item">
                            <div class="product" style="width: 178px ;height: 371px">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="/livre/{{$livre->livre_id}}">
                                                <div>
                                                    <img src="{!! $livre->image !!}" alt=""
                                                         style="width: 176px ; height: 234px">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="/livre/{{$livre->livre_id}}">
                                                <div>
                                                    <img src="{!! $livre->image !!}" alt=""
                                                         style="width: 176px ; height: 234px">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="/livre/{{$livre->livre_id}}" class="invisible">
                                    <div>
                                        <img src="{!! $livre->image !!}" alt="" style="width: 176px ; height: 234px">
                                    </div>
                                </a>

                                <div class="text">
                                    <div class="row" style="height: 60px">
                                        <h3><a href="/livre/{{$livre->livre_id}}">{!! $livre->nom !!}</a></h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-1">
                                            <input id="{!! $livre->livre_id !!}" value="{!! $livre->rating !!}"
                                                   class="rating-loading ">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-4">
                                            <p class="price">${!! $livre->prix !!}</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                    @endforeach

                </div>
                <!-- /.product-slider -->
            </div>
            <!-- /.container -->

        </div>
        <!-- /#hot -->

        <!-- *** HOT END *** -->


    </div>
@endsection
@section("script")
    <script>
        $(document).on('ready', function () {
                    <?php echo "var livres =" . $livres ?>

            for (var i = 0; i < livres.length; i++) {
                $('#' + livres[i]["livre_id"]).rating({
                            size: 'sm',
                            disabled: true,
                            displayOnly: true
                        }
                );
            }
        })
        ;
    </script>
@endsection

