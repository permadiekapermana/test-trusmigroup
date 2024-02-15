<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard KPI Trusmi Group</title>
    <style>
        .bar-chart-wrapper {
            height: 450px;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand mr-5" href="#">
            <img src="https://images.glints.com/unsafe/1200x0/glints-dashboard.s3.amazonaws.com/company-logo/dcc20c5611634d15657a2a2efc187203.png" height="50" alt="">
                <h5 class="d-inline">Dashboard KPI</h5>
            </a>
        </nav>
        <div class="card" style="margin-top: 20px">
            <div class="card-body">
                <h5 class="card-title">Tabel Perhitungan KPI</h5>              
                <table class="table mt-3" id="tableKPI">
                    <thead>
                    <tr>
                        <th scope="col" rowspan="2">Nama</th>
                        <th scope="col" colspan="4" class="text-center">Sales</th>
                        <th scope="col" colspan="4" class="text-center">Report</th>
                        <th scope="col" rowspan="2">KPI</th>
                    </tr>
                    <tr>
                        <th scope="col">Target</th>
                        <th scope="col">Actual</th>
                        <th scope="col">Pencapaian</th>
                        <th scope="col">Actual Bobot</th>
                        <th scope="col">Target</th>
                        <th scope="col">Actual</th>
                        <th scope="col">Pencapaian</th>
                        <th scope="col">Actual Bobot</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" style="margin-top: 20px; height: 580px">
            <div class="card-body">
              <h5 class="card-title">Chart Perhitungan KPI</h5>
              <div class="row">
                <div class="col">
                    <div class="bar-chart-wrapper">
                        <h5>Sales Actual</h5>
                        <canvas id="kpiChart" width="200" height="200"></canvas>
                    </div>
                </div>
                <div class="col">
                    <div class="bar-chart-wrapper">
                        <h5>Report Actual</h5>
                        <canvas id="kpiReportChart" width="200" height="200"></canvas>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="height: 370px; margin-top: 20px">
                    <div class="card-body">
                      <h5 class="card-title">Rekapitulasi Tasklist</h5>
                      <table class="table mt-3" id="tableTasklist">
                        <thead>
                        <tr>
                            <th scope="col">Total Tasklist</th>
                            <th scope="col">Tasklist Ontime</th>
                            <th scope="col">Tasklist Late</th>                            
                            <th scope="col">Persentase Tasklist Ontime</th>
                            <th scope="col">Persentase Tasklist Late</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="height: 370px; margin-top: 20px">
                    <div class="card-body">
                      <h5 class="card-title mb-10">Chart Tasklist</h5>
                      <canvas id="myChart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50 mt-5">
        <div class="container text-center">
          <small>Copyright &copy; Permadi Eka Permana - Purpose for Test with Trusmi Group</small>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    {{-- ChartJS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- JQUERY -->
    <script src="{{ asset('jquery/data.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>