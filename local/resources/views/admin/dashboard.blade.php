@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Welkom {{ $user->name }}</h1>
			<p>Clean & Fresh CMS is de meest gebruiksvriendelijke en simpele manier om uw website te beheren. Uw CMS is uitgerust met de modules die u in de navigatiebalk boven in het scherm ziet. Heeft u behoefte aan meer of specifiekere modules? Aarzel dan niet om contact met ons op te nemen.</p>
            <p>&nbsp;</p>
            <div class="row">

            	<div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">&nbsp;</div>
                                    <div>&nbsp;</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/cfadmin/Stats') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Statistieken bekijken</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>Aangemaakte pagina's</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/cfadmin/Pages') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Pagina overzicht</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">2</div>
                                    <div>Aangemaakte formulieren</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/cfadmin/Forms') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Formulieren overzicht</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-image fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Geplaatste media bestanden</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Media overzicht</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <p>&nbsp;</p>

            <div class="row">

	            <div class="col-lg-6">
		            <div class="panel panel-default">
		                <div class="panel-heading">
		                    <i class="fa fa-clock-o fa-fw"></i> Laatste wijzigingen
		                </div>
		                <!-- /.panel-heading -->
		                <div class="panel-body">

                            @if (count($changes) == 0)

                                Er zijn op dit moment nog geen veranderingen gemaakt.

                            @else

    		                    <ul class="timeline">

                                    @foreach($changes as $key => $change)

                                        @if ($key % 2 == 0)
                                            <li>
                                        @else
                                            <li class="timeline-inverted">
                                        @endif 

                                            @if ($change->module == "pagina")
                                                <div class="timeline-badge primary"><i class="fa fa-edit"></i></div>
                                            @endif 

                                            @if ($change->module == "formulier")
                                                <div class="timeline-badge warning"><i class="fa fa-envelope-o"></i></div>
                                            @endif
                                            
                                            @if ($change->module == "media")
                                                <div class="timeline-badge danger"><i class="fa fa-image"></i></div>
                                            @endif

        		                            <div class="timeline-panel">
        		                                <div class="timeline-heading">
        		                                    <h4 class="timeline-title">{{ $change->module }}</h4>
        		                                    <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{ $change->created_at->diffForHumans() }}</small></p>
        		                                </div>
        		                                <div class="timeline-body">
        		                                    <p>{!! $change->description !!}</p>
        		                                </div>
        		                            </div>
        		                        </li>

                                    @endforeach

    		                    </ul>

                            @endif
                            
		                </div>
		                <!-- /.panel-body -->
	                </div>
	            </div>

	            <div class="col-lg-6">
		            <div class="panel panel-default">
		                <div class="panel-heading">
		                    <i class="fa fa-envelope-o fa-fw"></i> Neem contact met ons op
		                </div>
		                <div class="panel-body">		                	
		                	<p>Loopt u tegen een probleem aan, heeft u een vraag over uitbreidingen voor uw CMS of wilt u meer informatie? Gebruik onderstaand formulier om contact met ons op te nemen.</p>
		                </div>            
		            </div>
		        </div>

	        </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
@endsection
