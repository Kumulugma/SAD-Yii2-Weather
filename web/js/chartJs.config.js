$(document).ready(function () {
    var ctx = $('.chart');

    ctx.each(function (index, value) {

        var myChart = new Chart(value, {
            type: 'line',
            data: {
                datasets: [{
                        label: $(value).data('label'),
                        data: $(value).data('data'),
                        borderColor: "#bae755",
                        borderDash: [5, 5],
                        pointBackgroundColor: "#55bae7",
                        pointBorderColor: "#55bae7",
                        pointHoverBackgroundColor: "#55bae7",
                        pointHoverBorderColor: "#55bae7",
                    }],
                labels: $(value).data('labels')
            }
        });
    });

});