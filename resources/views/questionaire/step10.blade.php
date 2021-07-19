
<!DOCTYPE html>
<html lang="en-US">
   <head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=0">
      <title>Questionaire</title>
	  <link rel="icon" href="{{ asset('/images/logo.png') }}" type="image/png">
      <link rel="stylesheet" type="text/css" href="{{ asset('/css/registration_combined.css') }}" />

   </head>
  
   <body id="questionnaireQuestion" class="questionnairePages" >
      <div id="pageWrapper">

         <main id="content">
            <section>
               <form method="POST" class="d-flex justify-content-left"  action="{{ url('/saveuserholidays')}} ">
                  <article class="question has-pageAnimation type_multi_column_checkbox REMOVE_FREETEXT_ANSWERS_FROM_QUESTIONNAIRE_BY_KEX "
                     data-type="MULTI_COLUMN_CHECKBOX" data-minAnswers="1" data-maxAnswers="5" data-completed="false"
                     data-bugmin-answers="1">
                     <header>
                        <h1 class="row" role="heading" aria-level="1">
                           <p class="questionText">What sort of holidays do you like most? </p>
                        </h1>
                        <div class="hintAndErrors is-static">
                           <p class="fillOutHint">(Multiple Answers(No Limit))</p>
                           <p class="fillOutError notEnoughAnswersGiven" role="alert">Additional details required</p>
                        </div>
                        <div class="hintAndErrors is-fixed">
                           <p class="fillOutHint">(Multiple Answers(No Limit))</p>
                           <p class="fillOutError notEnoughAnswersGiven" role="alert">Additional details required</p>
                        </div>
                     </header>
                     <div class="row">
                        <ul class="column">
                          
                           @csrf
							<input type="hidden" name="user_id" value="{{ $id }}">
							@foreach($holidays as $holiday)
							<li class="answerWrapper qa-answerWrapper">
								<input type="checkbox" id="holiday{{ $holiday['id'] }}" name="holiday[]" value="{{ $holiday['id'] }}" />
								<label for="holiday{{ $holiday['id'] }}">
								{{ $holiday['holiday'] }} </label>
							</li>
							@endforeach
                           
                        </ul>
                     </div>
                  </article>
                  <footer>
                     <div class="row submitRow">
                        <div class="column">
                           <button id="submitQuestionForm" class="wdk-button t-primarySkin2 next disabled wdk_loadingIndicator" type="submit" > <span class="text">Continue</span> <span class="trippleDot loader t-dark"></span> </button> 
                        </div>
                     </div>
                  </footer>
               </form>
            </section>
         </main>
         <footer id="footerUnified" class="registrationLayout">
            <nav>
               <ul>
                  <li>
                    	<a id="footerLink1" href="{{ url('/privacypolicy') }}">Privacy policy </a>
                    </li>
                    <li>
                    	<a id="footerLink2" href="{{ url('/termsandconditions') }}" >Terms & conditions </a>
                    </li>
                    <li>
                    	<a id="footerLink3" href="{{ url('/useragreement') }}" >User Agreement</a>
                    </li>
               </ul>
            </nav>
         </footer>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
      <script>
		  var checkboxes_count = 0;
		  
		  $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                console.log("Checkbox is checked.");
                checkboxes_count++;
            }
            else if($(this).prop("checked") == false){
                console.log("Checkbox is unchecked.");
                checkboxes_count--;
            }
            console.log(checkboxes_count);
            if(checkboxes_count >= 1){
				  $('#submitQuestionForm').removeClass('disabled');
			  }
			  else{
				  $('#submitQuestionForm').addClass('disabled');
			  }
        });
		  
      </script>
   </body>
</html>



