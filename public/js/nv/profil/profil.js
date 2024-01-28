  var noOfDays=0;
  var noOfShifts=0;
  //Add the first week
  addWeek();
  //createAddWeekButtons();
  // createShiftDiv('test01',"480","510");
  // createShiftDiv('30',"480","510");
  // createShiftDiv('test02',"810","150");
   createShiftDiv('15',"480", "450","5","720", "660","5","5");
   createShiftDiv2();

  createAddShiftButton();

  function createAddShiftButton(){
    var addShiftDiv = document.createElement("DIV");
    addShiftDiv.setAttribute("id", "addNewShiftButton");
    addShiftDiv.setAttribute("class", "addShift btn btn-success btn-user  mb-3 mt-3 ml-5");
    addShiftDiv.innerHTML = "Nouveau temps";
    document.getElementById("shifts").appendChild(addShiftDiv);
    addShiftDiv.addEventListener('click', function() {
      createAddShiftDiv();
    });
  }

  function createAddWeekButtons(){
      var addWeekbutton = document.createElement('button');
      addWeekbutton.appendChild(document.createTextNode("Ajouter une nouvelle semaine"));
      addWeekbutton.setAttribute("id", "addWeekbutton");
      document.getElementById('addWeekTD').appendChild(addWeekbutton);
      addWeekbutton.addEventListener('click', addWeek);
      var sixWeekButton = document.createElement('button');
      sixWeekButton.appendChild(document.createTextNode("Horaire de six semaines"));
      sixWeekButton.setAttribute("id", "sixWeekButton");
      document.getElementById('sixWeeksTD').appendChild(sixWeekButton);
      sixWeekButton.addEventListener('click', function() {
        while(noOfDays < 41){
          addWeek();
        }
      });
  }

  function createAddShiftDiv(){
      var addShiftDiv = document.createElement("DIV");
      addShiftDiv.setAttribute("id", "addShiftDiv");

      //Time
      var p = document.createElement("div");
      var label = document.createElement("label");
      label.setAttribute("for","timeRange");
      label.innerHTML = "Temps d'entrée et de sortie:";
      p.appendChild(label);
      var timeInput =  document.createElement("input");
      timeInput.setAttribute("type","text");
      timeInput.setAttribute("id","timeRange");
      timeInput.setAttribute("style","border:0");
      timeInput.readOnly = true;
      p.appendChild(timeInput);
      
      var sliderDiv = document.createElement("DIV");
      sliderDiv.setAttribute("id","slider-range");


      
      //retard max 
      var nameP = document.createElement("div");
      var nameLabel = document.createElement("label");
      nameLabel.setAttribute("for","nameInput");
      nameLabel.innerHTML = "retard d'entrée (minute):";
      nameP.appendChild(nameLabel);
      var nameInput =  document.createElement("input");
      nameInput.setAttribute("type","number");
      nameInput.setAttribute("id","nameInput");
      nameP.appendChild(nameInput);


         //retard max 
         var nameP3 = document.createElement("div");
         var nameLabel3 = document.createElement("label");
         nameLabel3.setAttribute("for","nameInput3");
         nameLabel3.innerHTML = "retard de sortie (minute):";
         nameP3.appendChild(nameLabel3);
         var nameInput3 =  document.createElement("input");
         nameInput3.setAttribute("type","number");
         nameInput3.setAttribute("id","nameInput3");
         nameP3.appendChild(nameInput3);
   




     //Time pause
      var p2 = document.createElement("div");
      var label2 = document.createElement("label");
      label2.setAttribute("for","timeRange2");
      label2.innerHTML = "Pause entrée / sortie:";
      p2.appendChild(label2);
      var timeInput2 =  document.createElement("input");
      timeInput2.setAttribute("type","text");
      timeInput2.setAttribute("id","timeRange2");
      timeInput2.setAttribute("style","border:0");
      timeInput2.readOnly = true;
      p2.appendChild(timeInput2);
      var sliderDiv2 = document.createElement("DIV");
      sliderDiv2.setAttribute("id","slider-range2");
      
      //retard max 
      var nameP2 = document.createElement("div");
      var nameLabel2 = document.createElement("label");
      nameLabel2.setAttribute("for","nameInput2");
      nameLabel2.innerHTML = "retard  pause de sortie (minute):";
      nameP2.appendChild(nameLabel2);
      var nameInput2 =  document.createElement("input");
      nameInput2.setAttribute("type","number");
      nameInput2.setAttribute("id","nameInput2");
      nameP2.appendChild(nameInput2);


       //retard max 
       var nameP4 = document.createElement("div");
       var nameLabel4 = document.createElement("label");
       nameLabel4.setAttribute("for","nameInput4");
       nameLabel4.innerHTML = "retard pause d'entrée (minute):";
       nameP4.appendChild(nameLabel4);
       var nameInput4 =  document.createElement("input");
       nameInput4.setAttribute("type","number");
       nameInput4.setAttribute("id","nameInput4");
       nameP4.appendChild(nameInput4);
 
    
      var inputTable = document.createElement('table');
      var inputTableRow = document.createElement('tr');
      var inputTableRow2 = document.createElement('tr');
      var nameTd = document.createElement('td');
      var nameTd3 = document.createElement('td');
      var nameTd4 = document.createElement('td');
      var timeTd = document.createElement('td');

      var nameTd2 = document.createElement('td');
      var timeTd2 = document.createElement('td');
      
 

      timeTd.appendChild(p);  
      timeTd.appendChild(sliderDiv);   
      nameTd.appendChild(nameP)   ; 
      nameTd3.appendChild(nameP3)   ; 

      
      timeTd2.appendChild(p2);  
      timeTd2.appendChild(sliderDiv2);   
      nameTd2.appendChild(nameP2)
      nameTd4.appendChild(nameP4)
    
      inputTableRow.appendChild(nameTd);
      inputTableRow.appendChild(nameTd3);
      inputTableRow.appendChild(timeTd);
      inputTableRow2.appendChild(nameTd2);
      inputTableRow2.appendChild(nameTd4);
      inputTableRow2.appendChild(timeTd2);
      inputTable.appendChild(inputTableRow)
      inputTable.appendChild(inputTableRow2)
      addShiftDiv.appendChild(inputTable);
      
      var buttonTable = document.createElement('table');
      var buttonTableRow = document.createElement('tr');
      var addTd = document.createElement('td');
      var resetTd = document.createElement('td');
      buttonTableRow.appendChild(addTd);
      buttonTableRow.appendChild(resetTd);
      buttonTable.appendChild(buttonTableRow);
      
      //Add button
      var addButton = document.createElement('button');
      addButton.appendChild(document.createTextNode("ajouter"));
      addTd.appendChild(addButton);
      addButton.addEventListener('click', function() {
      createShiftDiv(
        //$( "#nameInput" ).val(),
       // $( "#nameInput2" ).val(),
        $( "#nameInput" ).val(),
        $( "#slider-range" ).slider(  "values", 0 ), 
        1440-$( "#slider-range" ).slider( "values", 1 ),

        $( "#nameInput2" ).val(),
        $( "#slider-range2" ).slider(  "values", 0 ), 
        1440-$( "#slider-range2" ).slider( "values", 1 ),
        $( "#nameInput3" ).val(),
        $( "#nameInput4" ).val(),
        //$( "#slider-range2" ).slider( "values", 0 ),  1440-$( "#slider-range2" ).slider( "values", 1 )

        );
      $( "#addNewShiftButton" ).remove();
        createAddShiftButton(); 
        $( "#addShiftDiv" ).remove();
        $(function () {
          $(".shift").draggable({
                  snap: ".weekday",
                  start: handleDragEvent,
                  snapMode: "inner"
          });

          $(".shift2").draggable({
            snap: ".weekday",
            start: handleDragEvent,
            snapMode: "inner"
    });
      });
      });
      //reset button
      var resetButton = document.createElement('button');
      resetButton.appendChild(document.createTextNode("annuler"));
      resetTd.appendChild(resetButton);
      addShiftDiv.appendChild(buttonTable);                           
      resetButton.addEventListener('click', function() { 
      $("#addShiftDiv").remove();
     
      });
    
    document.getElementById('content').appendChild(addShiftDiv);
    $( function() {
      $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        values: [ 480, 990 ],
        slide: function( event, ui ) {
          $( "#timeRange" ).val( getTime(ui.values[ 0 ]) + " - " + getTime(ui.values[ 1 ]));
        }
      });  
      $( "#timeRange" ).val(getTime($( "#slider-range" ).slider( "values", 0 )) +
        " - " + getTime($( "#slider-range" ).slider( "values", 1 ) ));

      $( "#slider-range2" ).slider({
        range: true,
        min: 0,
        max: 1440,
        step: 15,
        values: [ 720, 780 ],
        slide: function( event, ui ) {
          $( "#timeRange2" ).val( getTime(ui.values[ 0 ]) + " - " + getTime(ui.values[ 1 ]));
        }
      });  
      $( "#timeRange2" ).val(getTime($( "#slider-range2" ).slider( "values", 0 )) +
        " - " + getTime($( "#slider-range2" ).slider( "values", 1 ) ));
      } );
  }

  //JQuery functions --------------------------------
  $(function () {
          $(".shift").draggable({
                  snap: ".weekday",
                  start: handleDragEvent,
                  snapMode: "inner"
          });
          $(".shift2").draggable({
            snap: ".weekday",
            start: handleDragEvent,
            snapMode: "inner"
    });
  });

  $('.weekday').droppable({
    drop: handleDropEvent
  });

  function handleDragEvent(event, ui) {
    $(this).data('id', event.target.getAttribute('id'));
  }

  function handleDropEvent(event, ui) {
    var draggedItem = document.getElementById(ui.draggable.data('id'));
   var id = event.target.id;
  //  console.log(event.target.id);

    if(draggedItem.getAttribute('before')==null && draggedItem.getAttribute('after')==null){

      event.target.setAttribute("work", "no");
      $("#"+event.target.id).html(draggedItem.innerHTML);
      $("#"+event.target.id).css('background-color', '#780050;');
      event.target.setAttribute("before", draggedItem.getAttribute('before'));
      event.target.setAttribute("after", draggedItem.getAttribute('after'));
      event.target.setAttribute("before_pause", draggedItem.getAttribute('before_pause'));
      event.target.setAttribute("after_pause", draggedItem.getAttribute('after_pause'));
      event.target.setAttribute("retard_in", draggedItem.getAttribute('retard_in'));
      event.target.setAttribute("retard_out", draggedItem.getAttribute('retard_out'));
      event.target.setAttribute("retard_pause_in", draggedItem.getAttribute('retard_pause_in'));
      event.target.setAttribute("retard_pause_out", draggedItem.getAttribute('retard_pause_out'));
    }else{
      event.target.setAttribute("work", "yes");
      $("#"+event.target.id).html(draggedItem.innerHTML);
      $("#"+event.target.id).css('background-color', '#005578');
      event.target.setAttribute("before", getTime(draggedItem.getAttribute('before')));
      event.target.setAttribute("after", getTime(1440-draggedItem.getAttribute('after')));
      event.target.setAttribute("before_pause",   getTime(draggedItem.getAttribute('before_pause')));
      event.target.setAttribute("after_pause", getTime(1440-draggedItem.getAttribute('after_pause')));
      event.target.setAttribute("retard_in", draggedItem.getAttribute('retard_in'));
      event.target.setAttribute("retard_out", draggedItem.getAttribute('retard_out'));
      event.target.setAttribute("retard_pause_in", draggedItem.getAttribute('retard_pause_in'));
      event.target.setAttribute("retard_pause_out", draggedItem.getAttribute('retard_pause_out'));
    }
    //console.log(event.target);
    document.getElementById(id+'_work').setAttribute("value", event.target.getAttribute('work'));
    document.getElementById(id+'_before').setAttribute("value", event.target.getAttribute('before'));
    document.getElementById(id+'_after').setAttribute("value", event.target.getAttribute('after'));
    document.getElementById(id+'_before_pause').setAttribute("value", event.target.getAttribute('before_pause'));
    document.getElementById(id+'_after_pause').setAttribute("value", event.target.getAttribute('after_pause'));
    document.getElementById(id+'_retard_in').setAttribute("value", event.target.getAttribute('retard_in'));
    document.getElementById(id+'_retard_out').setAttribute("value", event.target.getAttribute('retard_out'));
    document.getElementById(id+'_retard_pause_in').setAttribute("value", event.target.getAttribute('retard_pause_in'));
    document.getElementById(id+'_retard_pause_out').setAttribute("value", event.target.getAttribute('retard_pause_out'));
    //Add clean day scheduel button
      var resetButton = document.createElement('div');
    resetButton.setAttribute("class","resetButton");
    var buttonText = document.createElement('div');
    buttonText.setAttribute("style","position:relative; top: -32px; color: lightgray; text-align:center;")
    buttonText.innerHTML="-";
    resetButton.appendChild(buttonText);
      event.target.appendChild(resetButton);
      resetButton.addEventListener('click', function() {
        event.target.setAttribute("work", "no");
        event.target.setAttribute("before", 1440);
        event.target.setAttribute("after", 1440);
        document.getElementById(id+'_work').setAttribute("value", "");
        document.getElementById(id+'_before').setAttribute("value", "");
        document.getElementById(id+'_after').setAttribute("value", "");
        document.getElementById(id+'_before_pause').setAttribute("value", "");
        document.getElementById(id+'_after_pause').setAttribute("value", "");
        document.getElementById(id+'_retard_in').setAttribute("value", "");
        document.getElementById(id+'_retard_out').setAttribute("value", "");
        document.getElementById(id+'_retard_pause_in').setAttribute("value","");
        document.getElementById(id+'_retard_pause_out').setAttribute("value", "");
        $("#"+event.target.id).html(event.target.getAttribute('name'));
        $("#"+event.target.id).css('background-color', 'lightgray');
     //   weektotal();
      });
    draggedItem.style.top = 'auto';
    draggedItem.style.left = 'auto'; 
   // weektotal();
  }

  function getTime(before){
    if(before>1440){
      before=before-1440;
    }
    var hour=""+Math.floor(before/60)
    if (hour.length == 1){
      hour= "0"+hour;
    }
    var minute= ""+before%60;
    if (minute.length == 1){
      minute= "00";
    }
    return hour+":"+minute
  }

  function setResultPos(){
      if ($('#result').length > 0) {
          document.getElementById('result').style.top = (document.getElementById('calendar').offsetHeight + 
          document.getElementById('start').offsetHeight + 110 + document.getElementById('shifts').offsetHeight+'px');
        }
  }

  function formatDayWeekText(dayDiv){
    var text =  dayDiv.getAttribute('name');
    if(noOfDays>7){
      text = text +" vecka "+dayDiv.getAttribute('weekNo'); 
    }
    return text
  }
 
  function weektotal() {
    var resulttext = '';
    var twoDayCheck = 1;
    var restCheck = 0;
    var workdays = 0;
    var days = [];
    var i=1;
    while ($('#day'+i).length > 0){
      days.push(document.getElementById('day'+i));
       //   console.log(document.getElementById('day'+i));
      i++;   
    }
    
    //Check rest between work days
    for (var j = 0; j < days.length-1; j++) {
      var rest = 0;
        rest += +(days[j].getAttribute('after'));
        rest += +(days[j+1].getAttribute('before'));
        if (rest < 0) {
          resulttext = 'Vous ne pouvez pas avoir un quart de jour juste après un quart de nuit, ils se chevauchent.(' + formatDayWeekText(days[j]) + ' à ' + formatDayWeekText(days[j+1]) + ')<br>';
          restCheck = 2
        }
        else if ((days[j+1].getAttribute('work') != 'no') && (days[j].getAttribute('work') != 'no')) {
          resulttext += 'repos de 24 heures ' + formatDayWeekText(days[j]) + ' - ' + formatDayWeekText(days[j+1]) + ': ' + timeConvert(rest) + '<br/>';
          if (rest < 660) {
            restCheck = 1;
          }
        }
      }
    
      //Check for twoDayRest
      for (var j = 6; j < days.length; j++) {
            var restDay=0;
            for (var k = -6; k < 0; k++) {
              if ((days[j+k].getAttribute('work') === 'no') && (days[j+k+1].getAttribute('work') === 'no')) {
                restDay++;
              }
            }
          if(restDay<1){
            twoDayCheck=0;
          }
      }
      
    //Check for four workdays in a row
      for (var j = 0; j < days.length-3; j++) {
        if ((days[j].getAttribute('work') === "yes") && (days[j+1].getAttribute('work') === "yes") && (days[j+2].getAttribute('work') === "yes") && (days[j+3].getAttribute('work') === "yes")) {
          workdays =+ 1;
        }
      }
    
    //Check if resultdiv exists and if not create it
    if ($('#result').length == 0) {
      //Create and add result DIV
      var resultdiv = document.createElement("DIV");
      resultdiv.setAttribute("id", "result");
      document.getElementById('content').appendChild(resultdiv);
    
      //Create and add resulttext DIV  
      var resulttextdiv = document.createElement("DIV");
      resulttextdiv.setAttribute("id", "resultText");
      document.getElementById('result').appendChild(resulttextdiv);
      
      //Add clean scheduel button
      var resetButton = document.createElement('button');
      //resetButton.appendChild(document.createTextNode("Horaire clair !"));
      document.getElementById('result').appendChild(resetButton);
      resetButton.addEventListener('click', function() {
        window.location.href = window.location.href;
      });      
    }
    
    setResultPos();
    //Create and print the resulttext
    if (restCheck == 0) {
      //    resulttext += "Un repos de 24 heures sur 11 heures est considéré comme l'occasion d'une récupération suffisante.<br>"
        }
      else if (restCheck == 1) {
     //   resulttext += "Si le repos quotidien est inférieur à 11 heures, il est difficile de dormir autant que nécessaire.<br>"
        }
    
      if (twoDayCheck == 0) {
       //     resulttext += "<br>Il est généralement préférable d'avoir deux jours de repos consécutifs au cours de la semaine.";
          }
          else {
            resulttext += "<br>C'est bien qu'il y ait au moins deux jours de repos consécutifs.";
            if (workdays > 0) {
          //    resulttext += ' Mais quatre quarts de suite peuvent être fatigants lorsque vous travaillez par quarts.'
            }
          }
   // document.getElementById('resultText').innerHTML = '<h3>Commentez votre emploi du temps</h3>' + resulttext;
  }

  function timeConvert(n) {
    var num = n;
    var hours = (num / 60);
    var rhours = Math.floor(hours);
    var minutes = (hours - rhours) * 60;
    var rminutes = Math.round(minutes);
    return rhours + 'h' + rminutes + "min.";
  }

  //Add Element functions
  function addWeek() {
      var newRow = document.createElement("tr");
      var newCell= document.createElement("td");
      var weekNo = (noOfDays/7)+1
      newCell.innerHTML=weekNo;
      newRow.appendChild(newCell);
      addDay("Dimanche",newRow,weekNo);
      addDay("Lundi",newRow,weekNo);
      addDay("Mardi",newRow,weekNo);
      addDay("Mercredi",newRow,weekNo);
      addDay("Jeudi",newRow,weekNo);
      addDay("Vendredi",newRow,weekNo);
      addDay("Samedi",newRow,weekNo);
      
    document.getElementById('weeks').appendChild(newRow);
    $('.weekday').droppable({drop: handleDropEvent
    });
    setResultPos();
    if(noOfDays>41){
      document.getElementById("addWeekbutton").remove();
      document.getElementById("sixWeekButton").remove();
    }
  }

  function addDay(day,newRow,weekNo){
    noOfDays++;
    var newCell = document.createElement("TD");
    var dayDiv = document.createElement("DIV");
    dayDiv.setAttribute("class", "weekday");
    dayDiv.setAttribute("id", 'day' + noOfDays);
    dayDiv.setAttribute("name", day);
    dayDiv.setAttribute("work", 'no');
    dayDiv.setAttribute("before", 1440);
    dayDiv.setAttribute("after", 1440);
    dayDiv.setAttribute("weekNo",weekNo);
    dayDiv.innerHTML=day
    newCell.appendChild(dayDiv);
    newRow.appendChild(newCell);
  }

  function createShiftDiv(name,before,after,name2,before2,after2,name3,name4){
    var shiftDiv = document.createElement("DIV");
    noOfShifts++;
    shiftDiv.setAttribute("id", "shift"+noOfShifts);
    shiftDiv.setAttribute("class", "shift");

    shiftDiv.setAttribute("before", before);
    shiftDiv.setAttribute("after", after);

    shiftDiv.setAttribute("before_pause", before2);
    shiftDiv.setAttribute("after_pause", after2);
   
    if(name==""){
      name=0;
    }
    if(name3==""){
      name3=0;
    }
    if(name4==""){
      name4=0;
    }

    if(name2==""){
      name2=0;
    }

    shiftDiv.setAttribute("retard_in", name);
    shiftDiv.setAttribute("retard_out", name3);

    shiftDiv.setAttribute("retard_pause_in", name4);
    shiftDiv.setAttribute("retard_pause_out", name2);

    shiftDiv.setAttribute("before_pause", before2);
    shiftDiv.setAttribute("after_pause", after2);

    var timeP = document.createElement("p");
    timeP.setAttribute("class","tid");
    timeP.innerHTML= getTime(before)+"-"+getTime(1440-after)+"("+name+"/"+name3+")";
    shiftDiv.appendChild(timeP);

    // var br = document.createElement("br");
    // shiftDiv.appendChild(br);

    var timeP2 = document.createElement("p");
    timeP2.setAttribute("class","tid");
    timeP2.innerHTML= getTime(before2)+"-"+getTime(1440-after2)+"("+name2+"/"+name4+")";
    shiftDiv.appendChild(timeP2);

    document.getElementById("shifts").appendChild(shiftDiv);
  }


  function createShiftDiv2(){
    var shiftDiv = document.createElement("DIV");
    noOfShifts++;
    shiftDiv.setAttribute("id", "shift"+noOfShifts);
    shiftDiv.setAttribute("class", "shift2");

   
   

    var timeP = document.createElement("p");
    timeP.setAttribute("class","tid2");
    timeP.innerHTML= "Jour de repos";
    shiftDiv.appendChild(timeP);

   
    document.getElementById("shifts").appendChild(shiftDiv);
  }