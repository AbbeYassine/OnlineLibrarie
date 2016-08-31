@extends("admin.templateAdmin")
@section("content")
    <div class="right_col" role="main">
        <div class="animated flipInY col-md-2">
            <div class="tile-stats">
                <div class="count">{!! $numberBooks !!}</div>
                <h3>Number Book Sold</h3>
            </div>
        </div>
        <div class="col-md-5">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Number Book By Language
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="graph_bar" style="width:100%; height:280px;"></div>
                </div>
            </div>
        </div>

        <!-- pie chart -->
        <div class="col-md-5">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Number Book By Type
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content2">
                    <div id="graph_donut" style="width:100%; height:300px;"></div>
                </div>
            </div>
        </div>
        <!-- /Pie chart -->
    </div>

    @endsection

    @section("script")
            <!-- morris.js -->
    <script>
        <?php echo "var data1 = ".$data."\n" ; ?>
        <?php echo "var data2 = ".$typeLivre."\n" ; ?>

        console.log(data1);
        console.log(data2);
        $(document).ready(function () {
            Morris.Bar({
                element: 'graph_bar',
                data: data1,
                xkey: 'langue',
                ykeys: ['number'],
                labels: ['number'],
                barRatio: 0.4,
                barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                xLabelAngle: 35,
                hideHover: 'auto',
                resize: true
            });


            $MENU_TOGGLE.on('click', function () {
                $(window).resize();
            });
            Morris.Donut({
                element: 'graph_donut',
                data: data2,
                colors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                formatter: function (y) {
                    return y + "%";
                },
                resize: true
            });
        });
    </script>
    <!-- /morris.js -->
@endsection