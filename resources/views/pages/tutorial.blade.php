@extends('layouts.app') 
@section('content')
<!-- VIDEO TUTORIAL PAGE-->
<main style="margin-top:17vh;">
  <h1>Video Instructions</h1>
  <div class="topic">
    <div class="open">
      <h2 class="question">HOME PAGE<span class="ptag"></span></h2>
      <span class="faq-t"></span>
    </div>
    <p class="answer"><iframe width="560" height="315" src="https://www.youtube.com/embed/lwGhM29SPVo" 
       frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
       allowfullscreen></iframe>
    </p>
  </div>

  <div class="topic">
    <div class="open">
      <h2 class="question">INFO PAGE<span class="ptag"></span></h2>
      <span class="faq-t"></span>
    </div>
    <p class="answer"><iframe width="560" height="315" src="https://www.youtube.com/embed/grlLt56eftM" 
       frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
       allowfullscreen></iframe>
    </p>
  </div>

  <div class="topic">
    <div class="open">
      <h2 class="question">ADMIN PAGE<span class="ptag"></span></h2>
      <span class="faq-t"></span>
    </div>
    <p class="answer"><iframe width="560" height="315" src="https://www.youtube.com/embed/SdLqoBYHHys" 
      frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen></iframe>
      </p>
  </div>

  <div class="topic">
    <div class="open">
      <h2 class="question">LIST OF USERS PAGE<span class="ptag"></span></h2>
      <span class="faq-t"></span>
    </div>
    <p class="answer"><iframe width="560" height="315" src="https://www.youtube.com/embed/VvBRW3Omy2M" 
       frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
       allowfullscreen></iframe></p>
  </div>

  <div class="topic">
    <div class="open">
      <h2 class="question">APPOINTMENTS PAGE<span class="ptag"></span></h2>
      <span class="faq-t"></span>
    </div>
    <p class="answer"><iframe width="560" height="315" src="https://www.youtube.com/embed/lfOrIut1qhw" 
       frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
       allowfullscreen></iframe></p>
  </div>
  <div class="topic">
    <div class="open">
      <h2 class="question">PATIENT DETAIL PAGE </h2><span class="faq-t"></span>
    </div>
    <p class="answer"><iframe width="560" height="315" src="https://www.youtube.com/embed/rFN2bqWew4o" 
       frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
       allowfullscreen></iframe></p>
  </div>
  <div class="topic">
    <div class="open">
      <h2 class="question">PATIENT INDEX PAGE</h2><span class="faq-t"></span>
    </div>
    <p class="answer"><iframe width="560" height="315" src="https://www.youtube.com/embed/PYG9zvzjsWE" 
       frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
       allowfullscreen></iframe></p>
  </div>
  <div class="topic">
    <div class="open">
      <h2 class="question">RESULTS PAGE</h2><span class="faq-t"></span>
    </div>
    <p class="answer"><iframe width="560" height="315" src="https://www.youtube.com/embed/8ZMfsqYPGq0" 
       frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
       allowfullscreen></iframe></p>
  </div>
</main>

<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);
  body {
    font-family: 'Roboto', sans-serif;
    background-color: #f5f5f5;
    color: #444;
  }

  main {
    display: block;
    position: relative;
    box-sizing: border-box;
    padding: 30px;
    width: 100%;
    background-color: #fff;
    margin: 0 auto;
    margin-top: 12vh;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
  }

  .live-search-box {
    font-family: 'Open Sans', sans-serif;
    width: 100%;
    display: block;
    padding: 1em;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    border: 1px solid #005EB8;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
  }

  h1 {
    text-align: center;
    padding-left: 20px;
    padding-right: 20px;
    font-size: 32px;
    font-weight: 300;
    font-family: 'Open Sans', sans-serif;
  }

  .topic {
    padding: 20px;
    padding-top: 0px;
    padding-bottom: 0px;
    border-bottom: solid 1px #ebebeb;
  }

  .open {
    cursor: pointer;
    display: block;
    padding: 0px;
  }

  .open:hover {
    opacity: 0.7;
  }

  .expanded {
    background-color: #f5f5f5;
    transition: all .3s ease-in-out;
  }

  .ptag {
    display: none;
  }

  .question {
    padding-top: 30px;
    padding-right: 40px;
    padding-bottom: 20px;
    font-size: 18px;
    font-weight: 500;
    color: #005EB8;
    font-family: 'Open Sans', sans-serif;
  }

  .answer {
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    line-height: 26px;
    display: none;
    margin-bottom: 30px;
    text-align: justify;
    padding-left: 20px;
    padding-right: 20px;
  }

  .faq-t {
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
    display: inline-block;
    float: right;
    position: relative;
    top: -55px;
    right: 10px;
    width: 10px;
    height: 10px;
    background: transparent;
    border-left: 2px solid #ccc;
    border-bottom: 2px solid #ccc;
    transition: all .3s ease-in-out;
  }

  .faq-o {
    top: -50px;
    -moz-transform: rotate(-224deg);
    -ms-transform: rotate(-224deg);
    -webkit-transform: rotate(-224deg);
    transform: rotate(-224deg);
  }

  @media only screen and (max-width: 480px) {
    .faq-t {
      display: none;
    }
    .question {
      padding-right: 0px;
    }
    main {
      padding: 10px;
    }
    .answer {
      margin-bottom: 30px;
      padding-left: 0px;
      padding-right: 0px;
    }
  }
</style>

<script>
  $(".open").click(function() {
        var container = $(this).parents(".topic");
        var answer = container.find(".answer");
        var trigger = container.find(".faq-t");
      
        answer.slideToggle(200);
      
        if (trigger.hasClass("faq-o")) {
          trigger.removeClass("faq-o");
        } else {
          trigger.addClass("faq-o");
        }
      
        if (container.hasClass("expanded")) {
          container.removeClass("expanded");
        } else {
          container.addClass("expanded");
        }
      });
      
      jQuery(document).ready(function($) {
        $('.question').each(function() {
          $(this).attr('data-search-term', $(this).text().toLowerCase() + $(this).find("ptag").text().toLowerCase());
      
        });
      
        $('.live-search-box').on('keyup', function() {
      
          var searchTerm = $(this).val().toLowerCase();
      
          $('.question').each(function() {
      
            if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
              $(this).parent().parent().show();
            } else {
              $(this).parent().parent().hide();
            }
      
          });
      
        });
      
      });

</script>
@endsection