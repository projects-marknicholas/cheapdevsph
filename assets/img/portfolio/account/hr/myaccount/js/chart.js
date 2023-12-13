const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        datasets: [{
            label: 'Attendance',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                '#216623',
                '#216623',
                '#216623',
                '#216623',
                '#216623',
                '#216623',
            ],
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});