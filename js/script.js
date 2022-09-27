var options = {
    chart: {
      type: 'line'
    },
    series: [{
      name: 'sales',
      data: [30,40,35,50,49,60,70,91,125]
    }],
    xaxis: {
      categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
    }
  }
  
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  
  chart.render();
  // --------------------------------------------------------------------------------
  // function for calling the preloader
  let removePreloader = ()=>{
    let preloader = document.querySelector('.pre-loader')
    preloader.remove();
  }

  // ------------------------------------------------------------------------------
  // function for addingi the preloader
  let addPreloader = () =>{
    let preloader = document.querySelector('.pre-loader')
    preloader.classList.remove('collapse')
  }