@extends('layouts.app')
@section('title', 'Dashboard')
@section('title-content', 'Dashboard')

@section('content')
<div class="card p-4">
    <h5 class="mb-3 fw-semibold">Statistik Kondisi Lapangan</h5>

    <div style="position: relative; height: 300px;">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    fetch('/api/dashboard/lapangan-summary', {
        headers: {
            'Authorization': 'Bearer ' + API_TOKEN
        }
    })
    .then(res => res.json())
    .then(data => {

        const labels = Object.keys(data);
        const values = Object.values(data);

        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar', // bisa ganti pie / doughnut
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Lapangan',
                    data: values,
                    backgroundColor: [
                        '#4CAF50',   // Baik
                        '#FFC107',   // Rusak Ringan
                        '#F44336',   // Rusak Berat
                        '#FF9800',   // Perbaikan
                        '#9E9E9E'    // Tidak Aktif
                    ],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

    })
    .catch(() => {
        console.error('Gagal mengambil data dashboard');
    });

});
</script>
@endsection
