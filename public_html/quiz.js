const start_btn=document.querySelector('.start_btn button');
const info_box=document.querySelector('.info_box');
const exit_btn=info_box.querySelector('.buttons .quit');
const continue_btn=info_box.querySelector('.buttons .restart');
const quiz_box=document.querySelector('.quiz_box');
const timeCount=quiz_box.querySelector('.timer .timer_sec');
const timeLine=quiz_box.querySelector('header .time_line');

const option_list=quiz_box.querySelector('.option_list');

const time_Off=quiz_box.querySelector('.timer .time_text');
const next_btn=quiz_box.querySelector(".next_btn");

const result_box=document.querySelector('.result_box');
//const restart_quiz=result_box.querySelector('.buttons .restart')
const quit_quiz=result_box.querySelector('.buttons .quit');


next_btn.style.display='none';

quit_quiz.onclick=()=>{
    window.location.reload();
}





start_btn.onclick=()=>{
    info_box.classList.add('activeInfo');
}

exit_btn.onclick=()=>{
    info_box.classList.remove('activeInfo');
}


continue_btn.onclick=()=>{
    info_box.classList.remove('activeInfo'); //hide the info box
    quiz_box.classList.add('activeQuiz');


    revealQuestions(0);
    queCounter(1);
    startTimer(15);
    startTimerLine(0);

}

let que_count=0;
let que_numb=1;
let counter;
let timeValue=15;
let widthValue=0;
let userScore=0;




next_btn.onclick=()=>{
    next_btn.style.display='none';
    time_Off.textContent="Time Left";
    time_Off.style.color="green";
    if(que_count < questions.length-1){
        que_count++;
        que_numb++;
    revealQuestions(que_count);
    queCounter(que_numb);
    clearInterval(counter);
    startTimer(timeValue);
    clearInterval(counterLine);
    startTimerLine(widthValue);
    }else{
        console.log("Questions Completed");
        showResultBox();
    }
}







//Cleared up to this point 

function revealQuestions(index){
    const que_text=document.querySelector(".que_text");
    const option_list=document.querySelector(".option_list");
    let que_tag='<span>' + questions[index].num+"."+ questions[index].question + '</span>'
    let option_tag='<div class="option">' + questions[index].options[0]+'</div>'
    + '<div class="option">' +questions[index].options[1]+'<span></span></div>'
    +'<div class="option">'+ questions[index].options[2]+ '<span> </span></div>'
    + '<div class="option">'+questions[index].options[3]+'<span> </span></div>';
    que_text.innerHTML=que_tag;
    option_list.innerHTML=option_tag;

    const option=option_list.querySelectorAll('.option');
    for(let i=0;i<option.length;i++){
        option[i].setAttribute('onclick','optionSelected(this)')

    }

   

}







let tickIcon='<div class="icon tick"><i class="fa fa-check fa-1.5x"></i> </div>';
let crossIcon='<div class="icon cross"><i class="fa fa-times fa-1.5x"></i> </div>';

//cleared up to this point
function optionSelected(answer){
    clearInterval(counter);
    clearInterval(counterLine);
    //startTimer(timeValue);
    //console.log(answer);
    let userAns=answer.textContent;
    let correctAns=questions[que_count].answer;
    const option_list=document.querySelector(".option_list");
   // console.log("The option lists are:"+option_list)
    let allOptions=option_list.children.length;
  
    //option lists called again 
      if(userAns == correctAns){

       userScore +=1;
        answer.classList.add('correct');
        answer.insertAdjacentHTML("beforeend",tickIcon); 
       // console.log('Answer is correct');
       // console.log('Correct answer is '+ correctAns);
       
    }
    else{
       answer.classList.add('incorrect');
      // console.log('Answer is wrong');
       //console.log('The Correct answer is :'+ correctAns)
      answer.insertAdjacentHTML("beforeend",crossIcon);
  
      /**
       *   for(let i=0; i<allOptions; i++){
        if(option_list.children[i].textContent ==correctAns){
            option_list.children[i].setAttribute('class','option correct')
            option_list.children[i].insertAdjacentHTML('beforeend',tickIcon)
               }   
}
       * 
       */
        
     


    }
    for(let i=0; i<allOptions;i++){
        option_list.children[i].classList.add('disabled');
    }
   next_btn.style.display="block";

        
}





//Cleared up to this point 

function showResultBox(){
    info_box.classList.remove("activeInfo");
    quiz_box.classList.remove("activeQuiz");
    result_box.classList.add('activeResult');
    //result_box.classList.add('activeResult')
    //alert('about to show your scores')
   
  const scoreText=result_box.querySelector(".score_text");
    if(userScore>4){
        let res=result_box.querySelector('.icon');
        res.innerHTML='<i class="fa fa-heart fa-2x"> </i>'
      //  let scoreTag='<span> Excellent!!, you will soon be redirected as you got' +userScore + '<p>'+' </p> out of <p>'+questions.length+' </p> </span>';
      let scoreTag='<span> Excellent!!, <i><b>you will soon be redirected </b> </i> as you got  ' +userScore + ' out of '+questions.length+' </span>';
        scoreText.innerHTML=scoreTag;
       (function(){
        setTimeout(function(){
            quit_quiz.style.display="none";
        },2000);

        setTimeout(function(){
            window.location.href='home.html';
        },5000);

       })()


      
    }else if((userScore==4)|| (userScore==3)){
        let res=result_box.querySelector('.icon');
        res.innerHTML='<i class="fa fa-check-circle fa-2x"> </i>'
        let scoreTag='<span> Good !, you got only <p>'+userScore+' </p> out of <p>'+questions.length+'</p></span>';
        scoreText.innerHTML=scoreTag;
     

    }else{
        let res=result_box.querySelector('.icon');
        res.innerHTML='<i class="fa fa-exclamation-triangle fa-2x"> </i>'
        let scoreTag='<span> Ooops!!  you got only <p>'+userScore+' </p> out of <p>'+questions.length+'</p></span>';
        scoreText.innerHTML=scoreTag;
        
        
    } 

  
}








//timer function
function startTimer(time){
    counter=setInterval(timer,1000);
    function timer(){
        timeCount.textContent=time;
        time--;
        if(time <9){
            let addZero=timeCount.textContent;
            timeCount.textContent="0"+addZero;
            timeCount.style.color="red";
            timeCount.style.fontWeight="700";
            time_Off.style.color="red";
        }
        if(time < 0){
            clearInterval(counter);
            timeCount.textContent="00"
           
           // timeOff.textContent="Time off";
           time_Off.textContent="Time Off";
          // time_Off.style.color="red";
          // time_Off.style.fontWeight="700";
           //timeCount.style.color="red";
           //timeCount.style.fontWeight="700";


            let correctAns=questions[que_count].answer;
            let allOptions=option_list.children.length;

            /**
             *  for(let i=0; i<allOptions; i++){
                if(option_list.children[i].textContent ==correctAns){
                    option_list.children[i].setAttribute('class','option correct');
                    option_list.children[i].insertAdjacentHTML('beforeend',tickIcon);
        
            }
            
        }
             * 
             */
           

       
        next_btn.style.display='block';


      /** 
       * for( let i=0; i<allOptions; i++){
            option_list.children[i].classList.add('disabled');
        }*/  

        for( let i=0; i<allOptions; i++){
            option_list.children[i].classList.add('disabled');
        }







        }

    }
}




function startTimerLine(time){
    counterLine=setInterval(timer,34);
    function timer(){
       time += 1.36;
       timeLine.style.width=time + "px"
        
        if(time > 539){
            clearInterval(counterLine);
          
        }

    }
}





function queCounter(index){
    const bottom_ques_counter=quiz_box.querySelector('.total_que');
//let totalQuesCountTag=' <span> ' + index + '<p> of </p> <p>' + questions.length+'</p></span>';
//let totalQuesCountTag='<span><p>' + index + '</p>'+ '<p id="of"> of  ' + questions.length+' </p>' +' </span>';
let totalQuesCountTag='<span>' +index+'<p> of </p>' + questions.length+'</span>'
bottom_ques_counter.innerHTML=totalQuesCountTag;

}



