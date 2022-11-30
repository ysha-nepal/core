$(function () {
    const elems = $(".chart-container");
    function average(ctx) {
        const values = ctx.chart.data.datasets[0].data;
        return values.reduce((a, b) => a + b, 0) / values.length;
    }
    elems.each(function (idx, elem) {
        const container = $(elem);
        $.get(container.data("url")).then((res) => {
            const annotation = {
                type: "line",
                borderColor: "black",
                borderDash: [6, 6],
                borderDashOffset: 0,
                borderWidth: 3,
                label: {
                    enabled: true,
                    content: (ctx) => "Average: " + average(ctx).toFixed(2),
                    position: "end",
                },
                scaleID: "y",
                value: (ctx) => average(ctx),
            };
            let options = res.options;
            if (res.line) {
                options.plugins.annotation = {
                    annotations: {
                        annotation,
                    },
                };
            }
            options.bezierCurse = false;
            const chart = new Chart(container, {
                type: res.type,
                data: {
                    labels: res.labels,
                    datasets: res.datasets,
                },
                options: options,
            });
        });
    });
});
