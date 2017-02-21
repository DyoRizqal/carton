 <!DOCTYPE html>
  <html>
    <head>
      <link href="{{url('/css/icon.css') }}" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="{{url('/materialize/css/materialize.min.css')}}"  media="screen,projection"/>
      <link rel="stylesheet" href="{{url('fa/css/font-awesome.min.css')}}">
      <link rel="shorcut icon" href="{{url('../logo.png')}}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script type="text/javascript" src="{{url('/js/jquery-2.1.1.min.js')}}"></script>
      <script type="text/javascript" src="{{url('/js/jquery.mask.min.js')}}"></script><!-- 
      <script type="text/javascript" src="{{url('/jqwidgets/jqxcore.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxdata.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxtree.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxcheckbox.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxmaskedinput.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxnumberinput.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxbuttons.js')}}"></script> -->
      <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    </head>

    <body style="background:#F5F8FA">
    @php
      $count = \App\Artikel::where('status','waiting')->get();
      session()->put('count',count($count));

      $count1 = \App\Artikel::where('status','waiting')->where('id_user',Auth::user()->id)->get();
      session()->put('count1',count($count1));
    @endphp
    <div class="navbar-fixed">
     <nav style="box-shadow: none;">
      

    <div class="nav-wrapper black-text" style="background: #fff;">

      <a class="brand-logo nana" style="font-family: Dolce Vita;color: #f44336;font-weight: bold;" href="{{route('home')}}"> CartOn</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{route('home')}}" class="waves-effect waves-light warna tooltipped" data-position="bottom" data-delay="50" data-tooltip="Dashboard"><i class="material-icons">dashboard</i></a></li>
        <!-- <li><a href="#" class="waves-effect waves-light warna tooltipped" data-position="bottom" data-delay="50" data-tooltip="Profile"><i class="material-icons">view_module</i></a></li> -->
           @if(Auth::user()->type!='user')
          <li><a href="{{route('waiting')}}" class="waves-effect waves-light warna tooltipped" data-position="bottom" data-delay="50" data-tooltip="Permintaan Persetujuan"><i class="material-icons @if(session('count')) left @endif">hourglass_empty</i>
            @if(session('count'))
              <span class="new badge blue white-text">{{ session()->get('count') }}</span>
            @endif
              </a></li>
            @else
             <li><a href="{{route('request')}}" class="waves-effect waves-light warna tooltipped" data-position="bottom" data-delay="50" data-tooltip="Menunggu Persetujuan"><i class="material-icons @if(session('count1')) left @endif">hourglass_empty</i>
            @if(session('count1'))
          <span class="new badge black-text" style="background: #ffd54f;" data-badge-caption="{{ session()->get('count1') }}"></span>
          @endif
        </a></li>
        @endif
        <li style="cursor: pointer;background: #fff" class=""><img class="circle dropdown-button responsive-img waves-effect waves-light warna" data-activates="dropdown1" style="width: 40px;height:39px;margin-top: 2px;margin:10px" src="{!!url('/file/foto/'.Auth::user()->foto)!!}"></li>
         <ul id="dropdown1" style="font-family:segoe UI;" class="dropdown-content">
    <li><a href="{{route('profile')}}" style="text-align: center;">{{Auth::user()->name}}</a></li>
    <li class="divider"></li>
   
    <li><a href="{{route('settings')}}" style="width: 160px" class="waves-effect waves-light"><i class="material-icons left">settings</i>Setting</a></li>
    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="width: 160px" class="waves-effect waves-light"><i class="material-icons left">exit_to_app</i>Logout</a></li>
    
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
  </ul>
      </ul>
  <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="material-icons">menu</i></a>
    </div>
    </nav>
  </div>
    <ul id="slide-out" class="side-nav" style="font-family: segoe UI;font-weight: lighter;">
    <li>

    <div class="userView">
      <!-- <div class="background">
        <img src="{{Auth::user()->sampul}}" style="width: 100%;height: 100%">
      </div> -->
      <img class="responsive-img" src="{!!url('/file/foto/'.Auth::user()->foto)!!}">
      <a href="#!name"><span class="name" style="font-size:20px;font-weight: bold;margin-bottom:20px; ">{{Auth::user()->name}}</span></a>
       @if(Auth::user()->jenis_kelamin == 'Laki-Laki')
        <i class="fa fa-male na" style="font-size: 17pt;margin-left: 5px;margin-right: 21px;" aria-hidden="true"></i><span class="de">{{Auth::user()->jenis_kelamin}}</span><br>
        @else
        <i class="fa fa-female na" style="font-size: 16pt;margin-left: 5px;margin-right: 20px;" aria-hidden="true"></i>{{Auth::user()->jenis_kelamin}}<br>
        @endif
      <a href="#!email"><i class="material-icons left">date_range</i><span class="email">Joined on {{Auth::user()->tanggal_join}}</span></a>
      <a href="#!email"><i class="material-icons left">mail_outline</i><span class="email">{{Auth::user()->email}}</span></a>
      <a href="#!gender"><i class="material-icons left">phone</i><span class="email">{{Auth::user()->no_telp}}</span></a>
      <div class="chip col s12 center" style="margin-top: 10px;width:100%;font-size: 15pt">
      {{ count($iklan) }} Iklan
      </div>
      <div class="divider"></div>
      </div>
      </li>
        <li><a href="/home" class="waves-effect waves-light warna" id="jas"><i class="material-icons" id="jas">av_timer</i>Dashboard</a></li>
        <li><a href="/profile" class="waves-effect waves-light warna" id="jas"><i class="material-icons">account_circle</i>Profile</a></li>
          @if(Auth::user()->type=='admin')
        <li><a href="{{route('waiting')}}" class="waves-effect waves" id="jas"><i class="material-icons left">hourglass_empty</i>Permintaan
        @if(session('count'))
          <div class="chip blue white-text">
            {{ session()->get('count') }} 
          </div>
        @endif
        </a></li>
        @endif
        <li><a href="{{route('settings')}}" class="waves-effect waves-light warna" id="jas"><i class="material-icons">settings</i>Setting</a></li>
        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" id="jas" class="waves-effect waves-light"><i class="material-icons left">exit_to_app</i>Logout</a></li>
    
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
  </ul>

    @yield('content')
     <!-- </body> -->
      <!--Import jQuery before materialize.js-->

      <script type="text/javascript">CKEDITOR_BASEPATH = "{{ url('/ckeditor/') }}";
      CKEDITOR.replace('content', {toolbar : 'standard',width : '99%',height : '300px'});</script>
      <script type="text/javascript" src="{{url('/materialize/js/materialize.min.js') }}"></script>

      <script type="text/javascript">
      (function(){
        $('#provinsi').on('change', function(){
          $.ajax({
            url : '{{url('api/daftar_kabupaten')}}/'+this.value,
            type: 'get',
            success : function(data){
              console.log(data);
              $("#kabupaten").html("");
              $.each(data.kabupaten, function(index, value){
                $('#kabupaten').append('<option value="'+value.Nama+'">'+value.Nama+'</option>')
              });
              $("#kabupaten").material_select();
            }
          })
        });
      }())

      $(document).ready(function () {
      var ckbox = $('#test5');

    $('input').on('click',function () {
        if (ckbox.is(':checked')) {
            document.getElementById("soldout").className = "waves-effect waves-light btn";
        } else {
            document.getElementById("soldout").className = "waves-effect waves-light btn disabled";
        }
        });
    });
               $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
          $(document).ready(function() {
              $('.carousel').carousel();
          })
      </script>

      <script type="text/javascript">
      $(document).ready(function(){
      $('.money').mask('000.000.000.000.000', {reverse: true});
      });
    $(document).ready(function(){
      $('.button-collapse').sideNav({
          menuWidth: 270, // Default is 240
          edge: 'left', // Choose the horizontal origin
          closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
          draggable: true // Choose whether you can drag to open on touch screens
        }
      );
    });
    // $(".for_numberinput").jqxNumberInput({ enableMouseWheel:true,spinMode:'simple',digits:12, max:999999999999999999999999999999999,symbol:'Rp. '});
    // $('#selling_limit_div').on('valueChanged', function (event) {$('#selling_limit').val(event.args.value);}); 
    // $('#selling_limit_div').on('valueChanged', function (event) {$('#selling_limit1').val(event.args.value);}); 
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );
      $(document).ready(function(){
    $('.collapsible').collapsible();
  });
        $('#textarea1').val('');
  $('#textarea1').trigger('autoresize');
      $(document).ready(function() {
    $('select').material_select();
    // $('select').material_select('destroy');
  });
     function gender1() {
    var x = document.getElementById("gender").value;
    if(x=="Laki-Laki"){
      document.getElementById("gender2").value = "cowo.png" ;
    }
    else{
      document.getElementById("gender2").value = "cewe.png";  
    }    
}
 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100 // Creates a dropdown of 15 years to control year
  });

      </script>
      <style type="text/css">
        span.card-title{
          font-size: 12pt;
        }
        .nana{
          margin-left: 30px;
        }
        #dropdown1{
          margin-top: 65px;
          margin-left: 18px;
        }

        @media only screen and (max-width: 992px) {
        .nana{
          width: 125px;
          margin-left: 20px;
        }
        #jas:hover{
          color: white;
        }
        }
      </style>
   
  </html>