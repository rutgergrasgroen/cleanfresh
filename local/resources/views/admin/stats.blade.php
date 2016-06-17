@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header">Statistieken {{ $filterYear }} {{ $filterMonth }}</h1>

            <form role="form" method="POST" action="" name="filter">
                {!! csrf_field() !!}
                <fieldset class="row">
                    <div class="form-group col-lg-2">
                        <select class="form-control" name="month" onchange="filter.submit()">
                            @foreach($months as $month)
                                <option  
                                @if($filterMonth == $month)
                                    selected
                                @endif
                                value="{{ $month }}">{{ $monthsArray[$month] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-2">
                        <select class="form-control" name="year" onchange="filter.submit()">
                            @foreach($years as $year)
                                <option 
                                @if($filterYear == $year)
                                    selected
                                @endif 
                                value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>
            </form>

            <div class="row">

                @section('page-scripts')

                    <script src="{{ asset('/local/public/assets/js/raphael.min.js') }}"></script>
                    <script src="{{ asset('/local/public/assets/js/morris.min.js') }}"></script>

                    <script type="text/javascript">

                        $(document).ready(function(){

                            Morris.Line({
                                element: 'unieke-bezoekers',
                                data: [
                                    @foreach($data['visitors'] as $key => $value)
                                        { 
                                            day: '{{ $key+1 }}', 
                                            pageviews: {{ $value['pageViews'] }}, 
                                            visitors: {{ $value['visitors'] }} 
                                        },
                                    @endforeach
                                ],
                                xkey: 'day',
                                ykeys: ['pageviews', 'visitors'],
                                labels: ['Pageviews', 'Visitors'],
                                xLabels: 'days',
                                pointSize: 2,
                                hideHover: 'auto',
                                resize: true,
                                parseTime: false
                            });

                            Morris.Bar({
                                element: 'keywords',
                                data: [
                                    @foreach($data['keywords'] as $key => $value)
                                        { 
                                            keyword: '{{ $value['keyword'] }}', 
                                            sessions: {{ $value['sessions'] }}
                                        },
                                    @endforeach
                                ],
                                xkey: 'keyword',
                                ykeys: ['sessions'],
                                labels: ['sessions'],
                                xLabels: 'days',
                                hideHover: 'auto',
                                resize: true,
                                stacked: true
                            });

                            Morris.Bar({
                                element: 'referrers',
                                data: [
                                    @foreach($data['referrers'] as $key => $value)
                                        { 
                                            url: '{{ $value['url'] }}', 
                                            pageViews: {{ $value['pageViews'] }}
                                        },
                                    @endforeach
                                ],
                                xkey: 'url',
                                ykeys: ['pageViews'],
                                labels: ['pageViews'],
                                xLabels: 'days',
                                hideHover: 'auto',
                                resize: true,
                                stacked: false
                            });

                            Morris.Donut({
                                element: 'browsers',
                                data: [
                                    @foreach($data['browsers'] as $key => $value)
                                        { 
                                            label: '{{ $value['browser'] }}', 
                                            value: {{ $value['sessions'] }}
                                        },
                                    @endforeach
                                ]
                            });

                            Morris.Bar({
                                element: 'pages',
                                data: [
                                    @foreach($data['pages'] as $key => $value)
                                        { 
                                            url: '{{ $value['url'] }}', 
                                            pageViews: {{ $value['pageViews'] }}
                                        },
                                    @endforeach
                                ],
                                xkey: 'url',
                                ykeys: ['pageViews'],
                                labels: ['pageViews'],
                                xLabels: 'days',
                                hideHover: 'auto',
                                resize: true,
                                stacked: true,
                                horizontal: true
                            });

                        });

                    </script>
                
                @stop

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Unieke bezoekers & pagina views
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="unieke-bezoekers"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Zoekwoorden
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="keywords"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Verwijzigingen
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="referrers"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Browsers
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="browsers"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pagina's
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="pages"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

            </div>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    
@endsection
