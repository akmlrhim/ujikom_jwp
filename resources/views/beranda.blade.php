@extends('layout.template')

@section('content')
  <div class="max-w-7xl mx-auto p-8 space-y-6">
    <div class="text-2xl font-medium">{{ $title }}</div>

    <div class="grid gap-4 lg:grid-cols-3">
      <div class="relative p-6 rounded-2xl bg-green-800 shadow">
        <div class="space-y-2">
          <div
            class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-white">
            <span>Jumlah data penghasilan</span>
          </div>
          <div class="text-xl text-white font-bold">
            {{ $jumlah_data_penghasilan }}
          </div>
        </div>
      </div>

      <div class="relative p-6 rounded-2xl bg-blue-800 shadow">
        <div class="space-y-2">
          <div
            class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-white">
            <span>Rata-rata penghasilan bulanan</span>
          </div>
          <div class="text-xl text-white font-bold">
            Rp. {{ number_format($rata_rata_penghasilan, 0, ',', '.') }}
          </div>
        </div>
      </div>

      <div class="relative p-6 rounded-2xl bg-red-800 shadow">
        <div class="space-y-2">
          <div
            class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-white">
            <span>Jumlah data kategori penghasilan</span>
          </div>
          <div class="text-xl text-white font-bold">
            {{ $jumlah_kategori_penghasilan }}
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white shadow p-5">
      <h1 class="font-medium text-2xl text-center mb-4">Grafik penghasilan per pegawai</h1>
      <canvas id="penghasilanChart" height="70"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const ctx = document.getElementById('penghasilanChart').getContext('2d');
      const penghasilanChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: {!! json_encode($chart_labels) !!},
          datasets: [{
            label: 'Penghasilan Bulanan',
            data: {!! json_encode($chart_data) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: false
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                callback: function(value) {
                  return 'Rp' + value.toLocaleString('id-ID');
                }
              }
            }
          }
        }
      });
    </script>
  </div>
@endsection
