



(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var today = new Date(),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
        document.getElementById('time').innerHTML = h + ":" + m + ":" + s + " Hrs";
        t = setTimeout(function () {
            startTime()
        }, 500);
    }

    startTime();
})();
/**
 * Execute this function every time someone clicks to login.
 */

$('#checkIn').on('click', function (e) {
    $.ajax
    ({
        url: '/arrive',
        type: 'post',
        success: function ($data) {
            alert($data.message);
            $("#timeIn").hide();
            $("#timeOut").show();
        }
    });
})

$('#CheckOut').on('click', function (e) {
    var leave;
    if (confirm("Are you sure you want to leave!") == true) {
        $.ajax
        ({
            url: '/depart',
            type: 'post',
            success: function ($data) {
                alert($data.message);
                $.ajax
                ({
                    url: '/logout',
                    type: 'post',
                    success: function () {
                        window.location.href ="/";
                    }
                });
            }
        });

    } else {

    }

})
