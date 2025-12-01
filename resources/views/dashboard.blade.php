<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6 bg-gray-100">

    <h1 class="text-3xl font-bold mb-4">Dashboard Penjualan</h1>

    <form method="GET" class="mb-6">
        <div class="flex gap-4">
            <input type="date" name="start_date" class="p-2 border rounded" value="{{ request('start_date') }}">
            <input type="date" name="end_date" class="p-2 border rounded" value="{{ request('end_date') }}">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
        </div>
    </form>

    <!-- Total Penjualan -->
    <div class="mb-6 p-4 bg-white shadow rounded">
        <h2 class="text-xl font-semibold">Total Penjualan:</h2>
        <p class="text-2xl font-bold">Rp {{ number_format($total_penjualan, 0, ',', '.') }}</p>
    </div>

    <!-- Grafik -->
    <div class="bg-white p-4 shadow rounded mb-6">
        <canvas id="salesChart"></canvas>
    </div>

    <script>
        const labels = @json($chartData->pluck('tgl'));
        const values = @json($chartData->pluck('total'));

        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels,
                datasets: [{
                    label: 'Total Penjualan',
                    data: values,
                    borderWidth: 2,
                }]
            }
        });
    </script>

    <!-- Tabel -->
    <div class="bg-white p-4 shadow rounded">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nama Produk</th>
                    <th class="border p-2">Tanggal</th>
                    <th class="border p-2">Jumlah</th>
                    <th class="border p-2">Harga</th>
                    <th class="border p-2">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $s)
                <tr>
                    <td class="border p-2">{{ $s->nama_produk }}</td>
                    <td class="border p-2">{{ $s->tanggal_penjualan }}</td>
                    <td class="border p-2">{{ $s->jumlah }}</td>
                    <td class="border p-2">Rp {{ number_format($s->harga, 0, ',', '.') }}</td>
                    <td class="border p-2">
                        Rp {{ number_format($s->jumlah * $s->harga, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
