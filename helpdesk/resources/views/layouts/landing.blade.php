<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <title>Helpdesk</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/skins/_all-skins.css') }}" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

        <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('/js/smoothscroll.js') }}"></script>


    </head>

    <body data-spy="scroll" data-offset="0" data-target="#navigation">

        <!-- Fixed navbar -->
        <div class="page-header">
            <div class="row">
                <div class="col-lg-5">
                    <h1><strong>Siempre para el pueblo</strong>...<small>infocentros de Venezuela</small></h1>
                </div>
                <div class="col-lg-5 col-xs-push-2">
                    <img class="img-responsive" alt="Imagen responsive" src="img/animainfo.gif" height="100" width="800"/>
                </div>
            </div>
        </div>
        <div id="navigation" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b>Helpdesk</b></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#home" class="smoothScroll">Inicio</a></li> 
                        <li><a href="#showcase" class="smoothScroll">Soporte Técnico</a></li>     
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        <li><a  class="btn btn-default" href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
                        @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        
        <div id="showcase">
            <div class="container">
                <div class="row">
                    <h1 class="centered">Atención al Cliente.</h1>
                    <br>
                    <div class="col-lg-8 col-lg-offset-2">
                        <div id="carousel-example-generic" class="carousel slide">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('/img/image_1.png') }}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('/img/image_2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div><!-- /container -->
        </div>




        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-8">
                <img class="img-responsive" alt="Imagen responsive" src="img/footer1.png" height="100" width="800"/>
            </div>
            <div class="col-lg-3">  
            </div>
        </div>




        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script>
$('.carousel').carousel({
    interval: 3500
})
        </script>
    </body>
</html>
