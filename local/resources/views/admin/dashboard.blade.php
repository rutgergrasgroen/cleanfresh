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
		                    <ul class="timeline">
		                        <li>
		                            <div class="timeline-badge"><i class="fa fa-edit"></i>
		                            </div>
		                            <div class="timeline-panel">
		                                <div class="timeline-heading">
		                                    <h4 class="timeline-title">Paginabeheer</h4>
		                                    <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago</small>
		                                    </p>
		                                </div>
		                                <div class="timeline-body">
		                                    <p>Pagina: <b>Home</b> aangemaakt.</p>
		                                </div>
		                            </div>
		                        </li>
		                        <li class="timeline-inverted">
		                            <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
		                            </div>
		                            <div class="timeline-panel">
		                                <div class="timeline-heading">
		                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
		                                </div>
		                                <div class="timeline-body">
		                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem quibusdam, tenetur commodi provident cumque magni voluptatem libero, quis rerum. Fugiat esse debitis optio, tempore. Animi officiis alias, officia repellendus.</p>
		                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
		                                </div>
		                            </div>
		                        </li>
		                        <li>
		                            <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
		                            </div>
		                            <div class="timeline-panel">
		                                <div class="timeline-heading">
		                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
		                                </div>
		                                <div class="timeline-body">
		                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
		                                </div>
		                            </div>
		                        </li>
		                        <li class="timeline-inverted">
		                            <div class="timeline-panel">
		                                <div class="timeline-heading">
		                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
		                                </div>
		                                <div class="timeline-body">
		                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
		                                </div>
		                            </div>
		                        </li>
		                    </ul>
		                </div>
		                <!-- /.panel-body -->
	                </div>
	            </div>

	            <div class="col-lg-6">
		            <div class="panel panel-default">
		                <div class="panel-heading">
		                    <i class="fa fa-clock-o fa-fw"></i> Neem contact met ons op
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
