<link type="text/css" rel="stylesheet" href="{{url('/materialize/css/materialize.min.css')}}"  media="screen,projection"/>
<title>Access Denied</title>
  <div class="title">
    <div class="logo">
    </div>
    <div class="text">
      403 Access Denied
      <a href ="javascript:history.back()"" class="waves-effect waves-light btn as">Kembali</a>
    </div>

  </div>

<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Raleway:400,300,500,200);
body {
  background-color: white;
}
.as{
  font-size: 12pt;
}
.title {
  font-family: Raleway;
  width: 400px;
  height: 350px;
  z-index: 3;
  top: 50%;
  margin-top: -175px;
  left: 47%;
  margin-left: -140px;
  position: absolute;
  color: #fff;
  text-align: center;
  transition: all 1000ms;
}


.title .text {
  font-size: 35px;
  font-weight: 300;
  margin-top: 20px;
  color: #f44336;
}

.logo {
  background: url(/logo.png);
  width: 180px;
  height: 180px;
  left: 50%;
  position: relative;
  margin-left: -90px;
  margin-top: 10px;
  background-size: 180px;
}
@media only screen and (max-width: 992px) {
  .title{
    width: 100%;
  }
  .logo{

  }
  }
</style>