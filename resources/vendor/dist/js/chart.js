/**
 * Created by Dren on 3/30/2017.
 */


$(function(){
    $.ajax({
        url:"Chart/getPersonalizedMonthly/completed",
        method: "GET",
        success: function(data) {
            console.log(data);
            var year = [];
            var month = [];
            var notstarted = [];
            var doing = [];
            var completed = [];


            for(var i in data){
                year. push(data[i].year);
                month.push( data[i].month + ' ' + data[i].year );
                notstarted.push(data[i].notstarted);
                doing.push(data[i].doing);
                completed.push(data[i].completed);
            }

            var chartdata = {
                labels:month,
                datasets : [
                    {
                        label : 'completed',
                        backgroundColor: 'rgba(33,150,243,0.60)',
                        borderColor: 'rgb(33,150,243,0.30)',
                        hoverBackgroundColor: 'rgb(33,150,243)',
                        hoverBorderColor: 'rgb(33,150,243)',
                        data: completed
                    }

                ]
            };

            var ctx = $("#myCanvas");

            var barGraph = new Chart(ctx , {
                type: 'bar',
                data:chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }

    });
});


$(function(){
    $.ajax({
        url:"Chart/getPersonalizedMonthlyCompared/notStarted",
        method: "GET",
        success: function(data) {
            console.log(data);
            var year = [];
            var month = [];
            var notstarted = [];
            var doing = [];
            var completed = [];


            for(var i in data){
                year. push(data[i].year);
                month.push( data[i].month + ' ' + data[i].year );
                notstarted.push(data[i].notstarted);
                doing.push(data[i].doing);
                completed.push(data[i].completed);
            }

            var chartdata = {
                labels:month,
                datasets : [
                    {
                        label : 'Not Started',
                        backgroundColor: 'rgba(33,150,243,0.60)',
                        borderColor: 'rgb(33,150,243,0.30)',
                        hoverBackgroundColor: 'rgb(33,150,243)',
                        hoverBorderColor: 'rgb(33,150,243)',
                        data: notstarted
                    }
                    //{
                    //    label : 'doing',
                    //    //backgroundColor: 'rgba(200,200,200,0.75)',
                    //    borderColor: 'rgba(210, 214, 222)',
                    //    hoverBackgroundColor: 'rgba(200,200,200,1)',
                    //    hoverBorderColor: 'rgba(200,200,200,1)',
                    //    data: doing
                    //},
                    //{
                    //    label : 'completed',
                    //    //backgroundColor: 'rgba(200,200,200,0.75)',
                    //    borderColor: 'rgba(210, 214, 222)',
                    //    hoverBackgroundColor: 'rgba(200,200,200,1)',
                    //    hoverBorderColor: 'rgba(200,200,200,1)',
                    //    data: completed
                    //}

                ]
            };

            var ctx = $("#myCanvas2");

            var barGraph = new Chart(ctx , {
                type: 'bar',
                data:chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }

    });
});
