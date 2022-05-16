<style>
  .text-red-500 {
      font-size: 500;
      color: brown;
  }
  .graphql{
      color:#000000 !important;
      font-weight: bolder;
      font-size: 10ch; 
  }
  .laravel{
      color:#D50022 !important;
      font-weight: bolder;
      font-size: 10ch; 
  }
  .btn{
      border-radius: 0%;
  }
  .fixed{
      z-index: -3;
      margin-top: -670px;
  }
  .btn{
    border-radius: 0% !important;
  }

  .container{
position:relative;
  z-index: 3;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" align="center">
        <br>
           <h1 class="mt-5 graphql mb-4">Graphql Generator For</h1>
           <h1 class="laravel"> LARAVEL PHP Framework</h1>
          
        </div>

        <div class="col-md-8 mt-5" align="center">
          <h5>Before starting, I would like to thank everyone who inspires me to make this happen, and I want to thank the larval community for the support!
         </h5><h5>This project is an open source laravel project and this tool helps you generate a starting CRUD code for your laravel application that uses GraphQl Lighthouse.
        </h5><h5>You only have to do is to sign up and start a project! Every instruction is in the generated code.
          
          </h5>
          <hr>
          <a class="btn btn-danger btn-lg" href="/register">Start your project !</a> <a class="btn btn-outline-danger btn-lg" href="/login">Login !</a>
          <h6 class="mt-3">This is the link for the <a  target="_blank" href="https://github.com/zakariayacine/graphql-generator-tool">github project</a> rate it and contribute !
          </h6>
        </div>
    </div>
</div>
<section class="fixed" id="particles-js">
</section>
<script>
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 290,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#EA7CC5"
    },
    "shape": {
      "type": "triangle",
      "stroke": {
        "width": 0,
        "color": "#EA7CC5"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 6,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#e535ab",
      "opacity": 0.1,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 3,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": true,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "window",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 140,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 100,
        "duration": 2,
        "opacity": 3,
        "speed": 3
      },
      "repulse": {
        "distance": 100,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
</script>
@endsection