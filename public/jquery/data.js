function search() {

    let url = "/api/dashboard/kpi"
    
    $.ajax({
        url: url,
        method: 'get',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type':'application/json'
        },
        success: function(response) {

            let data = response.data
            let labels = []
            let dataKPI = []
            let dataReportKPI = []
            
            var rows = "";
            for (var index in data){
                rows += buildTemplate(data, index)
                labels.push(data[index].karyawan)
                dataKPI.push(data[index].sales_actual)
                dataReportKPI.push(data[index].report_actual)
            }

            $("#tableKPI>tbody").append(rows);

            const ctx = document.getElementById('kpiChart');

            const dataChart = {
            labels: labels,
            datasets: [{
                label: '',
                data: dataKPI,
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
            };

            new Chart(ctx, {
                type: 'bar',
                data: dataChart,
                options: {
                    scales: {
                        y: {
                        beginAtZero: false
                        },
                        xAxes: [{
                            barThickness: 1,  // number (pixels) or 'flex'
                            maxBarThickness: 2 // number (pixels)
                        }]
                    }
                },
            });

            const ctx2 = document.getElementById('kpiReportChart');

            const dataChart2 = {
            labels: labels,
            datasets: [{
                label: '',
                data: dataReportKPI,
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
            };

            new Chart(ctx2, {
                type: 'bar',
                data: dataChart2,
                options: {
                    scales: {
                        y: {
                        beginAtZero: false
                        },
                        xAxes: [{
                            barThickness: 1,  // number (pixels) or 'flex'
                            maxBarThickness: 2 // number (pixels)
                        }]
                    }
                },
            });

        }
    });

}

function searchTasklist() {
    
    var url = "/api/dashboard/tasklist"
    
    $.ajax({
        url: url,
        method: 'get',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type':'application/json'
        },
        success: function(response) {

            let data = response.data
            // console.log(data)
            
            let rows = "";
            for (let index in data){
                rows += buildTemplateTasklist(data, index)
            }

            $("#tableTasklist>tbody").append(rows);

        }
    });

}

function buildTemplate(data, index){
    return `<tr>
                <td>${data[index].karyawan}</td>
                <td>${data[index].sales_target}</td>
                <td>${data[index].sales_actual}</td>                
                <td>${data[index].sales_achivement_percentage}</td>
                <td>${data[index].sales_actual_percentage}</td>
                <td>${data[index].report_target}</td>
                <td>${data[index].report_actual}</td>   
                <td>${data[index].report_achivement_percentage}</td>
                <td>${data[index].report_actual_percentage}</td>
                <td>${data[index].kpi}</td>
            </tr>`
}

function buildTemplateTasklist(data, index){
    return `<tr>
            <td>${data[index].total_tasklist}</td>
            <td>${data[index].tasklist_ontime}</td>
            <td>${data[index].tasklist_late}</td>                
            <td>${data[index].percent_tasklist_ontime}</td>
            <td>${data[index].percent_tasklist_late}</td>
        </tr>`
}

function getChartTasklist(){

    let dataTasklist = []

    let url = "/api/dashboard/tasklist"
    
    $.ajax({
        url: url,
        method: 'get',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type':'application/json'
        },
        success: function(response) {

            let data = response.data[0]
            console.log(data.tasklist_late)
            dataTasklist.push(data.tasklist_ontime)
            dataTasklist.push(data.tasklist_late)

            const ctx = document.getElementById('myChart');

            const dataChart = {
                labels: [
                'Tasklist Ontime',
                'Tasklist Late',
                ],
                datasets: [{
                label: '',
                data: dataTasklist,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
                }]
            };

            new Chart(ctx, {
                type: 'doughnut',
                data: dataChart,
                options: {
                    aspectRatio: 2
                }
            });

        }
    });
}

$(function(){
    // on document ready
    search()
    searchTasklist()
    getChartTasklist()
})