document.addEventListener('DOMContentLoaded', function() {
    const chartEl = document.getElementById('myChart');


    const totalPria = parseInt(chartEl.dataset.totalPria);
    const totalWanita = parseInt(chartEl.dataset.totalWanita);
    const totalPembangunan = parseInt(chartEl.dataset.totalPembangunan);
    const totalDusun = parseInt(chartEl.dataset.totalDusun);

    new Chart(chartEl, {
        type: 'doughnut',
        data: {
            labels: ['Pria', 'Wanita', 'Pembangunan', 'Dusun'],
            datasets: [{
                data: [totalPria, totalWanita, totalPembangunan, totalDusun],
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
