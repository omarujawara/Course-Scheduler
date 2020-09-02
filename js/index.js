function loadDoc() {
    const table = document.getElementById('table');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         console.log(this.responseText)
         const course = JSON.parse(this.responseText); 

         for(const data of course){
             const row = (+data.course.substring(7,9) + -6 )
             const cell = (+data.course[+data.course.length - 1])
             const info = data.course+'<br/>'+data.room_num
             table.rows[row].cells[cell].innerHTML = info
         }
      }







    };
    xhttp.open("GET", "http://localhost/utility/get_schedule_data.php", true);
    xhttp.send();
  }
  loadDoc();
  
//   const table = document.getElementById('table');
//   table.rows[1].cells[1].innerHTML = "CSC"