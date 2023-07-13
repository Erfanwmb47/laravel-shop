
if ($('#report-pie-chart').length) {
    var _ctx = $('#report-pie-chart')[0].getContext('2d');

    var myPieChart = new chart_js__WEBPACK_IMPORTED_MODULE_1___default.a(_ctx, {
        type: 'pie',
        data: {
            labels: ["Yellow", "Dark"],
            datasets: [{
                data: [15, 10, 65],
                backgroundColor: ["#FF8B26", "#FFC533", "#285FD3"],
                hoverBackgroundColor: ["#FF8B26", "#FFC533", "#285FD3"],
                borderWidth: 5,
                borderColor: "#fff"
            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });
}
