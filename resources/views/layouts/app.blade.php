<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                @auth // The user is authenticated
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('home') }}">Pagrindinis</a></li>
                        <li class="active"><a href="{{ route('members.index') }}">Nariai</a></li>
                        <li class="active"><a href="{{ route('visits.index') }}">Lankymo žurnalas</a></li>
                        <li class="active"><a href="{{ route('members.create') }}">Naujas narys</a></li>
                        <li class="active"><a href="{{ route('memberships.index') }}">Narystės planai</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" >
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <form class="navbar-form navbar-left" method="GET" action="/validateMembership" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="search" autofocus>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                    <a href="{{ route('payments.create') }}" class="btn btn-danger navbar-btn">Naujas mokėjimas</a>
                @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @auth
          @yield('content')
          @else
          @yield('login')
        @endauth

    </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>


    <script type="text/javascript">
    Date.prototype.customFormat = function(formatString){
    var YYYY,YY,MMMM,MMM,MM,M,DDDD,DDD,DD,D,hhhh,hhh,hh,h,mm,m,ss,s,ampm,AMPM,dMod,th;
    YY = ((YYYY=this.getFullYear())+"").slice(-2);
    MM = (M=this.getMonth()+1)<10?('0'+M):M;
    MMM = (MMMM=["January","February","March","April","May","June","July","August","September","October","November","December"][M-1]).substring(0,3);
    DD = (D=this.getDate())<10?('0'+D):D;
    DDD = (DDDD=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"][this.getDay()]).substring(0,3);
    th=(D>=10&&D<=20)?'th':((dMod=D%10)==1)?'st':(dMod==2)?'nd':(dMod==3)?'rd':'th';
    formatString = formatString.replace("#YYYY#",YYYY).replace("#YY#",YY).replace("#MMMM#",MMMM).replace("#MMM#",MMM).replace("#MM#",MM).replace("#M#",M).replace("#DDDD#",DDDD).replace("#DDD#",DDD).replace("#DD#",DD).replace("#D#",D).replace("#th#",th);
    h=(hhh=this.getHours());
    if (h==0) h=24;
    if (h>12) h-=12;
    hh = h<10?('0'+h):h;
    hhhh = hhh<10?('0'+hhh):hhh;
    AMPM=(ampm=hhh<12?'am':'pm').toUpperCase();
    mm=(m=this.getMinutes())<10?('0'+m):m;
    ss=(s=this.getSeconds())<10?('0'+s):s;
    return formatString.replace("#hhhh#",hhhh).replace("#hhh#",hhh).replace("#hh#",hh).replace("#h#",h).replace("#mm#",mm).replace("#m#",m).replace("#ss#",ss).replace("#s#",s).replace("#ampm#",ampm).replace("#AMPM#",AMPM);
    };
    </script>
    <script type="text/javascript">

        $(document).ready(function(){
          $(document).on('change', '.memberships', function() {
            console.log('Pasikeite');

            var membership_id = $(this).val();
            console.log(membership_id);

            $.ajax({
              type:'GET',
              url:'{!! URL::to('membership') !!}',
              data:{'id':membership_id},
              success:function(data) {
                $('#price').val(data[0].price);
                $( "#expiry_date" ).removeClass().addClass( 'form-control vd' + data[0].valid_days );
              }
            });
          });
        });

        $(function() {
          $('#start_date').datetimepicker({
            locale: 'lt',
            format: 'YYYY-MM-DD',
            minDate: moment()
          });

        });
        $('#start_date').on('dp.change', function (e){
          endDate = new Date(e.date);

          var valid_days = $('#expiry_date').attr("class");
          var vdays = valid_days.substring(15);
          vdays = parseInt(vdays);
          endDate.setDate(endDate.getDate() + vdays);
          var expiry_date = endDate.customFormat("#YYYY#-#MM#-#DD#");
          $("#expiry_date").val(expiry_date)
         })


    </script>

<!-- Modal -->
    <div id="confirm-delete-dialog" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ištrynimo patvirtinimas</h4>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Taip</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ne</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#confirm-delete-dialog').on('show.bs.modal', function (event) {
            var el = $(event.relatedTarget); // Element that triggered the modal
            var name = el.data('name'); // Extract info from data-* attributes
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('.modal-body p').text('Ar tikrai norite ištrinti ' + name + ' ?');
            modal.find('.modal-footer .btn-primary').on('click', function (event) {
                el.next().submit();
            });
        });
    </script>
</body>
</html>
