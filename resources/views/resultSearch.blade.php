@extends("template")
@section("content")
    <div id="content">
        <div class="container">


            <div class="col-md-12">

                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            Showing <strong>{!! count($livres) !!}</strong> of <strong></strong> books
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                <form class="form-inline">
                                    <div class="col-md-5 col-sm-6">
                                        <div class="products-number">
                                            <strong>Show</strong> <a href="#"
                                                                     class="btn btn-default btn-sm btn-primary">{{count($livres)}}</a>
                                            <a href="#"
                                               class="btn btn-default btn-sm">All</a>
                                            books
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="products-sort-by">
                                            <strong>Sort by</strong>
                                            <select name="sort-by" class="form-control">
                                                <option>Price</option>
                                                <option>Name</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i>
                                            Apply
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row products">

                    @foreach($livres as $livre)
                        <div class="col-md-4 col-sm-6">
                            <div class="product" style="width: 350px ; height: 664px;">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="/livre/{{$livre->livre_id}}">
                                                <img src="/{!! $livre->image !!}" alt="" class="img-responsive"
                                                     style="width: 348px ; height: 464px;">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="/livre/{{$livre->livre_id}}">
                                                <img src="/{!! $livre->image !!}" alt="" class="img-responsive"
                                                     style="width: 348px ; height: 464px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="/livre/{{$livre->livre_id}}" class="invisible">
                                    <img src="/{!! $livre->image !!}" alt="" class="img-responsive"
                                         style="width: 348px ; height: 464px;">
                                </a>
                                <div class="text">
                                    <div class="row">
                                        <h3 style="height: 18px;"><a
                                                    href="/livre/{{$livre->livre_id}}">{!! $livre->nom !!}</a></h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-3">

                                            <input id="{!! $livre->livre_id !!}" value="{!! $livre->rating !!}"
                                                   class="rating-loading">
                                        </div>
                                    </div>
                                    <div class="row center " style="padding-right: 20px; ">
                                        <p class="price">${!! $livre->prix !!}</p>
                                    </div>
                                    <p class="buttons">
                                        <a href="/livre/{{$livre->livre_id}}" class="btn btn-default">View detail</a>
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <a href="/user/{!! \Illuminate\Support\Facades\Auth::user()->client_id !!}/{!! $livre->livre_id !!}/addPanier"
                                               class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart"></i>Add
                                                to cart</a>
                                        @else
                                            <a href="/user/0/{!! $livre->livre_id !!}/addPanier"
                                               class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart"></i>Add
                                                to cart</a>
                                        @endif
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        @endforeach


                                <!-- /.col-md-4 -->
                </div>
                <!-- /.products -->

                <div class="pages">
                    {!! $livres->render() !!}
                </div>


            </div>
            <!-- /.col-md-9 -->
        </div>
    </div>
@stop
@section("script")
    <script>

        $(document).on('ready', function () {
            <?php foreach ($livres as $livre) {
            echo " $('#'+" . $livre->livre_id . ").rating({
                            size: 'sm',
                            disabled: true ,
                            displayOnly : true
                        }
                );";

        } ?>



        })
        ;
    </script>
@endsection