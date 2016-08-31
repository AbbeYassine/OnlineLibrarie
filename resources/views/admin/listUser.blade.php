@extends("admin.templateAdmin")
@section("content")
    <div class="right_col" role="main">

        <div class="x_panel">
            <div class="x_title">
                <h2>List User
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th style="display: {!! $affich !!}"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ?>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{!! $i !!}</th>
                            <td>{!! $user->first_name !!}</td>
                            <td>{!! $user->last_name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td style="display: {!! $affich !!}"><a href="delete/{!! $user->client_id !!}"><button type="button" class="btn btn-round btn-danger">Delete</button></a></td>

                        </tr>
                        <?php $i++ ?>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection