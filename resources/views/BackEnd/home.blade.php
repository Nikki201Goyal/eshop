@extends('BackEnd.starter')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $products->count() }}</h3>

            <p>Products</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="{{route('products.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $order->count() }}</h3>

            <p>Orders</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="{{ route('orders.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3 style="color: white;">{{ $users->count() }}</h3>

            <p style="color: white;">User</p>
          </div>
          <div class="icon">
            <i class=" fa fa-user-plus"></i>
          </div>
          <a href="{{ route('users.index') }}" class="small-box-footer" style="color: white">More info<i class="fas fa-arrow-circle-right" style="color: white"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>Rs. {{ $sum }}</h3>

            <p>Sales</p>
          </div>
          <div class="icon">
            <i class="fa fa-signal"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box" style="background-color: rgb(255, 76, 5); ">
          <div class="inner">
            <h3 style="color: white;">{{ $subscribe->count() }}</h3>

            <p style="color: white;">Subscribers</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="{{route('subscribe')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Weekly Sales Chart
                </h3>

            </div>
          <div class="card-body">
            <canvas id="myChart" style="width: 100%; height: 300px"></canvas>
          </div>
        </div>
        <!-- /.card -->




      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">

        <!-- solid sales graph -->
        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">
              <i class="fas fa-th mr-1"></i>
              Category Product Chart
            </h3>

          </div>
          <div class="card-body">
            <canvas class="chart" id="category-product" style=""></canvas>
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->


    </div>

</section>
<!-- right col -->
</div>
<!-- /.row (main row) -->

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
@section('admin-scripts')
    <script>
        var xValues = [@foreach($salesRecords as $k => $salesRecord)'{{ $k  }}',@endforeach];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: [@foreach($salesRecords as $k => $salesRecord)'{{ $salesRecord }}',@endforeach],
                    borderColor: "red",
                    fill: false,
                   label: "Sales"
                }]
            },
            options: {
                legend: {display: false}
            }
        });
        var myPieChart = new Chart('category-product', {
            type: 'doughnut',
            data: {
                labels: [@foreach($cats as $category)'{{ $category->name }}',@endforeach],
                datasets: [{
                    data: [@foreach($cats as $category)'{{ $category->products->count()  }}',@endforeach],
                    backgroundColor: [@foreach($cats as $category)'#'+Math.floor(Math.random()*16777215).toString(16),@endforeach],
                    hoverBackgroundColor: ['darkred', '#17a673'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>
    @endsection
