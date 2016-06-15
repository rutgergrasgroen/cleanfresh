@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header">Statistieken</h1>

            <form role="form" method="POST" action="" name="filter">
                {!! csrf_field() !!}
                <fieldset class="row">
                    <div class="form-group col-lg-2">
                        <select class="form-control" name="month" onchange="filter.submit()">
                            @foreach($months as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-2">
                        <select class="form-control" name="year" onchange="filter.submit()">
                            @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
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

                        });

                    </script>
                
                @stop

                <div class="col-lg-6">
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

            </div>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    
@endsection
