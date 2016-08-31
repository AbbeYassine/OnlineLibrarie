@extends("template")
@section("content")
    <div id="content">
        <div class="container">


            <div class="col-md-12">

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage" style="width: 540px ;height: 678px;">
                            <img src="/{!! $livre->image !!}" alt="" class="img-responsive"
                                 style="width: 540px ;height: 678px;">
                        </div>


                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center">{!! $livre->nom !!}</h1>
                            <div class="row">
                                <div class="col-md-2 col-md-offset-4">
                                    <input id="{!! $livre->livre_id !!}d" value="{!! $livre->rating !!}"
                                           class="rating-loading">
                                </div>
                            </div>
                            <div class="row text-center">
                                <p class="price_detail">${!! $livre->prix !!}</p>
                                @if($livre->quantite_stock>0)
                                    <p ><i class="fa fa-circle text-success"> available</i></p>
                                @else
                                    <i class="fa fa-circle text-danger">unavailable</i>
                                @endif
                            </div>

                            <div class="row">
                                <p class="text-center buttons">
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        @if($livre->quantite_stock>0)
                                            <a href="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}/{{$livre->livre_id}}/addPanier"
                                               class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                        @else
                                            <a href="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}/{{$livre->livre_id}}/addPanier"
                                               class="btn btn-primary" disabled=""><i
                                                        class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <a href="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}/{!! $livre->livre_id !!}/addWishList"
                                               class="btn btn-default"><i class="fa fa-heart"></i> Add to
                                                wishlist</a>
                                        @endif
                                    @else
                                        <a href="/user/0/{{$livre->livre_id}}/addPanier" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart"></i> Add to
                                            cart</a>
                                    @endif
                                </p>
                            </div>


                        </div>

                        <div class="row" id="thumbs">
                            <div class="col-xs-4">
                                <a href="/{!! $livre->image !!}" class="thumb">
                                    <img src="/{!! $livre->image !!}" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="/{!! $livre->image !!}" class="thumb">
                                    <img src="/{!! $livre->image !!}" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="/{!! $livre->image !!}" class="thumb">
                                    <img src="/{!! $livre->image !!}" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="box col-md-8" id="details">
                        <p>
                        <h4>Book details</h4>
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#menu1">Description</a></li>
                            <li><a data-toggle="tab" href="#menu2">Cracteristique</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <p>{!! $livre->description !!}</p>
                            </div>
                            <div id="menu2" class="tab-pane fade" style="border-width: 10px ;border-color:black;">
                                <div class="row">
                                    <p class="col-md-5 h5">ISBN</p>
                                    <p class="col-md-4">{!! $livre->isbn !!}</p>
                                </div>
                                <div class="row">
                                    <p class="col-md-5 h5">Publishing house</p>
                                    <p class="col-md-4">{!! $livre->maison_edition !!}</p>
                                </div>
                                <div class="row">
                                    <p class="col-md-5 h5">Creation date</p>
                                    <p class="col-md-4">{!! $livre->date_creation !!}</p>
                                </div>
                                <div class="row">
                                    <p class="col-md-5 h5">Dimension</p>
                                    <p class="col-md-4">{!! $livre->dimension !!}</p>
                                </div>
                                <div class="row">
                                    <p class="col-md-5 h5">Format</p>
                                    <p class="col-md-4">{!! $livre->format !!}</p>
                                </div>
                                <div class="row">
                                    <p class="col-md-5 h5">Number of page</p>
                                    <p class="col-md-4">{!! $livre->nb_page !!}</p>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>


                @if(\Illuminate\Support\Facades\Auth::check())
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box" style="width: 255px ; height: 474px">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>
                        <?php $i = 1 ?>
                        @foreach($likes as $like)
                            <div class="col-md-3 col-sm-6">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="/livre/{{$like->livre_id}}">
                                                    <img src="/{!! $like->image !!}" alt="" class="img-responsive"
                                                         style="width: 253px ; height: 337px">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="/livre/{{$like->livre_id}}">
                                                    <img src="/{!! $like->image !!}" alt="" class="img-responsive"
                                                         style="width: 253px ; height: 337px">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/livre/{{$like->livre_id}}" class="invisible">
                                        <img src="/{!! $like->image !!}" alt="" class="img-responsive"
                                             style="width: 253px ; height: 337px">
                                    </a>
                                    <div class="text">
                                        <div class="row" style="height: 60px">
                                            <h3>{!! $like->nom !!}</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-2">
                                                <input id="{!! $like->livre_id !!}" value="{!! $like->rating !!}"
                                                       class="rating-loading">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <p class="price">${!! $like->prix !!}</p>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                            <?php
                            if ($i == 3)
                                break;
                            $i++;
                            ?>
                        @endforeach


                    </div>
                @endif


                <div class="box" id="list_comment">

                    <div id="comments" data-animate="fadeInUp">
                        <h4>{!! count($comments) !!} comments</h4>

                        @foreach($comments as $comment)
                            <div class="row comment ">
                                <div class="col-sm-3 col-md-2 text-center-xs">
                                    <p>
                                        <img src="/{!! $comment->avatar !!}" class="img-responsive img-circle" alt=""
                                             style="width: 105px ;height: 105px">
                                    </p>
                                </div>
                                <div class="col-sm-9 col-md-10">
                                    <h5>{!! $comment->user !!}</h5>
                                    <p class="posted" style="height: 8px"><i class="fa fa-clock-o"></i> September 23,
                                        2011 at 12:00 am</p>
                                    <input id="{!! $comment->commentaire_id!!}" value="{!! $comment->rating !!}"
                                           class="rating-loading">
                                    <p>{!! $comment->content !!}.</p>
                                    <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <!-- /#comments -->
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <div id="comment-form" data-animate="fadeInUp">

                            <h4>Leave comment</h4>

                            <form method="post"
                                  action="/comment/{!! \Illuminate\Support\Facades\Auth::user()->client_id !!}/{!! $livre->livre_id !!}/add">
                                {!! csrf_field() !!}
                                <input id="nv_comment" value="1" name="nv_comment"
                                       class="rating-loading">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">

                                            <textarea class="form-control" id="comment" rows="4"
                                                      name="content"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-primary"><i class="fa fa-comment-o"></i> Post comment
                                        </button>
                                    </div>
                                </div>


                            </form>

                        </div>
                    @endif

                </div>

            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
@stop
@section("script")
    <script>
        $(document).on('ready', function () {


            <?php if (\Illuminate\Support\Facades\Auth::check()) echo "var livres =" . $likes  ?>;
            <?php echo "var livre =" . $livre ?>;
            <?php echo "var comments =" . $comments ?>;

            if (typeof livres != 'undefined')
                for (var i = 0; i < livres.length; i++) {
                    $('#' + livres[i]["livre_id"]).rating({
                                size: 'sm',
                                disabled: true,
                                displayOnly: true
                            }
                    );
                }
            for (var i = 0; i < comments.length; i++) {
                $('#' + comments[i]["commentaire_id"]).rating({
                            size: 'xs',
                            disabled: true,
                            displayOnly: true
                        }
                );
            }
            $('#' + livre["livre_id"] + "d").rating({
                        size: 'md',
                        disabled: true,
                        displayOnly: true
                    }
            );
            $('#nv_comment').rating({
                        step: 1,
                        size: 'sm',
                        starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'},
                        starCaptionClasses: {
                            1: 'text-danger',
                            2: 'text-warning',
                            3: 'text-info',
                            4: 'text-primary',
                            5: 'text-success'
                        }
                    }
            );


        })
        ;
    </script>
@endsection