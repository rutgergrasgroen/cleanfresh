@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header">Statistieken</h1>

            <div class="row">

                @section('page-scripts')

                    <script src="{{ asset('/local/public/assets/js/raphael.min.js') }}"></script>
                    <script src="{{ asset('/local/public/assets/js/morris.min.js') }}"></script>

                    <script type="text/javascript">

                        $(document).ready(function(){

                            Morris.Line({
                                element: 'unieke-bezoekers',
                                data: [
                                    { year: '2008', value: 20 },
                                    { year: '2009', value: 10 },
                                    { year: '2010', value: 5 },
                                    { year: '2011', value: 5 },
                                    { year: '2012', value: 20 }
                                ],
                                xkey: 'year',
                                ykeys: ['value'],
                                labels: ['Value'],
                                pointSize: 2,
                                hideHover: 'auto',
                                resize: true
                            });

                        });

                    </script>
                
                @stop

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Unieke bezoekers
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
