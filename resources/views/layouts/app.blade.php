  <!DOCTYPE html>
  <html>
    <head>
      <link href="{{url('/css/icon.css') }}" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="{{url('/materialize/css/materialize.min.css') }}"  media="screen,projection"/>
       <link rel="shortcut icon" href="{{{ asset('/logo1.png') }}}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="background:#F5F8FA">
    <div class="navbar-fixed">
     <nav>
    <div class="nav-wrapper black-text" style="background: #fff">
  <img class="brand-logo responsive-img nana" src="/logo4.png">
      <ul class="right hide-on-med-and-down">
        <li><a href="{{ url('/login') }}" class="waves-effect waves-light warna tooltipped" data-position="bottom" data-delay="50" data-tooltip="Login"><i class="material-icons left">input</i>Login</a></li>
        <li><a href="{{ url('/register') }}" class="waves-effect waves-light warna tooltipped" data-position="bottom" data-delay="50" data-tooltip="Register"><i class="material-icons left">person_add</i>Register</a></li>
      </ul>
    </div>
      </nav>
    </div>
@yield('content')
      <script type="text/javascript" src="{{url('/js/jquery-2.1.1.min.js')}}"></script>
      <script type="text/javascript" src="{{url('/js/jquery.mask.min.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxcore.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxdata.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxtree.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxcheckbox.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxmaskedinput.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxnumberinput.js')}}"></script>
      <script type="text/javascript" src="{{url('/jqwidgets/jqxbuttons.js')}}"></script>
      <script type="text/javascript" src="{{url('/materialize/js/materialize.min.js') }}"></script>
      <script type="text/javascript" src="{{url('/ckeditor/ckeditor.js')}}"></script>
        <script type="text/javascript">

           $('.button-collapse').sideNav({
      menuWidth: 270, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
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
    $(document).ready(function() {
    $('select').material_select();
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
 function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;
return true;
}
var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var date = new Date();
var day = date.getDate();
var month = date.getMonth();
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
document.getElementById("tanggal_join").weite(day + " " + months[month] + " " + year);
//-->
      </script>
<script type="text/javascript">
  
</script>
 <script type="text/javascript">
    $(document).ready(function(){
    $('.phone_us').mask('000000000000');
    });
</script>
    </body>
  </html>