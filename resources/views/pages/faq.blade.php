@extends('layouts.app') 
@section('content')
<!-- FAQ PAGE -->
<script type="text/javascript" src="../js/faq.js "></script>
<script src="../js/faq.js"></script>
<main style="margin-top:17vh;">
  <h1>Frequently Asked Questions</h1>  
  <input type="text" class="live-search-box" placeholder="Search" />
  <div class="topic">
    <div class="open">
      <h2 class="question">What is the purpose of the Blood Test Diary web application?<span class="ptag"></span></h2>
      <span class="faq-t"></span>
    </div>
    <p class="answer">The Blood Test Diary web application was created to automate, ease and simplify blood test scheduling of patients that
      are currently listed on the database of the paediatric liver service at King's College Hospital. The end product allows
      staff of King's College Hospital to easily view patient records, schedule and review appointments and much more.</p>
  </div>
  <div class="topic">
    <div class="open">
      <h2 class="question">What are the main functions of the Blood Test Diary web application? </h2><span class="faq-t"></span>
    </div>
    <p class="answer">The Blood Test diary consists of two main functions: Scheduling Appointments and Automating Reminders.</p>
  </div>
  <div class="topic">
    <div class="open">
      <h2 class="question">How does the Scheduling Appointments function work?</h2><span class="faq-t"></span>
    </div>
    <p class="answer">Scheduling Appointments can now be done with ease using the Blood Test Diary web application. Each set appointment can
      be color coded to match the current status of the particular appointment, providing clarity to staff and allowing staff
      to be kept up to date on urgent or postponed appointments. The appointments are then reflected on the calendar.</p>
  </div>
  <div class="topic">
    <div class="open">
      <h2 class="question">What does the Patients page show?</h2><span class="faq-t"></span>
    </div>
    <p class="answer">In this page, you’ll be able to see all the patients which are currently listed in the database. You can easily search
      for a patient’s name, contact number, or any other details that has been previously recorded in the database.
      <br><br> The star symbols at the top represent the degree of responsiveness of each patient. If a patient is listed
      under the red star, the patient is less or non-responsive to blood test reminders. Likewise, if a patient is listed
      under the yellow and green stars, they are listed as moderate to very responsive respectively. To find out more details
      about a particular patient, simply click on the patient’s name.</p>
  </div>
  <div class="topic">
    <div class="open">
      <h2 class="question">I'm new to this web application. How should I get started?
      </h2><span class="faq-t"></span>
    </div>
    <p class="answer">Kindly check out the instructional video page for a more in-depth look at how the web application can be used to further
      ease workload!<a href="{{ route('tutorial') }}"> Click here to watch the videos. </a></p>
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