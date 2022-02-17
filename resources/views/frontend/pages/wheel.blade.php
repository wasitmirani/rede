@extends('layouts.wheellayout')
@section('style')
<style>
	* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  outline: none;
}


.mainbox {
  position: relative;
  width: 500px;
  height: 500px;
}

.mainbox:after {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background: url(./arrow-bottom.png) no-repeat;
  background-size: 5%;
  left: 5%;
  top: 48%;
  transform: rotate(90deg);
}

.box {
  width: 100%;
  height: 100%;
  position: relative;
  border-radius: 50%;
  border: 10px solid #949090;
  overflow: hidden;
  transition: all ease-in-out 5s;
  transform: rotate(90deg);
}

span {
  width: 100%;
  height: 100%;
  display: inline-block;
  position: absolute;
}

.span1 {
  clip-path: polygon(0 17%, 0 50%, 50% 50%);
  background-color: green;
}

.span2 {
  clip-path: polygon(0 17%, 30% 0, 50% 50%);
  background-color: red;
}

.span3 {
  clip-path: polygon(30% 0, 71% 0, 50% 50%);
  background-color: blue;
}

.span4 {
  clip-path: polygon(71% 0, 100% 18%, 50% 50%);
  background-color: salmon;
}

.span5 {
  clip-path: polygon(100% 18%, 100% 50%, 50% 50%);
  background: #ff8300;
}

.box2 .span3 {
  background-color: #00ff04;
}

.box2 {
  width: 100%;
  height: 100%;
  transform: rotate(180deg);
}

.font {
  color: white;
  font-size: 20px;
}

.box1 .span1 b {
  position: absolute;
  top: 39%;
  right: 60%;
  transform: rotate(200deg);
  text-align: center;
}

.box1 .span2 b {
  position: absolute;
  top: 25%;
  right: 57%;
  transform: rotate(-130deg);
}

.box1 .span3 b {
  position: absolute;
  top: 20%;
  right: 36%;
  transform: rotate(-90deg);
}

.box1 .span4 b {
  position: absolute;
  top: 25%;
  right: 15%;
  transform: rotate(-45deg);
}

.box1 .span5 b {
  position: absolute;
  top: 38%;
  right: 10%;
  transform: rotate(-15deg);
  text-align: center;
}

.box2 .span1 b {
  position: absolute;
  top: 34%;
  right: 70%;
  transform: rotate(200deg);
}

.box2 .span2 b {
  position: absolute;
  top: 20%;
  right: 60%;
  transform: rotate(-130deg);
  text-align: center;
}

.box2 .span3 b {
  position: absolute;
  top: 15%;
  right: 40%;
  transform: rotate(270deg);
}

.box2 .span4 b {
  position: absolute;
  top: 27%;
  right: 20%;
  transform: rotate(310deg);
}

.box2 .span5 b {
  position: absolute;
  top: 35%;
  right: 10%;
  transform: rotate(-20deg);
  text-align: center;
}

.spin {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 75px;
  height: 75px;
  border-radius: 50%;
  border: 4px solid white;
  background-color: #ff5722;
  color: #fff;
  box-shadow: 0 5px 20px #000;
  font-weight: bold;
  font-size: 22px;
  cursor: pointer;
  z-index: 1000;
}

.spin:active {
  width: 70px;
  height: 70px;
  font-size: 20px;
}

.mainbox.animate:after {
  animation: animateArrow 0.7s ease infinite;
}

audio {
  display: none;
}

@keyframes animateArrow {
  50% {
    right: -50px;
  }
}

@media (max-width: 576px) {
  .mainbox {
    width: 100%;
    height: 50%;
  }
}

</style>
@endsection
@section('content')

   <div class="container-fluid">
    <div class="col-12">
       <div class="row">
        <div class="jquery-script-clear"></div>
</div>
</div>
    <div class="mainbox" id="mainbox">
      <div class="box" id="box">
        <div class="box1">
          <span class="font span1"><b>Samsung Tab A6</b></span>
          <span class="font span2"><b>JBL Speaker</b></span>
          <span class="font span3"><b>Magic Roaster</b></span>
          <span class="font span4"><b>Sepeda Aviator</b></span>
          <span class="font span5"
            ><b
              >Rice Cooker <br />
              Philips</b
            ></span
          >
        </div>
        <div class="box2">
          <span class="font span1"><b>Lunch Box Lock&Lock</b></span>
          <span class="font span2"
            ><b
              >Air Cooler <br />
              Sanken</b
            ></span
          >
          <span class="font span3"><b>Ipad Mini 4</b></span>
          <span class="font span4"><b>Exclusive Gift</b></span>
          <span class="font span5"
            ><b
              >Electrolux <br />
              Blender</b
            ></span
          >
        </div>
      </div>
      <button class="spin" onclick="spin()">SPIN</button>
    </div>
    <audio
      controls="controls"
      id="applause"
      src="./applause.mp3"
      type="audio/mp3"
    ></audio>
    <audio
      controls="controls"
      id="wheel"
      src="./wheel.mp3"
      type="audio/mp3"
    ></audio>

           </div>
       </div>
   </div>

@endsection
@section('scripts')

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/wheelscript.js') }}" ></script>
    <script src="script.js"></script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
@endsection
