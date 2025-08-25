document.addEventListener('DOMContentLoaded', function() {
    const chartEl = document.getElementById('myChart');


    const totalPria = parseInt(chartEl.dataset.totalPria);
    const totalWanita = parseInt(chartEl.dataset.totalWanita);
    const totalKepalaKeluarga = parseInt(chartEl.dataset.totalKepalaKeluarga);
    const totalKKP = parseInt(chartEl.dataset.totalKkp);

    new Chart(chartEl, {
        type: 'doughnut',
        data: {
            labels: ['Pria', 'Wanita', 'KepalaKeluarga', 'KKP'],
            datasets: [{
                data: [totalPria, totalWanita, totalKepalaKeluarga, totalKKP],
                backgroundColor: [
                    '#34613A', 
                    '#8EBD55',
                    '#FA7139', 
                    '#FBAD48'
                ],
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom'
                }
            },
            cutout: '69%',
        }
    });
});
