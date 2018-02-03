import SimpleMDE from 'simplemde';
import marked from 'marked';
import Chart from 'chart.js';
import randomColor from 'randomcolor';

import notification from '../components/notification/notification';

function markdownAreaEditor() {
    let markdownArea = document.querySelector('.homePage__mdAreaEditor');

    if (markdownArea) {
        new SimpleMDE({
            element: markdownArea
        })
    }
}

function markdownAreaViewer() {
    let rawMarkdown = document.querySelector('.homePage__mdAreaRaw');
    let viewArea = document.querySelector('.homePage__mdAreaViewer');

    if (viewArea) {
        let markupContent = rawMarkdown.innerText.trim();
        viewArea.innerHTML = marked(markupContent);
    }
}

function barChartInit() {
    // Cache bar chart dom canvas element
    const ctx = $('.homePage__barChart');
    // Get url stored in data attribute
    const url = ctx.data('url');

    // If canvas exists
    if (ctx.length > 0) {
        // Get ajax request into provided url
        $.get(url)
        // If request was successfully completed
            .done(function (data) {
                // Store categories names array into variable
                // Split categories names into small array by space for label multi line
                const categoriesNames = data.categoriesNames.map(function (item) {
                    return item.split(' ');
                });
                // Store posts count array into variable
                const postsCount = data.postsCount;
                // Generate array of random RGBa colors with categories names array length
                const backgroudColors = randomColor({
                    luminosity: 'dark',
                    count: categoriesNames.length,
                    format: 'rgba',
                    alpha: 0.5
                });

                // Start generating chart
                const myChart = new Chart(ctx, {
                    // Set chart type
                    type: 'bar',
                    // Set chart data
                    data: {
                        // Set labels from categories names array
                        labels: categoriesNames,
                        datasets: [{
                            label: 'Posts per Category',
                            // Set data from posts count array
                            data: postsCount,
                            // Set background color from background colors generated array
                            backgroundColor: backgroudColors
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        // Set chart title settings
                        title: {
                            display: true,
                            fontSize: 18,
                            text: 'Posts per Category chart'
                        }
                    }
                });
            })
            .fail(function (error) {
                // If ajax request failed invoke notification with error text
                notification.addNotification(error.statusText, 'danger', 5000);
            });
    }
}

function init() {
    markdownAreaViewer();
    markdownAreaEditor();
    barChartInit();
}

export default init;