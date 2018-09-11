
  var natDays = ["2015-01-02","2016-10-07","2016-10-03","2016-10-06"];//节假日
  var restDayss = ["2016-10-09","2016-10-12"];//调休日期

 /*
  IE8下new Date();的兼容性
   */
function parseISO8601(dateStringInRange) {
    var isoExp = /^\s*(\d{4})-(\d\d)-(\d\d)\s*$/,
        date = new Date(NaN), month,
        parts = isoExp.exec(dateStringInRange);

    if (parts) {
        month = +parts[2];
        date.setFullYear(parts[1], month - 1, parts[3]);
        if (month != date.getMonth() + 1) {
            date.setTime(NaN);
        }
    }
    return date;
}
  function nationalDays(date) {

    var holiDays = (function () {
    var val = null;
    // $.ajax({
    //     'async': false,
    //     'global': false,
    //     'url': 'getdate.json',
    //     'success': function (data) {
    //         val = data;
    //     }
    // });
    return val;
    })();

    var m = date.getMonth();
    var d = date.getDate();
    var y = date.getFullYear();

    for (var i = 0; i < natDays.length; i++) {
    //var myDate = new Date(natDays[i]);
    var myDate = parseISO8601(natDays[i]);
      if ((m == (myDate.getMonth())) && (d == (myDate.getDate())) && (y == (myDate.getFullYear())))
      {

        return [false,""];
      }
    }
    return [true,""];
  }

  function restDays(date){
    var m = date.getMonth();
    var d = date.getDate();
    var y = date.getFullYear();
   for(var i = 0;i<restDayss.length;i++){

      var date1 = parseISO8601(restDayss[i]);

    if ((m == (date1.getMonth())) && (d == (date1.getDate())) && (y == (date1.getFullYear())))
      {

        return [true];
      }
   }
    return [false];
}


  function noWeekendsOrHolidays(date) {

    var noWeekend = $.datepicker.noWeekends(date);

      if (noWeekend[0]) {

        return nationalDays(date);
      } else{

            return noWeekend && restDays(date);

    }
  }
