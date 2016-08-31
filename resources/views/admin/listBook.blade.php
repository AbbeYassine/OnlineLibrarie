@extends("admin.templateAdmin")
@section("content")
    <div class="right_col" role="main">

        <div class="x_panel">
            <div class="x_title">
                <h2>List Book
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantité</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @foreach($livres as $livre)
                        <tr>
                            <th scope="row">{!! $i !!}</th>
                            <td>{!! $livre->nom !!}</td>
                            <td>{!! $livre->prix !!}</td>
                            <td>{!! $livre->quantite_stock !!}</td>
                            <td>{!! $livre->libelle  !!}</td>
                            <td><a href="deleteBook/{!! $livre->livre_id !!}"><button type="button" class="btn btn-round btn-danger">Delete</button></a></td>

                        </tr>
                        <?php $i++ ?>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection