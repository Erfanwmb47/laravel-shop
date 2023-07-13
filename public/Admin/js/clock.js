// START CLOCK SCRIPT

Number.prototype.pad = function(n) {
    for (var r = this.toString(); r.length < n; r = 0 + r);
    return r;
};

function gregorian_to_jalali(gy, gm, gd) {
    var g_d_m, jy, jm, jd, gy2, days;
    g_d_m = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334];
    gy2 = (gm > 2) ? (gy + 1) : gy;
    days = 355666 + (365 * gy) + ~~((gy2 + 3) / 4) - ~~((gy2 + 99) / 100) + ~~((gy2 + 399) / 400) + gd + g_d_m[gm - 1];
    jy = -1595 + (33 * ~~(days / 12053));
    days %= 12053;
    jy += 4 * ~~(days / 1461);
    days %= 1461;
    if (days > 365) {
        jy += ~~((days - 1) / 365);
        days = (days - 1) % 365;
    }
    if (days < 186) {
        jm = 1 + ~~(days / 31);
        jd = 1 + (days % 31);
    } else {
        jm = 7 + ~~((days - 186) / 30);
        jd = 1 + ((days - 186) % 30);
    }
    return [jy, jm, jd];
}

function updateClock() {
    var ndt = new Date();
    var

    sec = ndt.getSeconds(),
        min = ndt.getMinutes(),
        hou = ndt.getHours(),
        yr = ndt.getFullYear(),
        mo = ndt.getMonth() ,
        dy = ndt.getDate();
        shamsi=gregorian_to_jalali(yr,mo,dy);
        mo=shamsi[1];
        yr=shamsi[0];
        dy=shamsi[2];
        $("#dz").show();
        $("#mon").show();
        $("#y").show();
        $("#h").show();
        $("#m").show();
        $("#s").show();
        $("#slash_first").show();
        $("#slash_second").show();
        $("#colon_first").show();
        $("#colon_second").show();



    //document.write(shamsi[0]+'/'+shamsi[1]+'/'+shamsi[2]+' :هجری شمسی تبدیل شده از میلادی<br> ');

    var months = ["فرودین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"];
    var tags = ["mon", "dz", "y", "h", "m", "s"];


    var    corr = [mo+1, yr, dy, hou.pad(2), min.pad(2), sec.pad(2)];
    for (var i = 0; i < tags.length; i++)
        document.getElementById(tags[i]).firstChild.nodeValue = corr[i];

    //shamsi=gregorian_to_jalali(g_y,g_m,g_d);
   // document.write(shamsi[0]+'/'+shamsi[1]+'/'+shamsi[2]+'<br> ');
}



/*function updateClock() {
    var now = new Date();
    var
        sec = now.getSeconds(),
        min = now.getMinutes(),
        hou = now.getHours(),
        mo = now.getMonth(),
        dy = now.getDate(),
        yr = now.getFullYear();

    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var tags = ["mon", "dz", "y", "h", "m", "s"];

    var    corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2)];
    for (var i = 0; i < tags.length; i++)
        document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
}
*/
function initClock() {

    updateClock();
    window.setInterval("updateClock()", 1);

}

// END CLOCK SCRIPT
