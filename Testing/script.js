function reloj() {
    var hoy = new Date();
    var hora = hoy.getHours();
    var min = hoy.getMinutes();
    var sec = hoy.getSeconds();
    ap = (hora < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hora = (hora == 0) ? 12 : hora;
    hora = (hora > 12) ? hora - 12 : hora;
    
    hora = checkTime(hora);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("relojito").innerHTML = "La hora es: " + hora + ":" + min + ":" + sec + " " + ap;
    
    var months = ['de Enero', 'de Febrero', 'de Marzo', 'de Abril', 'de Mayo', 'de Junio', 'de Julio', 'de Agosto', 'de Septiembre', 'de Octubre', 'de Noviembre', 'de Diciembre'];
    var days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];  
    var curWeekDay = days[hoy.getDay()];
    var curDay = hoy.getDate();
    var curMonth = months[hoy.getMonth()];
    var curYear = hoy.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("fecha").innerHTML = `Hoy es:  ${date}`;
    
    var time = setTimeout(function(){ reloj() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}