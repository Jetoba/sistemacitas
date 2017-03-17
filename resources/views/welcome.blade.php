<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Responsive Bootstrap Landing Page Template">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Vitalyc</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="fonts/font-awesome.min.css" type="text/css" media="screen">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="css/material.min.css" rel="stylesheet">
    <link href="css/ripples.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <Link href = "https://file.myfontastic.com/yDauQVtFyBxnLvwmgreRsM/icons.css" rel = "stylesheet">
</head>

<body>



<div class="content-wrap">
    <header class="hero-area" id="home">

        <div class="container">
            <div class="col-md-12">

                <div class="navbar navbar-inverse sticky-navigation navbar-fixed-top" role="navigation" data-spy="affix" data-offset-top="200">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="logo-left " href="index.html"><i class="icon-logo-de-la-pagina-01"></i>Vitalyc</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contents text-right">
                <h1 class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">Vitalyc - Salud a distancia</h1>
                <p class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Registrate y solicita tu cita ¡Nuestros Medicos te esperan!</p>


                @if (Route::has('login'))
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" class="btn btn-lg btn-primary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">Home</a>
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-lg btn-primary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">Login</a>

                        <a href="{{ url('/register') }}" class="btn btn-lg btn-border wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">Registrar</a>
                    @endif
                @endif
            </div>
    </header>

    <section id="features" class="section">
        <div class="container">
            <div class="section-header">
                <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="100ms">Tu salud es nuestra garantia</h1>
                <h2 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Nos Caracterizamos por llegar a ti en donde quieras que estes</h2>
            </div>
            <div class="row">

                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="features">
                        <div class="icon">
                            <i class="mdi-action-settings"></i>
                        </div>
                        <div class="features-text">
                            <h4>Facil acesso</h4>
                            <p>
                                Contamos con un sistema de citas medicas de facil acceso desde tu casa.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
                    <div class="features">
                        <div class="icon">
                            <i class="mdi-action-done-all"></i>
                        </div>
                        <div class="features-text">
                            <h4>Rapido y Seguro</h4>
                            <p>
                                Apenas des click en enviar, nuestra secretaria te respondera al instante.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
                    <div class="features">
                        <div class="icon">
                            <i class="mdi-image-blur-linear"></i>
                        </div>
                        <div class="features-text">
                            <h4>Ahorra Tiempo</h4>
                            <p>
                                Ya no es necesario ir a nuestra hubicacion, nosotros llegamos a ti.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="650ms">
                    <div class="features">
                        <div class="icon">
                            <i class="mdi-communication-business"></i>
                        </div>
                        <div class="features-text">
                            <h4>Variedad de Especialidades</h4>
                            <p>
                                Tu dinos el area y nosotros te diremos con quien verte.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="750ms">
                    <div class="features">
                        <div class="icon">
                            <i class="mdi-action-favorite"></i>
                        </div>
                        <div class="features-text">
                            <h4>Area de Farmacia</h4>
                            <p>
                                Contamos con un area de Farmacia el cual te dara a ti la garantia de medicinas al instante
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="850ms">
                    <div class="features">
                        <div class="icon">
                            <i class="mdi-hardware-phonelink"></i>
                        </div>
                        <div class="features-text">
                            <h4>Donde quieras</h4>
                            <p>
                                Donde quieras, hasta con un movil podras solicitar tu cita ya que contamos con un sistema responsive
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="testimonial" class="section">
        <div class="container">
            <div class="section-header text-center wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms">
                <h1 class="section-title">Comentarios de nuestros pacientes</h1>
                <h2 class="section-subtitle">Ellos te garantizan lo que nosotros te proponemos</h2>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
                    <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#testimonial-carousel" data-slide-to="1"></li>
                            <li data-target="#testimonial-carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active text-center">
                                <p>Me gusto mucho el sistema ya que su accesibilidad te ahorra mucho tiempo, es facil y accessible, tanto que ahora son los unicos a los que me dirijo</p>
                                <div class="meta">
                                    <p>Paciente Roberto Darias</p>
                                </div>
                            </div>
                            <div class="item text-center">
                                <p>Estaba cansado de esperar a que la secretaria me respondiera en mi antiguo consultorio, ahora puedo mandar la cita sin estar esperando que
                                    me respondan por telefono</p>
                                <div class="meta">
                                    <p>Paciente Victor Vivas</p>
                                </div>
                            </div>
                            <div class="item text-center">
                                <p>Llevo a mis hijos desde que se creo el sistema, y me parece algo agil y novedoso por lo que
                                    se que mis hijos tendran para toda su vida la atencion que merecen</p>
                                <div class="meta">
                                    <p>Paciente Maurizio Ottaviani</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cta">
        <div class="container">
            <div class="row text-center">
                <h3 class="title-small wow bounce" data-wow-duration="1000ms" data-wow-delay="300ms">Entra y solicita tu cita</h3>



                    @if (Auth::check())
                        <a href="{{ url('/home') }}" class="btn btn-lg btn-border">Home</a>
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-lg btn-border">Login</a>
                @endif
            </div>
        </div>
    </section>
    <section id="counter" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="counter-item">
                        <div class="icon">
                            <i class="mdi-action-get-app"></i>
                        </div>
                        <h3 class="timer">16200</h3>
                        <hr>
                        <h5>
                            Citas
                        </h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                    <div class="counter-item">
                        <div class="icon">
                            <i class="mdi-action-face-unlock"></i>
                        </div>
                        <h3 class="timer">70</h3>
                        <hr>
                        <h5>
                            Medicos
                        </h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="700ms">
                    <div class="counter-item">
                        <div class="icon">
                            <i class="mdi-action-grade"></i>
                        </div>
                        <h3 class="timer">850</h3>
                        <hr>
                        <h5>
                            Citas al mes Aprox
                        </h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="counter-item">
                        <div class="icon">
                            <i class="mdi-action-trending-up"></i>
                        </div>
                        <h3 class="timer">18325</h3>
                        <hr>
                        <h5>
                            Pacientes
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="main-features" class="section">
        <div class="container">


            <div class="row">
                <div class="col-md-4 col-sm-4 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="img/features/fet2.png" class="img-responsive" alt="">
                </div>

                <div class="col-md-8 col-sm-8 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="feature-item">
                        <h3 class="title-small">
                            Mision
                        </h3>
                        <p>
                            La Clínica Vitalyc , situada en la urbanización Altamira, tiene 5 años brindando atención médica de alto nivel profesional a la sociedad, pues como lo reza su Junta Directiva "Su salud es lo más importante para nosotros y en un momento de emergencias o complicaciones, tiene que estar en manos de los mejores".
                        </p>
                        <p>
                            La asistencia, que significa el atender al paciente con la mejor calidad posible, respeto y ética profesional, que es lo que se busca y se inculca en el departamento.
                            La docencia, que implica la importancia de generar y compartir conocimiento a través de conferencias, cursos de actualización o refrescamiento.

                            La organización, que se refiere a la orientación de los temas que se deben tratar, o profundizar para difundirse, dada su recurrencia o impacto en la sociedad.

                            La investigación científica, la cual busca ampliar los conocimientos en cuanto a tratamientos, enfermedades y procedimientos.

                            La cultura, que promueve que todos quienes conforman la Clínica Vitalyc tengan acceso a información, no necesariamente sobre medicina, realizando conferencias sobre temas muy variados que enriquezcan a toda la comunidad.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id="other-features">
        <div class="container">
            <div class="section-header">
                <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">Especialidades</h1>
                <h2 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Nos especializamos para gente como tu</h2>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="400ms">
                    <div class="features-content">
                        <div class="icon hi-icon-effect-3b">
                            <i class="mdi-action-face-unlock"></i>
                        </div>
                        <h3>Pediatria</h3>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="features-content">
                        <div class="icon">
                            <i class="mdi-action-favorite"></i>
                        </div>
                        <h3>Cardiologia</h3>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="800ms">
                    <div class="features-content">
                        <div class="icon">
                            <i class="mdi-file-cloud-queue"></i>
                        </div>
                        <h3>Odontologia</h3>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <div class="features-content">
                        <div class="icon">
                            <i class="mdi-social-person-outline"></i>
                        </div>
                        <h3>Cirugia</h3>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="1200ms">
                    <div class="features-content">
                        <div class="icon">
                            <i class="mdi-action-grade"></i>
                        </div>
                        <h3>Ginecologia</h3>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="1400ms">
                    <div class="features-content">
                        <div class="icon">
                            <i class="mdi-action-visibility"></i>
                        </div>
                        <h3>Oftalmologia</h3>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="1600ms">
                    <div class="features-content">
                        <div class="icon">
                            <i class="mdi-communication-messenger"></i>
                        </div>
                        <h3>Dermatologia</h3>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp text-center" data-wow-duration="1000ms" data-wow-delay="1800ms">
                    <div class="features-content">
                        <div class="icon">
                            <i class="mdi-action-settings-power"></i>
                        </div>
                        <h3>Y mas</h3>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map-area">
        <div class="map">
            <iframe src="http://www.mapsdirections.info/crear-un-mapa-de-google/map.php?width=100%&height=600&hl=en&q=Caracas%2C%20Venezuela%2C%20Caracas%2C%20el%20nacional+(Vitalyc)&ie=UTF8&t=&z=14&iwloc=A&output=embed" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>


    <section id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="copyright-text">
                        <a class="social" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="social" href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a class="social" href="#" target="_blank"><i class="fa fa-google-plus"></i></a>

                        ©Vitalyc 2017 All right reserved.

                    </p>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ripples.min.js"></script>
<script src="js/material.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery.mmenu.min.all.js"></script>
<script src="js/count-to.js"></script>
<script src="js/jquery.inview.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/smooth-on-scroll.js"></script>
<script src="js/smooth-scroll.js"></script>
<script src="js/main.js"></script>



<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>

</body>

</html>
