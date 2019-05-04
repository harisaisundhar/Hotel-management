var calburner=function caloriesburned(lostweight, kgs, days){
return lostweight*kgs/days;
}
$("form#weight").submit(function(event) {
  event.preventDefault();
    var kgs= 7700;
  /*  console.log(kgs);*/
    var lostweight = parseInt($("input#lossweight").val());
    var days1 =parseInt( $("input#days").val());
    calburner(lostweight,kgs,days1);
  /*  console.log(lostweight);
console.log(days1);
console.log(calburner(lostweight,kgs,days1));
*/
$("#show-total").text( calburner(lostweight,kgs,days1));

  });


function computeBMI()
{

    var height=Number(document.getElementById("height").value);
    var heightunits=document.getElementById("heightunits").value;
    var weight=Number(document.getElementById("weight").value);
    var weightunits=document.getElementById("weightunits").value;



    if (heightunits=="inches") height/=39.3700787;
    if (weightunits=="lb") weight/=2.20462;


    var BMI=weight/Math.pow(height,2);


    document.getElementById("output").innerText=Math.round(BMI*100)/100;

    var output =  Math.round(BMI*100)/100
    if (output<18.5)
    document.getElementById("comment").innerText = "Underweight";
  else   if (output>=18.5 && output<=25)
    document.getElementById("comment").innerText = "Normal";
 else   if (output>=25 && output<=30)
    document.getElementById("comment").innerText = "Overweight";
 else   if (output>30)
    document.getElementById("comment").innerText = "Obese";

}
